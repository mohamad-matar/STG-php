<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    function edit()
    {
        $currUser = User::find( Auth::user()->id);
        if (! $provider = $currUser->provider)
            $provider =  $currUser->provider()->create([]);

        return view('provider.edit' , compact('provider'));
    }

    function update(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'max:100',
            'name_en' =>  'max:100',
            'description_ar' => 'max:100',
            'description_en' =>  'max:100',
            'license_number'  => 'max:50',
        ]);

        if ($request->hasFile('image_id')) {
            $image_id = saveImg("provider-cover", $request->file('image_id'));
            $validated['image_id'] = $image_id;
        }
        $currUser = User::find(Auth::user()->id);
        $currUser->provider()->update($validated);

        return back()->with('success' , 'Setting update successfully');
        
    }
}
