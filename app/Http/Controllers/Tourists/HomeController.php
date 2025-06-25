<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Place;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        $places = Place::select("id" , "name_$locale as name" , "description_$locale as description" ,"image_id")->get();
        // return $places;
        return view('home.index' , compact('places'));
    }
}
