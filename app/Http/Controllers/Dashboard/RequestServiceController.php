<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use Illuminate\Http\Request;

class RequestServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //    $requestServices =RequestService::all();
    //     return view('dashboard.request-types-services.index',compact('requestServices'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
        ]);
        RequestService::create($validate);
        return redirect()->back()->with('success', 'Data saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
        ]);

        RequestService::findOrFail($id)->update($validate);

        return redirect()->back()->with('success', 'Data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RequestService::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
