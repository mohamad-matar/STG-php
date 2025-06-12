<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider\ApiRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiRequestController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(ApiRequest $apiRequest)
    {
        // return  view('dashboard.api-request.show', compact('branch'));
    }

    function create(Request $request)
    {
        return view('dashboard.api-requests.create');
    }

    function store(Request $request)
    {
        // return $request;        
        $validated = $request->validate([
            'title' => 'required|max:50',
            'method' =>  'required|in:get,post,put,delete',
            'path' => 'nullable:max:255',
            'params' => 'nullable|max:2000',

        ]);
        
        $validated['api_id'] = User::find(Auth::user()->id)->provider->api->id;

        ApiRequest::create($validated);
        
        return to_route('provider.api.edit')->with('success', 'تم  إضافة الطلب بنجاح');
    }

    function edit(ApiRequest $apiRequest)
    {        
        return view('dashboard.api-requests.edit', compact('apiRequest'));
    }

    function update(Request $request, ApiRequest $apiRequest)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'method' =>  'required|in:get,post,put,delete',
            'path' => 'nullable:max:255',
            'params' => 'nullable|max:2000',
        ]);
       
        $apiRequest->update($validated);

        return to_route('provider.api.edit')->with('success', 'تم  تعديل الطلب بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiRequest $apiRequest)
    {
        $apiRequest->delete();

        return back()->with('success', 'تم حذف الطلب بنجاح');
    }
}
