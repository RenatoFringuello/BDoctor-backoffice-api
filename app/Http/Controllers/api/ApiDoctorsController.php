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
            //filtra i risultati per specializzazione(sempre) AND se la specializzazione richiesta esiste; 
            $user_query = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->whereHas('profile.specializations', function ($query) use ($request) {
                    $query->where('name', $request->specializations);
                });

            if ($request->sortByAvg) {
                //se viene richiesto un sort per avg
                $user_query->orderBy('reviews_avg_rating', 'DESC');
            }
            if ($request->sortByCount) {
                //se viene richiesto un sort per count
                $user_query->orderBy('reviews_count', 'DESC');
            }

            //get the results
            $user_query->get();
            //then create the pagination
            $user = $user_query->paginate(10);

            return response()->json([
                'success' => true,
                'results' => $user
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
        $user_query = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->whereHas('sponsors', function ($query) use ($request) {
                $query->where('id', '<>', '1');
            })
            ->get();


        //se la ricerca non viene fatta per specializzazione allora return false
        return response()->json([
            'success' => true,
            'results' => $user_query
        ]);
    }
}
