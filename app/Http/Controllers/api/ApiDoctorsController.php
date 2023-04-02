<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Models\User;

class ApiDoctorsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->specializations && Specialization::where('name', '=', $request->specializations)->get()->toArray()) {
            /**
             * user_query_featured prende tutti i dottori con lo sponsor
             */
            $users_query_featured = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->whereHas('profile.specializations', function ($query) use ($request) {
                    $query->where('name', $request->specializations);
                })
                ->whereHas('sponsors', function ($query) use ($request) {
                    $query->where('id', '<>', '1');
                });
            /**
             * user_query_not_featured prende tutti i dottori senza Sponsor
             */
            $users_query_not_featured = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->whereHas('profile.specializations', function ($query) use ($request) {
                    $query->where('name', $request->specializations);
                })
                ->whereHas('sponsors', function ($query) use ($request) {
                    $query->where('id', '=', '1');
                });
            
            //con queste condizioni vengono fatti gli orderBy average and count
            if ($request->sortByAvg) {
                //se viene richiesto un sort per avg
                $users_query_featured->orderBy('reviews_avg_rating', 'DESC');
                $users_query_not_featured->orderBy('reviews_avg_rating', 'DESC');
            }
            if ($request->sortByCount) {
                //se viene richiesto un sort per count
                $users_query_featured->orderBy('reviews_count', 'DESC');
                $users_query_not_featured->orderBy('reviews_count', 'DESC');
            }

            //merge the queries ordered in a single collection
            $users = $users_query_featured->get()->merge($users_query_not_featured->get());
            //then create the pagination
            $users = $this->paginate($users, 8);
            
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
