<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Place;
use App\Models\PlaceShow;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $provice_id = $request->provice_id;
        $search = $request->search;

        $place = Place::with('province')
            ->when($provice_id, function ($q) use ($provice_id) {
                return $q->where('provice_id', $provice_id);
            })
            ->when($search, function ($q) use ($search) {
                return $q->where('title',  'like', "%$search%");
            });
        $places = $place->paginate(4);
        $placeCount = $place->count();

        $state = $search ? "[$search]" : ($provice_id ? Province::find($provice_id)->name : 'كافة ');
        return view('dashboard.places.index', compact('places', 'state', 'placeCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::select('id', 'name_ar as name')->get();
        $categories = Category::all();
        return view('dashboard.places.create', compact('provinces', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'name_ar' => 'required|max:50',
            'name_en' => 'required|max:50',
            'description_ar' => 'required|max:400',
            'description_en' => 'required|max:400',
            'province_id' => 'exists:provinces,id',
            'image_id' => 'nullable|image|max:2000',

            'categories' => 'nullable|array',
            'categories.*' => 'required|exists:categories,id',

            'image_shows' => 'nullable|array',
            'image_shows.name_ar.*' => 'max:50',
            'image_shows.name_en.*' => 'max:50',
            'image_shows.image_id.*' => 'required|image|max:2000',
        ]);

        if ($request->hasFile('image_id'))
            $validated['image_id'] = saveImg("places", $request->file('image_id'));

        $place = Place::create($validated);

        if ($request->categories) {
            $place->categories()->attach($request->categories);
        }

        if (isset($validated['image_shows'])) {
            $place_shows = $validated['image_shows'];
            foreach ($place_shows['name_ar'] as $k =>  $nameAr) {
                if (isset($place_shows['image_id'][$k]) && is_file($place_shows['image_id'][$k])) {

                    PlaceShow::create([
                        'name_ar' => $place_shows['name_ar'][$k],
                        'name_en' => $place_shows['name_en'][$k],
                        'image_id' => saveImg("place-shows", $place_shows['image_id'][$k]),
                        'place_id' => $place->id
                    ]);
                }
            }
        }

        if (Auth::user()->type == 'admin') {
            $returnPage = 'admin.places.index';
        } else {
            $returnPage = 'dashboard';
        }
        return to_route($returnPage)->with('success', 'تم إضافة المكان بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return  view('dashboard.places.show' , compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $provinces = Province::select('id', 'name_ar as name')->get();
        $categories = Category::all();
        $currCategory = $place->categories->modelKeys();

        return view('dashboard.places.edit', compact('place', 'provinces', 'categories', 'currCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $validated = $request->validate([
            'name_ar' => 'required|max:50',
            'name_en' => 'required|max:50',
            'description_ar' => 'required|max:400',
            'description_en' => 'required|max:400',
            'province_id' => 'exists:provinces,id',
            'image_id' => 'nullable|image|max:2000',

            'categories' => 'nullable|array',
            'categories.*' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image_id')) {
            /** delete old one */
            $placeImage = $place->image;
            if ($placeImage){
                Storage::disk('public')->delete($placeImage->name);
                $placeImage->delete();
            }            
            $validated['image_id'] = saveImg("places", $request->file('image_id'));
        }
        $place->update($validated);

        if (Auth::user()->type == 'admin') {
            $returnPage = 'admin.places.index';
        } else {
            $returnPage = 'dashboard';
        }
        return to_route($returnPage)->with('success', 'تم تعديل المكان بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        // return $place;
        $placeShows = $place->placeShows;
        // return $placeShows;
        if ($placeShows) {
            foreach ($placeShows as $placeShow) {
                $placeShowImage = $placeShow->image;
                if ($placeShowImage){
                    Storage::disk('public')->delete($placeShowImage->name);
                    $placeShowImage->delete();
                }
                $placeShow->delete();
            }
        }
        $placeImage = $place->image;
        if($place->image){
            Storage::disk('public')->delete($placeImage->name);
            $placeImage->delete();
        }    
        $place->delete();

        return back()->with('success', 'تم حذف المكان بنجاح');
    }
}
