<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Provider\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    function index(Request $request)
    {
        $locale =   app()->getLocale();
        $myTrip = $request->myTrip;
        $new = $request->new;
        $trips = Trip::select("id", "title_$locale as title", "start_date", "end_date", "note", "provider_id")
            ->with('provider')
            // ->when($myTrip, function ($q) {
            //     return $q->wherehas('tourists', function ($q) {
            //         $tourist_id = Auth::user()->tourist->id;
            //         return $q->where('tourist_id', $tourist_id);
            //     });
            // })
            ->when(
                $new,
                function ($q) {
                    return $q->where('start_date', '>=', today());
                },
                function ($q) {
                    return $q->where('start_date', '<', today());
                }
            )->get();
        // return $trips;
        $title = $myTrip ? __('stg.my-trip') : ($new ? __('stg.new-trips') : __('stg.previous-trips'));
        return view('trips.index', compact('trips', 'title'));
    }

    function show(Trip $trip)
    {
        // return $trip;
        $locale =   app()->getLocale();
        $tripDetails = $trip->tripDetails()->select("id", "title_$locale as title", "start_date", "end_date", "trip_id", "place_id")
            ->with('place.image')
            ->get();
        // return $tripDetails;
        return view('trips.show', compact('trip', 'tripDetails'))
            ->with('title', "title_$locale")
            ->with('name', "name_$locale");
    }

    function join(Trip $trip,  Request $request)
    {
        $validated = $request->validate([
            'seat_count' => 'integer'
        ]);

        $trip->tourists()->attach(Auth::user()->tourist, ['seat_count' => $validated['seat_count']]);
        return back()->with('success', __('success'));
    }    
    
    function eval(Trip $trip,  Request $request)
    {
        $validated = $request->validate([
            'evaluate' => 'in:1,2,3,4,5',
            'comment' => 'required|max:200'
        ]);
        // return $trip;

        $trip->tourists()->updateExistingPivot(Auth::user()->tourist, $validated);
        return back()->with('success', __('success'));
    }    
}
