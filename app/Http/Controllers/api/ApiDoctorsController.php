<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

// use App\Models\Profile;
// use App\Models\Sponsor;

class ApiDoctorsController extends Controller
{
    //

    public function index(Request $request)
    {
        //restituisce tutti i dottori
        $user_query = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews']);
        
        if ($request->specializations) {
            //filtra i risultati per specializzazione con la media dei voti e il numero di recensioni
            $user_query->withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->whereHas('profile.specializations', function ($query) use ($request) {
                            $query->where('name', $request->specializations);
                        });
                        // ->orderBy('reviews_avg_rating', 'DESC')->get(); //questo va messo se nei params viene richiesto il filtro per media voti
        }

        /*  if ($request->sponsors) {
            $user_query->whereHas('sponsors', function ($query) use ($request) {
                $query->where('type', $request->sponsors);
            });
        } */
        $users = $user_query->paginate(10);
        return response()->json([
            'success' => true,
            'results' => $users
        ]);
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
