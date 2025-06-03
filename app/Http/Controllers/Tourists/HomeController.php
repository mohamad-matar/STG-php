<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){
        return view('home.index');
    }

    public function search(Request $request){
        $placeCategory = $request->placeCategory;
        $places = Place::all();
        return view('home.search' ,compact('places'));
    }
}
