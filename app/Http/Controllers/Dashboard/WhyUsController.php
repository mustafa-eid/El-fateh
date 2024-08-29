<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhyUsRequest;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reasons = WhyUs::all();
        return view('dashboard.whyUs.index', compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.whyUs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyUsRequest $request)
    {
        
        WhyUs::create($request->all());

        return redirect()->route('reasons.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyUs $reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyUs $reason)
    {
        return view('dashboard.whyUs.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WhyUsRequest $request, WhyUs $reason)
    {

        $reason->update($request->all());

        return redirect()->route('reasons.index')->with('success', 'Data saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyUs $reason)
    {
        
        $reason->delete();

        return redirect()->route('reasons.index')->with('success', 'Data deleted successfully.');
    }
}
