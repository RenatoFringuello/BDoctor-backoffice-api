<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Specialization;
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
        $data = $request->validate(
            [
                // Required
                'picture' => ['image', 'nullable'],
                'bio' => ['string', 'max:1000', 'nullable'],
                'services' => ['string', 'max:1000', 'nullable'],
                'telephone' => ['string', 'max:13', 'regex:/^[0-9]+$/', 'nullable'],
                'curriculum' => ['mimes:jpg,pdf,png', 'max:800', 'nullable'],
            ],
            [
                'picture.image' => 'The file must be an image',

                'bio.string' => 'The field must be of type string',
                'bio.max' => 'Enter a maximum of 1000 characters',

                'service.string' => 'The field must be of type string',
                'service.max' => 'Enter a maximum of 1000 characters',

                'telephone.string' => 'The field must be of type string',
                'telephone.regex' => 'The number entered is incorrect',
                'telephone.max' => 'You have exceeded the character limit',

                'curriculum.mimes' => 'The file must be an pdf or image',
                'curriculum.max' => 'You have exceeded the limit (max 800 mb)'
            ]
        );

        $profile = Auth::user()->profile;

        // dd($request);
        //DELETE old pic
        if (!str_starts_with($profile->picture, 'http') && $request->route()->getName() != 'profile.register.update') {
            Storage::delete('/placeholder/imgs', $profile->picture);
        }

        //and then add new picture
        $data['picture'] = (!isset($data['picture'])) ? '/placeholder/imgs/place.jpg' : Storage::put('/placeholder/imgs', $data['picture']);
        $data['curriculum'] = (!isset($data['curriculum'])) ? 'null' : Storage::put('/placeholder/cv', $data['curriculum']);
        $profile->update($data);

        if($request->isRegistered){
            $messages = Auth::user()->messages;
            $reviews = Auth::user()->reviews;
            return view('dashboard', compact('profile', 'messages', 'reviews'));
        }
        else{
            return view('profile.edit', ['user' => Auth::user(), 'specializations' => Specialization::all()]);
        }
    }
}
