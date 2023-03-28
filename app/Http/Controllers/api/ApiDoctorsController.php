<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiDoctorsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->specializations) {
            //salvano la richiesta di un eventuale order by 
            $sortByAvg = ($request->sortByAvg) ? 'reviews_avg_rating' : 'id';
            $sortByCount = ($request->sortByCount) ? 'reviews_count' : 'id';

            //filtra i risultati per specializzazione(sempre); 
            //l'order by $sortByAvg e $sortByCount (se non esistono le fa per user.id)
            $user_query = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews'])
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->whereHas('profile.specializations', function ($query) use ($request) {
                    $query->where('name', $request->specializations);
                })
                ->orderBy($sortByAvg, 'DESC')
                ->orderBy($sortByCount, 'DESC')
                ->paginate(10);

            return response()->json([
                'success' => true,
                'results' => $user_query
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
        $user = User::with('profile', 'profile.specializations', 'sponsors')->findOrFail($user->id);

        return response()->json([
            'success' => true,
            'results' => $user,
        ]);
    }
}
