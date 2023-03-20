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
        $specializations = Specialization::all();
        $profile = new Profile();
        return view('auth.register', compact('specializations', 'profile'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
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
        ]);

        // dd($request);

        // $user = User::create([
        //     'name' => $request->name,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // User Data
        $user = new User();
        $user->fill($data);
        $user->password = Hash::make($request->password);
        $user->isActive = true;
        $user->save();

        // dd(User::where('email', $user->email)->pluck('id'));

        // Profile Data
        $profile = new Profile();
        $profile->fill($data);
        $profile->user_id = User::where('email', $user->email)->pluck('id')[0];
        $profile->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('profile.register');
        //return redirect(RouteServiceProvider::HOME);
    }
}
