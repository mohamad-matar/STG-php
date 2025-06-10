<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Provider\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{  
    /**
     * Display the specified all trip .
     */
    public function index()
    {
        $provider = User::find(Auth::user()->id)->provider;
        $trips = $provider->trips;        
        return  view('dashboard.trips.index', compact('trips'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        $places = Place::get(["id", "name_ar as name"]);
        return  view('dashboard.trips.show', compact('trip' , 'places'));
    }

    function create()
    {                
        return view('dashboard.trips.create');
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'start_date' =>  'required|date',
            'end_date' => 'nullable:date',
            'note' =>  'nullable|max:1000',            
        ]);

        $currProvider = User::find(Auth::user()->id)->provider;
       
        $currProvider->trips()->create($validated);        
        
        return to_route('provider.trips.index')->with('success', 'تم  إضافة الرحلة بنجاح');
    }

    function edit(Trip $trip)
    {        
        return view('dashboard.trips.edit', compact('trip'));
    }

    function update(Request $request , Trip $trip)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'start_date' =>  'required|date',
            'end_date' => 'nullable:date',
            'note' =>  'nullable|max:1000',
        ]);
        
        $trip->update($validated);

        return to_route('provider.trips.index')->with('success', 'تم  تعديل الرحلة بنجاح');        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        if ( $trip->tripDetails->count())
            return back()->with('error', 'لا يمكن محي الرحلة قبل محي تفاصيلها');

        $trip->delete();

        return back()->with('success', 'تم حذف الرحلة بنجاح');
    }
}
