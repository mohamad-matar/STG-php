<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Provider\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProviderController extends Controller
{


    function index(Request $request){
        $verfication_status = $request->verfication_status;

        $providers = Provider::when($verfication_status , function($q){
            return $q->where('verfication_status' , 'verfication_status');
        })->paginate(7);
        return  $providers;
    }

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
            'image_id' => 'nullable|image|max:2000',
        ]);

        $currProvider = User::find(Auth::user()->id)->provider;

        if ($request->hasFile('image_id')) {
            $oldImage =  Image::find($currProvider->image_id);            
            $validated['image_id'] = saveImg("provider-cover", $request->file('image_id'));             
        }
        $currProvider->update($validated);


        /** delete image record from images table with related file */
        if ($oldImage) {
            Storage::disk('public')->delete($oldImage->name);
            $oldImage->delete();
        }
        return back()->with('success' , 'Setting update successfully');
        
    }
}
