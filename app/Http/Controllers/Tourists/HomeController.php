<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function placeSearch(Request $request)
    {
        $locale =   app()->getLocale();

        $category_id = $request->category_id;
        if ($category_id) {
            $places = Category::find($category_id)->places()
                ->select("id", "name_$locale as name", "description_$locale as description", "province_id")
                ->with('province')
                ->get();
        }
        // return $places;
        return view('home.search', compact('places'));
    }

    function showPlace(){
        
    }
}
