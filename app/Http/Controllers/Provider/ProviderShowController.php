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
            'name_ar' => 'nullable|max:50',
            'name_en' => 'nullable|max:50',
            'image_id' => 'image|max:2000',
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
            'name_ar' => 'nullable|max:50',
            'name_en' => 'nullable|max:50',

            'image_id' => 'image|max:2000',
        ]);

        if ($request->hasFile('image_id')) {
            /** delete old one */
            $providerShowImage = $providerShow->image;
            if ($providerShowImage) {
                Storage::disk('public')->delete($providerShowImage->name);
                $providerShowImage->delete();
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
        $provideShowImage = $providerShow->image;
        if ($provideShowImage) {
            Storage::disk('public')->delete($provideShowImage->name);
            $provideShowImage->delete();
        }
        $providerShow->delete();

        return back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
