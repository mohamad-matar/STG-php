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
        $provider = Auth::user()->provider;        
        
        if (! $api = $provider->api)
            $api = $provider->api()->create([]);
        
        return view('dashboard.api.edit', compact('api'));
    }

    function update(Request $request )
    {
        $validated = $request->validate([
            'services_url'  => 'required|max:1000',
            'request_url'  => 'required|max:1000',
            'view_url'  => 'required|max:1000',
        ]);
        Auth::user()->provider->api()->update($validated);
        return back()->with('success', 'تم حفظ الرابط بنجاح');
    }
}
