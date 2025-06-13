<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider\TripDetail;
use Illuminate\Http\Request;

class TripDetailsDetail extends Controller
{     

    function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'start_date' =>  'required|datetime',
            'end_date' => 'nullable:datetime',
            'note' =>  'nullable|max:1000',
            'trip_id' => 'required|exist:trips,id',
            'place_id' => 'required|exist:places,id' 
        ]);
       
        TripDetail::create($validated);        
        
        return to_route('provider.trips.show')->with('success', 'تم  إضافة الرحلة بنجاح');
    }

   
    function update(Request $request , TripDetail $trip)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'start_date' =>  'required|datetime',
            'end_date' => 'nullable:datetime',
            'note' =>  'nullable|max:1000',
            'trip_id' => 'required|exist:trips,id',
            'place_id' => 'required|exist:places,id'
        ]);
        
        $trip->update($validated);

        return to_route('provider.trips.index')->with('success', 'تم  تعديل الرحلة بنجاح');        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TripDetail $trip)
    {
        if ($trip->tripDetails)
            return back()->with('error', 'لا يمكن محي الرحلة قبل محي تفاصيلها');

        $trip->delete();

        return back()->with('success', 'تم حذف الرحلة بنجاح');
    }
}
