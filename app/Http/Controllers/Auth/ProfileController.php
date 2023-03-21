<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

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
        $user = Auth::user();
        return view('auth.complete-profile', compact('user'));
    }

    public function update(Request $request)
    {
        // $data = $request->all();//da fare il validate
        $data = $request->validate(
            [
                // Required
                'picture' => ['image', 'nullable'],
                'bio' => ['string'],
                'services' => ['string'],
                'telephone' => ['string', 'max:13', 'regex:/^[0-9]+$/'],
                'curriculum' => [
                    File::types(['pdf'])
                        ->min(10)
                        ->max(800),
                ], 'nullable'
            ],
        );

        // dd($profile);
        $profile = Auth::user()->profile;

        // $imgPath = Storage::put('placeholder/imgs', $data['picture']);

        // $imgPath = Storage::put('placeholder/imgs', $data['picture']);
        $data['picture'] = (!isset($data['picture'])) ? 'placeholder/place.jpg' : Storage::put('/placeholder/imgs', $data['picture']);
        $data['curriculum'] = (!isset($data['curriculum'])) ? 'null' : Storage::put('/placeholder/cv', $data['curriculum']);
        $profile->update($data);

        return view('dashboard', compact('profile'));
    }
}
