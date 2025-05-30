<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Province;
use Illuminate\Http\Request;
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
        $places = $place->paginate(7);
        $placeCount = $place->count();

        $state = $search ? "[$search]" : ($provice_id ? Province::find($provice_id)->name : 'كافة ');
        return view('dashboard.places.index', compact('places', 'state', 'placeCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        return view('dashboard.places.create', compact('provinces'));
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
            'image_shows.name_ar.*' => 'max:50',
            'image_shows.name_en.*' => 'max:50',
            'image_shows.image_id.*' => 'image|max:2000',
        ]);

        if ($img = $request->hasFile('image_id'))
            $validated['image_id'] = saveImg("places", $request->file('image_id'));

        $place = Place::create($validated);
        // return $validated['image_shows']['image_id'][0]? "file" : "not";

        if (isset($validated['image_shows'])) {
            $place_shows = $validated['image_shows'];
            foreach ($place_shows['name_ar'] as $k =>  $nameAr) {
                $place->placeShows()->create([
                    'name_ar' => $place_shows['name_ar'][$k],
                    'name_en' => $place_shows['name_en'][$k],
                    'image_id' => saveImg("places-show", $place_shows['image_id'][$k])
                ]);
            }
        }

        return to_route('admin.places.index')->with('success', 'place update successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return  $place->placeShows;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $provinces = Province::all();
        return view('dashboard.places.edit', compact('place', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $validated = $request->validate([
            'name_en' => 'required:max:50',
            'name_en' => 'required:max:50',
            'province_id' => 'exists:provinces,id',
            'image_id' => 'nullable|array',
            'image_id.*' => 'image|max:2000',
        ]);

        if ($request->hasFile('image_id')) {
            foreach ($request->file('image_id') as $img) {
                $place->placeShows()->create([
                    'image_id' => saveImg("places", $img)
                ]);
            }
        }
        $place->update($validated);

        return to_route('admin.places.index')->with('success', 'place update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $placeShows = $place->placeShows;
        if ($placeShows) {
            foreach ($placeShows as $placeShow) {
                $oldImage = $placeShow->image;
                Storage::disk('public')->delete($oldImage->name);
                $oldImage->delete();
            }
        }
        $place->delete();
        return back()->with('success', 'place deleted successfully');
    }
}
