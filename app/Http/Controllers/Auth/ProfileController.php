<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.complete-profile');
    }

    public function store()
    {
        //
    }
}
