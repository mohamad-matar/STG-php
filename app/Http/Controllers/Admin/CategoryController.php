<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|max:50',
            'name_en' => 'required|max:50',
        ]);
        Category::create($validated);
        return to_route('admin.categories.index')->with('success' , 'تم إضافة الخدمة بنجاح');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit' , compact('category')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name_ar' => 'required|max:50',
            'name_en' => 'required|max:50',
        ]);
        $category->update($validated);
        return to_route('admin.categories.index')->with('success', 'تم تعديل الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'تم حذف الخدمة بنجاح');

    }
}
