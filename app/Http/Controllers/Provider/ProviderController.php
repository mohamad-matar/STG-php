<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Place;
use App\Models\Provider\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class ProviderController extends Controller
{

    function index(Request $request)
    {
        $accepted = $request->accepted;
        $providers = Provider::with('province', 'place')
            ->when( isset($accepted) , function ($q) use ($accepted) {
                return $q->where('accepted', $accepted);
            })->paginate(7);
        return  view('dashboard.providers.index', compact('providers'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        // return $provider;
        return  view('dashboard.providers.show', compact('provider'));
    }

    function edit()
    {
        $currUser = User::find(Auth::user()->id);
        if (! $provider = $currUser->provider)
            $provider =  $currUser->provider()->create([]);

        $places = Place::get(["id" , "name_ar as name"]);
        // return $places;
        return view('dashboard.providers.edit', compact('provider', 'places'));
    }

    function update(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|max:100',
            'name_en' =>  'required|max:100',
            'description_ar' => 'nullable:max:100',
            'description_en' =>  'nullable|max:100',
            'license_number'  => 'max:50',
            'image_id' => 'nullable|image|max:2000',
            'place_id' => 'required|exists:places,id'
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
        return back()->with('success', 'Setting update successfully');
    }

    function accept(Provider $provider)
    {
        $provider->accepted = true;
        $provider->save();
        return back()->with('success', 'تم قبول مزود الخدمة بنجاح');
    }
}
