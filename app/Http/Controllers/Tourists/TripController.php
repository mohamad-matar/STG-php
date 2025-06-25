<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Provider\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    function index(Request $request)
    {
        $locale =   app()->getLocale();

        $myTrip = $request->myTrip;
        $new = $request->new;

        $particpate = Auth::user() && Auth::user()->tourist;

        $trips = Trip::select("id", "title_$locale as title", "start_date", "end_date", "count", "cost", "provider_id")
            ->when($myTrip, function ($q) {
                return $q->wherehas('tourists', function ($q) {
                    $tourist_id = Auth::user()->tourist->id;
                    return $q->where('tourist_id', $tourist_id);
                });
            })->when($new == "y", function ($q) {
                return $q->where('start_date', '>=', today());
            })
            ->when($new == "n",   function ($q) {
                return $q->where('start_date', '<', today());
            })
            ->when($particpate, function($q){
                return $q->with(['tourists' => function($q) {
                    $q->where('tourist_id' , Auth::user()->tourist->id);
                }]);
            })
            ->with(['provider' => function ($q) use ($locale) {
                return $q->select("id", "name_$locale as name");
            }])->withSum('tourists', 'tourist_trip.seat_count')
            ->withAvg('tourists', 'tourist_trip.evaluate')
            ->with(['tripDetails' => function ($q) use ($locale) {
                return $q->select("id", "title_$locale as title", "start_date", "end_date", "trip_id", "place_id")
                    ->with(['place' => function ($q) use ($locale) {
                        return $q->select('id', "name_$locale as name");
                    }]);
            }])->get();
        // return $trips;
        $title = $myTrip ? __('stg.my-trip') : ($new ? __('stg.new-trips') : __('stg.previous-trips'));
        return view('trips.index', compact('trips', 'title'));
    }

    function show(Trip $trip)
    {
        $locale =   app()->getLocale();
        $trip = Trip::where('id', $trip->id)
            ->select("id", "title_$locale as title", "start_date", "end_date", "count", "cost")
            ->withSum('tourists', 'tourist_trip.seat_count')
            ->with(['tripDetails' => function ($q) use ($locale) {
                return $q->select("id", "title_$locale as title", "start_date", "end_date", "trip_id", "place_id")
                    ->with(['place' => function ($q) use ($locale) {
                        return $q->select('id', "name_$locale as name" , "image_id");
                    }]);
            }])
            ->with('comments.tourist')->first();
        // return $trip;
        return view('trips.show', compact('trip'));
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
        ]);
        // return $trip;

        $trip->tourists()->updateExistingPivot(Auth::user()->tourist, $validated);
        return back()->with('success', __('stg.success'));
    }
    
    function comment(Trip $trip,  Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|max:200',
            'type' => 'nullable|in:comment,complain'
        ]);
        // return $trip;

        $trip->comments()->create(['tourist_id' => Auth::user()->tourist->id, 'comment' => $validated['comment']]);
        return back()->with('success', __('stg.success'));
    }
}
