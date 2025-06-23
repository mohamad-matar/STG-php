<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\Provider\Api;
use App\Models\Provider\ApiRequest;
use App\Models\Provider\Branch;
use App\Models\Provider\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use PhpParser\JsonDecoder;

class ProviderController extends Controller
{
    function index(Request $request)
    {
        $locale =   app()->getLocale();

        $search = $request->search;

        $service_id = $request->service_id;
        if ($service_id) {
            $service = Service::find($service_id);
            // return $service;

            $name = "name_$locale";
            $serviceName = $service->$name;
            // return $serviceName;

            $providers = $service->providers()
                ->select("providers.id", "name_$locale as name", "description_$locale as description", "image_id", "provider_id")
                ->when($search, function ($q) use ($search) {
                    return $q->where('name_ar',  'like', "%$search%")
                        ->orWhere('name_en',  'like', "%$search%")
                        ->orWhere('description_ar',  'like', "%$search%")
                        ->orWhere('description_en',  'like', "%$search%");
                })
                ->with('place.province')
                ->where('accepted', '1')
                ->get();
        } else
            return redirect()->route('home.index')->with('error', '');
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
                return $q->select("id", "name_$locale as name", "description_$locale as description", "image_id", "provider_id");
            }])
            ->first();
        $services = null;
        $api = $provider->api;
        if ($api && $api->services_url)
            $services  = json_decode(Http::get($api->services_url));

        // return $services;
        $locale = app()->getLocale();
        return view('home-provider.show', compact('provider', 'api', 'services', 'locale'));
    }


    function request(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|integer',
            'quantity' => 'required|integer',
            'api_id' => 'integer|exists:apis,id'
        ]);
        $validated['tourist_id'] = Auth::user()->tourist->id;
        $request_url = Api::find($validated['api_id'])->request_url;
        $request = Http::post($request_url,  [
            'email' => Auth::user()->email,
            'quantity' => $validated['quantity'],
            'service_id' => $validated['service_id'],
        ]);
        if($request){
            return back()->with('success' , __('stg.success'));
            ApiRequest::create($validated);
        }
        else
            return back()->with('error', __('stg.error'));
    }

    function branchShow(Branch $branch, Request $request)
    {
        $locale =   app()->getLocale();
        $providerName = $request->providerName;
        $branch = Branch::where('id', $branch->id)->select("id", "name_$locale as name", "description_$locale as description", "provider_id", "image_id", "place_id")
            ->with(['branchShows' => function ($q) use ($locale) {
                return $q->select("name_$locale as name", "image_id", "branch_id");
            }])->first();

        return view('home-provider.branch-show', compact('branch', 'providerName'));
    }
}
