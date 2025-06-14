<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    function index(Request $request)
    {
        $locale =   app()->getLocale();

        $search = $request->search;

        $service_id = $request->service_id;
        if ($service_id) {
            $service = Service::find($service_id);
            $name = "name_$locale";
            $serviceName = $service->$name;

            $providers = $service->providers()
                ->select("providers.id", "name_$locale as name", "description_$locale as description", "image_id", "provider_id")
                ->when($search, function ($q) use ($search) {
                    return $q->where('name_ar',  'like', "%$search%")
                        ->orWhere('name_en',  'like', "%$search%")
                        ->orWhere('description_ar',  'like', "%$search%")
                        ->orWhere('description_en',  'like', "%$search%");
                })
                ->with('place.province')
                ->get();
        } else
            return redirect()->route('home.index')->with('error' , '');
        // return $providers;

        return view('home-provider.index', compact('providers', 'serviceName', 'service_id', 'search'));
    }
}
