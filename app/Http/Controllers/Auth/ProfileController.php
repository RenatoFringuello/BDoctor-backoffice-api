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
                'bio' => ['string', 'min:5', 'nullable'],
                'services' => ['string', 'nullable'],
                'telephone' => ['string', 'max:13', 'regex:/^[0-9]+$/', 'nullable'],
                'curriculum' => [
                    'mimes:jpg,pdf,png', 'max:800',
                    // File::types(['pdf', 'image'])
                    //     ->max(800),
                    'nullable'
                ],
            ],
            [
                'picture.image' => 'The file must be an image',

                'bio.string' => 'The field must be of type string',
                'bio.min' => 'Enter at least 5 characters',

                'service.string' => 'The field must be of type string',

                'telephone.string' => 'The field must be of type string',
                'telephone.regex' => 'The number entered is incorrect',
                'telephone.max' => 'You have exceeded the character limit',

                'curriculum.mimes' => 'The file must be an pdf or image',
                'curriculum.max' => 'You have exceeded the limit (max 800 mb)'
            ]
        );

        // dd($profile);
        $profile = Auth::user()->profile;

        // $imgPath = Storage::put('placeholder/imgs', $data['picture']);

        // $imgPath = Storage::put('placeholder/imgs', $data['picture']);
        $data['picture'] = (!isset($data['picture'])) ? 'assets/place.jpg' : Storage::put('/placeholder/imgs', $data['picture']);
        $data['curriculum'] = (!isset($data['curriculum'])) ? 'null' : Storage::put('/placeholder/cv', $data['curriculum']);
        $profile->update($data);

        return view('dashboard', compact('profile'));
    }
}
