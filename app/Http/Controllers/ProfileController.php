<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Specialization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'specializations' => Specialization::all(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //for update user data
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        
        // For Update Address and Specializations
        $request->user()->profile->fill($request->validated());
        $request->user()->profile->specializations()->sync($request->validated()['specializations'] ?? []);
        
        $request->user()->update();        
        $request->user()->profile->update();

        if($request->get('isActive') !== null){
            return Redirect::route('dashboard');
        }
        else{
            // password validation only if exist this user
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
            //password save
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
            //end pw

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        // Delete Img
        $profileImgPath = $user->profile->picture;
        if ($profileImgPath != 'assets/place.jpg') {
            Storage::delete($profileImgPath);
        }

        // Delete CV
        $profileCVPath = $user->profile->curriculum;
        if ($profileCVPath != 'null') {
            Storage::delete($profileCVPath);
        }


        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
}
