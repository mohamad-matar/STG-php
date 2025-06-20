<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Provider\Trip;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    function index()
    {
        $locale =   app()->getLocale();

        $trips = Trip::select("id", "title_$locale as title", "start_date", "end_date", "note", "provider_id")
            ->with('provider')
            ->where('start_date', '>', today())
            ->get();
        // return $trips;
        return view('trips.index', compact('trips'));
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

    function join(Trip $trip,  HttpRequest $request)
    {
        $validated = $request->validate([
            'seat_count' => 'integer'
        ]);
        $tourist = User::find(Auth::user()->id)->tourist;
        return $tourist;
        $trip->tourists()->attach(Auth::user()->tourist, ['seat_count' => $validated['seat_count']]);
        return back()->with('success' , __('success'));
    }
}
