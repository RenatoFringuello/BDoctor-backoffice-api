<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show()
    {
    }

    /**
     * Display the registration view.
     */
    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('auth.complete-profile', compact('profile'));
    }

    public function update(Request $request)
    {
        // dd($profile);
        $profile = Auth::user()->profile;
        // dd($Id);
        $data = $request->all();
        $profile->update($data);

        return view('dashboard', compact('profile'));
    }
}
