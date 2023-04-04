<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Specialization;
use App\Models\User;

class ApiStatsController extends Controller
{
    public function index(){

        $stats = [
            'nDoctors' => User::all()->count(),
            'nCustomers' => Message::all()->count(),
            'nSpecializations' => Specialization::all()->count(),
        ];

        return response()->json([
            'success' => true,
            'results' => $stats,
        ]);
    }
}
