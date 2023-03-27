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
        //$user_query = User::with(['profile', 'profile.specializations', 'sponsors', 'reviews']);
        $user_query = User::with(['reviews']);
        if ($request->specializations) {

            //filtra i risultati per specializzazione
            $user_query->select('users.*', DB::raw('round(avg(\'reviews.rating\'), 0)as average'))->whereHas('profile.specializations', function ($query) use ($request) {
                $query->where('name', $request->specializations);
            })->groupBy('users.id')->orderBy('average')->get();
        }
        /* SELECT ROUND(AVG(`reviews`.`rating`),0) AS `media`, `users`.*
        FROM `users`
        JOIN `reviews` ON `reviews`.`user_id`=`users`.`id`
        GROUP BY `users`.`id`
        ORDER BY `media` DESC; */


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
