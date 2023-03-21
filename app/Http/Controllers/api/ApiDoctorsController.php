<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Profile;
// use App\Models\Specialization;
// use App\Models\Sponsor;

class ApiDoctorsController extends Controller
{
    //

    public function index()
    {
        $users = User::with('profile', 'sponsors')->paginate(10);
        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }
}
