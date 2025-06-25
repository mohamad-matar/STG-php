<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $locale =   app()->getLocale();

        $search = $request->search;

        $category_id = $request->category_id;
        if ($category_id) {
            $category = Category::find($category_id);
            $name = "name_$locale";
            $categoryName = $category->$name;

            $places = $category->places()
                ->select("id", "name_$locale as name", "description_$locale as description", "province_id", "image_id")
                ->when($search, function ($q) use ($search) {
                    return $q->where('name_ar',  'like', "%$search%")
                        ->orWhere('name_en',  'like', "%$search%")
                        ->orWhere('description_ar',  'like', "%$search%")
                        ->orWhere('description_en',  'like', "%$search%");
                })
                ->with('province')
                ->withAvg('tourists', 'place_tourist.evaluate')
                ->get();
        } else
            return redirect()->route('home.index')->with('error', '');

        // return $places;

        return view('places.index', compact('places', 'categoryName', 'category_id', 'search'));
    }

    function show(PLace $place)
    {
        $locale =   app()->getLocale();
        $place = Place::where('id', $place->id)->select("id", "name_$locale as name", "description_$locale as description", "image_id")
            ->with(['placeShows' => function ($q) use ($locale) {
                return $q->select("name_$locale as name", "image_id", "place_id");
            }])->first();

        return view('places.show', compact('place'));
    }

    function eval(Place $place,  Request $request)
    {
        $validated = $request->validate([
            'evaluate' => 'in:1,2,3,4,5',
        ]);
        // return $place;
        $currTourist = Auth::user()->tourist->id;
        if ($place->tourists()->where('tourist_id', $currTourist)->first())
            $place->tourists()->updateExistingPivot($currTourist, $validated);
        else
            $place->tourists()->attach($currTourist, $validated);

        return back()->with('success', __('stg.success'));
    }

    function comment(Place $place,  Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|max:200',
            'type' => 'nullable|in:comment,complain'
        ]);
        // return $place;

        $place->comments()->create(['tourist_id' => Auth::user()->tourist->id, 'comment' => $validated['comment']]);
        return back()->with('success', __('stg.success'));
    }
}
