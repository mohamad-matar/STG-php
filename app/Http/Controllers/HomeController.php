<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Provider\Provider;
use App\Models\Provider\Trip;
use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        $userType = Auth::user()->type;
        $placesCount = Place::count();
        $providersCount = Provider::count();
        $touristsCount = Tourist::count();
        $tripsCount = Trip::count();
        return view('layouts-dashboard.dashboard' , 
        compact('userType' , 'placesCount' , 'providersCount' , 'touristsCount' , 'tripsCount'));
    }
}
