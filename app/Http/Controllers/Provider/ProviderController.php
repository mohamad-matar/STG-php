<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\Image;
use App\Models\Place;
use App\Models\Provider\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProviderController extends Controller
{

    function index(Request $request)
    {
        $accepted = $request->accepted;
        $providers = Provider::with('place.province')
            ->when( isset($accepted) , function ($q) use ($accepted) {
                return $q->where('accepted', $accepted);
            })->paginate(7);
        return  view('dashboard.providers.index', compact('providers'));
    }

<<<<<<< HEAD

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        // return $provider;
=======
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $provider = User::find(Auth::user()->id)->provider;
>>>>>>> ba61e373a6f28c91ffad29a7e3edcd5f493b2a8e
        return  view('dashboard.providers.show', compact('provider'));
    }

    function edit()
    {
        $currUser = User::find(Auth::user()->id);
        if (! $provider = $currUser->provider)
            $provider =  $currUser->provider()->create([]);
        $contacts = $provider->contacts;        
        $places = Place::get(["id" , "name_ar as name"]);
        $services = Service::all();
        $currServices = $provider->services? $provider->services->modelKeys() : [];
        return view('dashboard.providers.edit', compact('provider', 'places' , 'contacts' , 'services' , 'currServices'));
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
            'place_id' => 'required|exists:places,id',
            
            'contactType' => 'nullable|array',
            'contactType.*' => "in:landphone,mobile,whatsapp,telegram",
            'contactValue' => 'nullable|array',
            'contactValue.*' => 'string:max:100',

            'services' => 'nullable|array',
            'services.*' => 'required|exists:services,id',
        ]);

        $currProvider = User::find(Auth::user()->id)->provider;
        $oldImage = null;
        if ($request->hasFile('image_id')) {
            $oldImage =  Image::find($currProvider->image_id);
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage->name);
                $oldImage->delete();
            }
            $validated['image_id'] = saveImg("provider-cover", $request->file('image_id'));
        }

        $currProvider->update($validated);
        
        if($request->contactType){
            $currProvider->contacts()->delete();
                foreach($validated['contactType'] as $i => $contactType){
                $currProvider->contacts()->create([
                    'type' => $contactType,
                    'value' => $validated['contactValue'][$i]
                ]);
            }
        }
        
        if($request->services){
            $currProvider->services()->sync($validated['services']);
        }
        return back()->with('success', 'تم حفظ الإعدادات بنجاح');
    }

    function accept(Provider $provider)
    {
        $provider->accepted = true;
        $provider->save();
        return back()->with('success', 'تم قبول مزود الخدمة بنجاح');
    }
}
