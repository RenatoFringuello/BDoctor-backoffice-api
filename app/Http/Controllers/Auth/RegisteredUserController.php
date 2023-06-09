<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $specializations = Specialization::orderBy('name')->get();
        $user = new User();
        return view('auth.register', compact('specializations', 'user'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                // Required
                'name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'address' => ['required', 'string', 'max:255'],
                'specializations' => ['required', 'array', 'min:1', 'exists:specializations,id'],
                // Not Required
                'picture' => ['image', 'nullable'],
                'bio' => ['string'],
                'services' => ['string'],
                'telephone' => ['string', 'max:13', 'regex:/^[0-9]+$/'],
                'curriculum' => ['image', 'nullable'],
            ],
            [
                'specializations.required' => 'The specializations field is required.',
                'specializations.min' => 'Enter at least one specialization',
                'specializations.exists' => 'The specializations not found'
            ]
        );

        // User Data
        $user = new User();
        $user->fill($data);
        $user->password = Hash::make($request->password);
        $user->isActive = true;
        $user->save();
        $user->sponsors()->attach([1]);

        // Profile Data
        $profile = new Profile();
        $profile->fill($data);
        $profile->user_id = User::where('email', $user->email)->pluck('id')[0];
        //save specializations
        $profile->save();
        $profile->specializations()->sync($data['specializations'] ?? []);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('profile.register');
        //return redirect(RouteServiceProvider::HOME);
    }
}
