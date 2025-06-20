<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type' => 'required|in:tourist,provider'
        ]);
        $validated['password'] = Hash::make($request->password);
        // return $request->all();

        $user = User::create($validated);

        event(new Registered($user));
        $userType = $user->type;
        Auth::login($user);
        
        if ($userType == 'provider'){
            $user->provider()->create([]);
            $route = 'dashboard';
        }
        elseif ($userType == 'tourist')
            $route = 'home.index';

        return redirect()->intended(route($route, absolute: false));
    }
}
