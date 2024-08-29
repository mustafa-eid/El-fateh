<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {

        $aboutUs = AboutUs::first();
        return view('dashboard.aboutUs.index', compact('aboutUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        AboutUs::create($data);
        return redirect()->route('about-us.index')->with('success', 'Data saved successfully');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request,  $id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            if ($aboutUs->logo) {
                Storage::disk('public')->delete($aboutUs->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $aboutUs->update($data);
        return redirect()->route('about-us.index')->with('success', 'Data updated successfully.');
    }



}
