<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider\Api;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    function edit()
    {
        $currUser = User::find(Auth::user()->id);
        if (! $provider = $currUser->provider)
            return back()->with('error', 'يجب ضبط الأعدادات أولاً');
        
        if (! $api = $provider->api)
            $api = $provider->api()->create([]);
        
        return view('dashboard.api.edit', compact('api'));
    }

    function update(Request $request )
    {
        $validated = $request->validate([
            'url' => 'required|max:255',
        ]);
        User::find(Auth::user()->id)->provider->api()->update($validated);
        return back()->with('success', 'تم حفظ الرابط بنجاح');
    }
}
