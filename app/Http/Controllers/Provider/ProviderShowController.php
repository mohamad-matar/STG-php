<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider\ProviderShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProviderShowController extends Controller
{      
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
<<<<<<< HEAD
            'name_ar' => 'max:50',
            'name_en' => 'max:50',
            'image_id' => 'nullable|image|max:2000',
=======
            'name_ar' => 'nullable|max:50',
            'name_en' => 'nullable|max:50',
            'image_id' => 'image|max:2000',
>>>>>>> ba61e373a6f28c91ffad29a7e3edcd5f493b2a8e
            'provider_id' => 'required|exists:places,id',
        ]);

        // return $validated;
        if ($request->hasFile('image_id'))
            $validated['image_id'] = saveImg("provider-shows", $request->file('image_id'));

        ProviderShow::create($validated);

        return back()->with('success', 'تم إضافة الصورة بنجاح');
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProviderShow $providerShow)
    {
        $validated = $request->validate([
<<<<<<< HEAD
            'name_ar' => 'max:50',
            'name_en' => 'max:50',

            'image_id' => 'nullable|image|max:2000',
=======
            'name_ar' => 'nullable|max:50',
            'name_en' => 'nullable|max:50',

            'image_id' => 'image|max:2000',
>>>>>>> ba61e373a6f28c91ffad29a7e3edcd5f493b2a8e
        ]);

        if ($request->hasFile('image_id')) {
            /** delete old one */
<<<<<<< HEAD
            $placeShowImage = $providerShow->image;
            if ($placeShowImage) {
                Storage::disk('public')->delete($placeShowImage->name);
                $placeShowImage->delete();
=======
            $providerShowImage = $providerShow->image;
            if ($providerShowImage) {
                Storage::disk('public')->delete($providerShowImage->name);
                $providerShowImage->delete();
>>>>>>> ba61e373a6f28c91ffad29a7e3edcd5f493b2a8e
            }
            $validated['image_id'] = saveImg("provider-shows", $request->file('image_id'));
        }
        $providerShow->update($validated);

        return back()->with('success', 'تم تعديل الصورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProviderShow $providerShow)
    {
<<<<<<< HEAD
        $placeImage = $providerShow->image;
        if ($providerShow->image) {
            Storage::disk('public')->delete($placeImage->name);
            $placeImage->delete();
=======
        $provideShowImage = $providerShow->image;
        if ($provideShowImage) {
            Storage::disk('public')->delete($provideShowImage->name);
            $provideShowImage->delete();
>>>>>>> ba61e373a6f28c91ffad29a7e3edcd5f493b2a8e
        }
        $providerShow->delete();

        return back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
