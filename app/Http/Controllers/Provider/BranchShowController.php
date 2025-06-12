<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider\BranchShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BranchShowController extends Controller
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
            'branch_id' => 'required|exists:branches,id',
        ]);

        // return $validated;
        if ($request->hasFile('image_id'))
            $validated['image_id'] = saveImg("branch-shows", $request->file('image_id'));

        BranchShow::create($validated);

        return back()->with('success', 'تم إضافة الصورة بنجاح');
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchShow $branchShow)
    {
        $validated = $request->validate([
            'name_ar' => 'nullable|max:50',
            'name_en' => 'nullable|max:50',

            'image_id' => 'image|max:2000',
        ]);

        if ($request->hasFile('image_id')) {
            /** delete old one */
            $branchShowImage = $branchShow->image;
            if ($branchShowImage) {
                Storage::disk('public')->delete($branchShowImage->name);
                $branchShowImage->delete();
            }
            $validated['image_id'] = saveImg("provider-shows", $request->file('image_id'));
        }
        $branchShow->update($validated);

        return back()->with('success', 'تم تعديل الصورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchShow $branchShow)
    {
        $branchShowImage = $branchShow->image;
        if ($branchShowImage) {
            Storage::disk('public')->delete($branchShowImage->name);
            $branchShowImage->delete();
        }
        $branchShow->delete();

        return back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
