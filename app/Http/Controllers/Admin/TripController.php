<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Provider\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::get();
        return  view('dashboard.trips.index-admin', compact('trips' ));
    }
    public function show(Trip $trip)
    {
        $places = Place::get(["id", "name_ar as name"]);
        $tripDetails =  $trip->tripDetails()->orderby('start_date')->get();
        return  view('dashboard.trips.show-admin', compact('trip', 'places', 'tripDetails'));
    }
}
