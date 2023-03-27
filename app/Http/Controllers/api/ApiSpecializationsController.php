<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;

class ApiSpecializationsController extends Controller
{
    public function index()
    {
        $specializations = Specialization::orderBy('name')->get();
        return response()->json([
            'success' => true,
            'results' => $specializations
        ]);
    }
}
