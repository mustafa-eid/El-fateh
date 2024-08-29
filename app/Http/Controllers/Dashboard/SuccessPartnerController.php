<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuccessPartnerRequest;
use App\Models\SuccessPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuccessPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $successPartners = SuccessPartner::all();
        return view('dashboard.success-partners.index', compact('successPartners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.success-partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuccessPartnerRequest $request)
    {
        $data = $request->validated();
        
        // Handling photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('success-partners', 'public');
        }
        
        SuccessPartner::create($data);

        return redirect()->route('success-partners.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuccessPartner $successPartner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuccessPartner $successPartner)
    {
        return view('dashboard.success-partners.edit', compact('successPartner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuccessPartnerRequest $request, SuccessPartner $successPartner)
    {
        $data = $request->validated();

        // Handling photo upload
        if ($request->hasFile('photo')) {
            if(isset($successPartner->photo)){
             Storage::disk('public')->delete($successPartner->photo);
            }
            // Store new photo
            $data['photo'] = $request->file('photo')->store('success-partners', 'public');
        }

        $successPartner->update($data);

        return redirect()->route('success-partners.index')->with('success', 'Data saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuccessPartner $successPartner)
    {
        if ($successPartner->photo) {
            Storage::disk('public')->delete($successPartner->photo);
        }
        
        $successPartner->delete();

        return redirect()->route('success-partners.index')->with('success', 'Data deleted successfully.');
    }
}
