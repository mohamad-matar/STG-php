<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
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
        $locale = app()->getLocale();
        $countries = Country::select('id', "name_$locale as name")->get();
        return view('auth.register', compact('countries'));
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
            'type' => 'required|in:tourist,provider',
            'name' => 'sometimes|unique:tourists|max:50',
            'country_id' => 'sometimes|exists:countries,id'
        ]);
        $validated['password'] = Hash::make($request->password);
        // return $request->all();

        $user = User::create($validated);

        event(new Registered($user));
        $userType = $user->type;
        Auth::login($user);

        if ($userType == 'provider') {
            $user->provider()->create([]);
            $route = 'dashboard';
        } elseif ($userType == 'tourist') {
            $route = 'home.index';;
            $user->tourist()->create(['name' => $validated['name'],  'country_id' => $validated['country_id']]);
        }

        return redirect()->intended(route($route, absolute: false));
    }
}
