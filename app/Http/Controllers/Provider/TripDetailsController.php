<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider\TripDetail;
use Illuminate\Http\Request;

class TripDetailsController extends Controller
{     

    function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'start_date' =>  'required|date_format:Y-m-d H:i:s',
            'end_date' => 'nullable:date_format:Y-m-d H:i:s',
            'note' =>  'nullable|max:1000',
            'trip_id' => 'required|exists:trips,id',
            'place_id' => 'required|exists:places,id' 
        ]);
       
        TripDetail::create($validated);        
        
        return to_route('provider.trips.show', $validated['trip_id'])->with('success', 'تم  إضافة الرحلة بنجاح');
    }

   
    function update(Request $request , TripDetail $tripDetail)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'start_date' =>  'required|date',
            'end_date' => 'nullable:date',
            'note' =>  'nullable|max:1000',
            'trip_id' => 'required|exists:trips,id',
            'place_id' => 'required|exists:places,id'
        ]);

        $tripDetail->update($validated);

        return to_route('provider.trips.show' , $validated['trip_id'] )->with('success', 'تم  تعديل  جزء الرحلة بنجاح');        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TripDetail $tripDetail)
    {

        $tripDetail->delete();

        return back()->with('success', 'تم حذف جزء الرحلة بنجاح');
    }
}
