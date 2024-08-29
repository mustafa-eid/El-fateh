<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreviousWorkRequest;
use App\Models\Category;
use App\Models\PreviousWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreviousWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $previousWorks = PreviousWork::all();
        return view('dashboard.previousWorks.index', compact('previousWorks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.previousWorks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PreviousWorkRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('previous-works', 'public');
        }
        // Handling image upload
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagePaths = [];

            foreach ($images as $image) {
                $paths = $image->store('previous-works', 'public');
                $imagePaths[] = $paths;
            }

            $data['images'] = json_encode($imagePaths);
        }

        PreviousWork::create($data);

        return redirect()->route('previousWorks.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PreviousWork $previousWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PreviousWork $previousWork)
    {
        $categories = Category::all();

        return view('dashboard.previousWorks.edit', compact('previousWork', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PreviousWorkRequest $request, $id)
    {
        // Retrieve the existing record
        $previousWork = PreviousWork::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('pdf')) {
            if(isset($previousWork->pdf)){
                Storage::disk('public')->delete($previousWork->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('previous-works', 'public');
        }
        // Handling image upload
        if ($request->hasFile('images')) {

            $photos = json_decode($previousWork->images, true);
            foreach ($photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
            $images = $request->file('images');
            $imagePaths = [];

            foreach ($images as $image) {
                $paths = $image->store('previous-works', 'public');
                $imagePaths[] = $paths;
            }

            // Encode the new images as a JSON string
            $data['images'] = json_encode($imagePaths);
        }

        // Update the record with the new data
        $previousWork->update($data);

        return redirect()->route('previousWorks.index')->with('success', 'Data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreviousWork $previousWork)
    {
        if ($previousWork->pdf) {
            Storage::disk('public')->delete($previousWork->pdf);
        }
        // Delete associated image
        if ($previousWork->images) {
            $photos = json_decode($previousWork->images, true);
            foreach ($photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        $previousWork->delete();

        return redirect()->route('previousWorks.index')->with('success', 'Data deleted successfully.');
    }
}
