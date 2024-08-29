<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\RequestType;
use Illuminate\Http\Request;

class RequestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $requestTypes =RequestType::all();
       $requestServices =RequestService::all();
        return view('dashboard.request-types-services.index',compact('requestTypes','requestServices'));
    }

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
        RequestType::create($validate);
        return redirect()->route('request-types.index')->with('success', 'Data saved successfully');

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
    public function update(Request $request, RequestType $requestType)
    {
        $validate = $request->validate([
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
        ]);

        $requestType->update($validate);

        return redirect()->route('request-types.index')->with('success', 'Data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestType $requestType)
    {
        $requestType->delete();

        return redirect()->route('request-types.index')->with('success', 'Data deleted successfully');
    }
}
