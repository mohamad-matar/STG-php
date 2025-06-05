<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlaceShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceShowController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'name_ar' => 'max:50',
            'name_en' => 'max:50',
            'image_id' => 'nullable|image|max:2000',
            'place_id' => 'required|exists:places,id',
        ]);

        // return $validated;
        if ($request->hasFile('image_id'))
            $validated['image_id'] = saveImg("place-shows", $request->file('image_id'));

        PlaceShow::create($validated);
           
        return back()->with('success', 'تم إضافة الصورة بنجاح');
    }  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlaceShow $placeshow)
    {
        $validated = $request->validate([
            'name_ar' => 'max:50',
            'name_en' => 'max:50',
     
            'image_id' => 'nullable|image|max:2000',  
        ]);

        if ($request->hasFile('image_id')) {
            /** delete old one */
            $placeShowImage = $placeshow->image;
            if ($placeShowImage){
                Storage::disk('public')->delete($placeShowImage->name);
                $placeShowImage->delete();
            }            
            $validated['image_id'] = saveImg("place-shows", $request->file('image_id'));
        }
        $placeshow->update($validated);
        
        return back()->with('success', 'تم تعديل الصورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlaceShow $placeshow)
    {        
        $placeImage = $placeshow->image;
        if($placeshow->image){
            Storage::disk('public')->delete($placeImage->name);
            $placeImage->delete();
        }
        $placeshow->delete();

        return back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
