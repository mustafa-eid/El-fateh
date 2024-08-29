<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCategoryRequest;
use App\Models\ArticleArticleCategory;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articleCategories = ArticleCategory::all();
        return view('dashboard.article-categories.index', compact('articleCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.article-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleCategoryRequest $request)
    {
        $data = $request->validated();
        
        // Handling photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('article-categories', 'public');
        }
        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('article-categories', 'public');
        }
        
        ArticleCategory::create($data);

        return redirect()->route('article-categories.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       $category=ArticleCategory::findOrFail($id);
        return view('dashboard.article-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleCategoryRequest $request, $id)
    {
        $category=ArticleCategory::findOrFail($id);
        $data = $request->validated();

        // Handling photo upload
        if ($request->hasFile('photo')) {
            if(isset($category->photo)){
             Storage::disk('public')->delete($category->photo);
            }
            // Store new photo
            $data['photo'] = $request->file('photo')->store('article-categories', 'public');
        }
    

        $category->update($data);

        return redirect()->route('article-categories.index')->with('success', 'Data saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $category=ArticleCategory::findOrFail($id);

        if ($category->photo) {
            Storage::disk('public')->delete($category->photo);
        }
        if ($category->pdf) {
            Storage::disk('public')->delete($category->pdf);
        }
        
        $category->delete();

        return redirect()->route('article-categories.index')->with('success', 'Data deleted successfully.');
    }
}
