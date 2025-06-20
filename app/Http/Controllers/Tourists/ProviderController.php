<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\Provider\Branch;
use App\Models\Provider\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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
                ->where('accepted' , '1')
                ->get();
        } else
            return redirect()->route('home.index')->with('error' , '');
        // return $providers;

        return view('home-provider.index', compact('providers', 'serviceName', 'service_id', 'search'));
    }
    
    function show(Provider $provider)
    {
        $locale =   app()->getLocale();
        $provider = Provider::where('id', $provider->id)->select("id", "name_$locale as name", "description_$locale as description", "image_id", "place_id")
            ->with(['providerShows' => function ($q) use ($locale) {
                return $q->select("name_$locale as name", "image_id", "provider_id");
            }])
            ->with(['branches' => function ($q) use ($locale) {
                return $q->select("id" , "name_$locale as name", "description_$locale as description", "image_id", "provider_id");
            }])
            ->first();        

        return view('home-provider.show', compact('provider'));
    }
    
    function branchShow(Branch $branch , Request $request)
    {
        $locale =   app()->getLocale();
        $providerName = $request->providerName;
        $branch = Branch::where('id', $branch->id)->select("id", "name_$locale as name", "description_$locale as description", "provider_id", "image_id", "place_id")
            ->with(['branchShows' => function ($q) use ($locale) {
                return $q->select("name_$locale as name", "image_id", "branch_id");
            }])->first();        

        return view('home-provider.branch-show', compact('branch' , 'providerName'));
    }
}
