<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Provider\Trip;

class TripController extends Controller
{
    function index()
    {
        $locale =   app()->getLocale();

        $trips = Trip::select("id" , "title_$locale as title", "start_date" , "end_date" ,"note" ,"provider_id")
        ->with('provider')
        ->where('start_date', '>', today())
        ->get();
        // return $trips;
        return view('trips.index', compact('trips'));
    }
}
