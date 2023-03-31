<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ApiDoctorsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->specializations && Specialization::where('name', '=', $request->specializations)->get()->toArray()) {
            //filtra i risultati per specializzazione(sempre) AND se la specializzazione richiesta esiste; 
            // $users_query = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
            //     ->withAvg('reviews', 'rating')
            //     ->withCount('reviews')
            //     ->join('sponsor_user', 'sponsor_user.user_id', '=', 'users.id')
            //     ->join('sponsors', 'sponsors.id', '=', 'sponsor_user.sponsor_id')
            //     ->whereHas('profile.specializations', function ($query) use ($request) {
            //         $query->where('name', $request->specializations);
            //     })->orderBy('sponsors.id', 'DESC');

            $users_query_featured = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->whereHas('profile.specializations', function ($query) use ($request) {
                    $query->where('name', $request->specializations);
                })
                ->whereHas('sponsors', function ($query) use ($request) {
                    $query->where('id', '<>', '1');
                });
            $users_query_not_featured = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->whereHas('profile.specializations', function ($query) use ($request) {
                    $query->where('name', $request->specializations);
                })
                ->whereHas('sponsors', function ($query) use ($request) {
                    $query->where('id', '=', '1');
                });

            if ($request->sortByAvg) {
                //se viene richiesto un sort per avg
                // $users_query->orderBy('reviews_avg_rating', 'DESC');

                $users_query_featured->orderBy('reviews_avg_rating', 'DESC');
                $users_query_not_featured->orderBy('reviews_avg_rating', 'DESC');
            }
            if ($request->sortByCount) {
                //se viene richiesto un sort per count
                // $users_query->orderBy('reviews_count', 'DESC');

                $users_query_featured->orderBy('reviews_count', 'DESC');
                $users_query_not_featured->orderBy('reviews_count', 'DESC');
            }

            //then create the pagination
            // $users_query->get();
            // $users = $users_query->paginate(10);

            $users = $users_query_featured->get()->merge($users_query_not_featured->get());
            // $users = (new Collection($users_query_featured->get()->merge($users_query_not_featured->get())))->paginate(10);

            return response()->json([
                'success' => true,
                'results' => $users,
            ]);
        } else {
            //se la ricerca non viene fatta per specializzazione allora return false
            return response()->json([
                'success' => false,
                'results' => null
            ]);
        }
    }

    public function show(User $user)
    {
        $user = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->findOrFail($user->id);

        return response()->json([
            'success' => true,
            'results' => $user,
        ]);
    }

    public function sponsored(Request $request)
    {
        $users_query = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->whereHas('sponsors', function ($query) use ($request) {
                $query->where('id', '<>', '1');
            })
            ->get();


        //se la ricerca non viene fatta per specializzazione allora return false
        return response()->json([
            'success' => true,
            'results' => $users_query
        ]);
    }
}
