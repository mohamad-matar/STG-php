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
        $branches = $provider->branches()->with('place.province')->get();
        // return $branches;
        return  view('dashboard.branches.index', compact( 'branches'));
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
        $places = Place::get(["id" , "name_ar as name"]);
        
        return view('dashboard.branches.create', compact( 'places'));
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
            'place_id' => 'required|exists:places,id',

            'contactType' => 'nullable|array',
            'contactType.*' => "in:landphone,mobile,whatsapp,telegram",
            'contactValue' => 'nullable|array',
            'contactValue.*' => 'string:max:100',
        ]);

        $currProvider = User::find(Auth::user()->id)->provider;

        if ($request->hasFile('image_id')) {
            $validated['image_id'] = saveImg("branch-cover", $request->file('image_id'));
        }
        $branch =  $currProvider->branches()->create($validated);
        // return $branch; 
        if ($request->contactType) {            
            foreach ($validated['contactType'] as $i => $contactType) {
                $branch->contacts()->create([
                    'type' => $contactType,
                    'value' => $validated['contactValue'][$i]
                ]);
            }
        }
        
        return to_route('provider.branches.index')->with('success', 'تم  إضافة الفرع بنجاح');
    }

    function edit(Branch $branch)
    {
        $places = Place::get(["id" , "name_ar as name"]);
        $contacts = $branch->contacts;

        return view('dashboard.branches.edit', compact('branch', 'places' , 'contacts'));
    }

    function update(Request $request , Branch $branch)
    {
        $validated = $request->validate([
            'name_ar' => 'required|max:100',
            'name_en' =>  'required|max:100',
            'description_ar' => 'nullable:max:100',
            'description_en' =>  'nullable|max:100',
            'image_id' => 'nullable|image|max:2000',
            'place_id' => 'required|exists:places,id',

            'contactType' => 'nullable|array',
            'contactType.*' => "in:landphone,mobile,whatsapp,telegram",
            'contactValue' => 'nullable|array',
            'contactValue.*' => 'string:max:100',
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
        if ($request->contactType) {
            $branch->contacts()->delete();
            foreach ($validated['contactType'] as $i => $contactType) {
                $branch->contacts()->create([
                    'type' => $contactType,
                    'value' => $validated['contactValue'][$i]
                ]);
            }
        }

        return to_route('provider.branches.index')->with('success', 'تم  تعديل الفرع بنجاح');        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        // return $branch;
        $branchShows = $branch->branchShows;
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
        $branchImage = $branch->image;
        if ($branchImage) {
            Storage::disk('public')->delete($branchImage->name);
            $branchImage->delete();
        }
        $branch->delete();

        return back()->with('success', 'تم حذف الفرع بنجاح');
    }
}
