<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
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
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        
        // Handling photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('categories', 'public');
        }
        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('categories', 'public');
        }
        
        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        // Handling photo upload
        if ($request->hasFile('photo')) {
            if(isset($category->photo)){
             Storage::disk('public')->delete($category->photo);
            }
            // Store new photo
            $data['photo'] = $request->file('photo')->store('categories', 'public');
        }
        if ($request->hasFile('pdf')) {
            if(isset($category->pdf)){
                Storage::disk('public')->delete($category->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Data saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->photo) {
            Storage::disk('public')->delete($category->photo);
        }
        if ($category->pdf) {
            Storage::disk('public')->delete($category->pdf);
        }
        
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Data deleted successfully.');
    }
}
