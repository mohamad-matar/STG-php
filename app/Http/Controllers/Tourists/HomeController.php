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
            $category = Category::find($category_id);
            $name = "name_$locale";
            $categoryName = $category->$name;

            $search = $request->search;
            $places = $category->places()
                ->select("id", "name_$locale as name", "description_$locale as description", "province_id" ,"image_id")
                ->when($search, function ($q) use ($search) {
                    return $q->where('name_ar',  'like', "%$search%")
                        ->orWhere('name_en',  'like', "%$search%")
                        ->orWhere('description_ar',  'like', "%$search%")
                        ->orWhere('description_en',  'like', "%$search%");
                })
                ->with('province')
                ->get();
        }
        // return $places;

        return view('home.place', compact('places', 'categoryName' , 'category_id' , 'search'));
    }

    function showPlace($place_id)
    {
        $locale =   app()->getLocale();
        $place = Place::where('id', $place_id)->select("id", "name_$locale as name", "description_$locale as description", "image_id")
            ->with(['placeShows' => function ($q) use ($locale) {
                return $q->select("name_$locale as name", "image_id", "place_id");
            }])->first();

        return view('home.place-details', compact('place'));
    }
}
