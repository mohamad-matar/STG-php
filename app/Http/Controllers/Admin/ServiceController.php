<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('dashboard.services.index' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        Service::create($validated);
        return to_route('admin.services.index')->with('success' , 'تم إضافة الخدمة بنجاح');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit' , compact('service')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        $service->update($validated);
        return to_route('admin.services.index')->with('success', 'تم تعديل الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'تم حذف الخدمة بنجاح');

    }
}
