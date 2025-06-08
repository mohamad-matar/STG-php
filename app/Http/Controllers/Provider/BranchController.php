<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Place;
use App\Models\Provider\Branch;
use App\Models\Provider\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BranchController extends Controller
{
  
    /**
     * Display the specified all branch .
     */
    public function index()
    {
        $provider = User::find(Auth::user()->id)->provider;
        $branches = $provider->branches()->with('place')->get();
        // return $branches;
        return  view('dashboard.branches.index', compact('provider' , 'branches'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return  view('dashboard.branches.show', compact('branch'));
    }

    function create()
    {
        $currUser = User::find(Auth::user()->id);
        if (! $provider = $currUser->provider)
            $provider =  $currUser->provider()->create([]);

        $places = Place::get(["id" , "name_ar as name"]);
        
        return view('dashboard.branches.create', compact('provider', 'places'));
    }

    function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'name_ar' => 'required|max:100',
            'name_en' =>  'required|max:100',
            'description_ar' => 'nullable:max:100',
            'description_en' =>  'nullable|max:100',
            'image_id' => 'nullable|image|max:2000',
            'place_id' => 'required|exists:places,id'
        ]);

        $currProvider = User::find(Auth::user()->id)->provider;

        if ($request->hasFile('image_id')) {
            $validated['image_id'] = saveImg("branch-cover", $request->file('image_id'));
        }
        $currProvider->branches()->create($validated);
        
        return to_route('provider.branches.index')->with('success', 'تم  إضافة الفرع بنجاح');
    }

    function edit(Branch $branch)
    {
        $currUser = User::find(Auth::user()->id);
        if (! $provider = $currUser->provider)
            $provider =  $currUser->provider()->create([]);

        $places = Place::get(["id" , "name_ar as name"]);
        
        return view('dashboard.branches.edit', compact('branch','provider', 'places'));
    }

    function update(Request $request , Branch $branch)
    {
        $validated = $request->validate([
            'name_ar' => 'required|max:100',
            'name_en' =>  'required|max:100',
            'description_ar' => 'nullable:max:100',
            'description_en' =>  'nullable|max:100',
            'image_id' => 'nullable|image|max:2000',
            'place_id' => 'required|exists:places,id'
        ]);

        if ($request->hasFile('image_id')) {
            $oldImage =  Image::find($branch->image_id);
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage->name);
                $oldImage->delete();
            }
            $validated['image_id'] = saveImg("branch-cover", $request->file('image_id'));
        }
        $branch->update($validated);


        return to_route('provider.branches.index')->with('success', 'تم  تعديل الفرع بنجاح');        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $place)
    {
        // return $place;
        $branchShows = $place->branchShows;
        // return $branchShows;
        if ($branchShows) {
            foreach ($branchShows as $branchShow) {
                $branchShowImage = $branchShow->image;
                if ($branchShowImage) {
                    Storage::disk('public')->delete($branchShowImage->name);
                    $branchShowImage->delete();
                }
                $branchShow->delete();
            }
        }
        $branchImage = $place->image;
        if ($place->image) {
            Storage::disk('public')->delete($branchImage->name);
            $branchImage->delete();
        }
        $place->delete();

        return back()->with('success', 'تم حذف الفرع بنجاح');
    }
}
