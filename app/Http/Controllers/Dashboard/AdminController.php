<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index()
    {
        $admins = Admin::all();
        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {

        Admin::create($request->all());
        return redirect()->route('admins.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {

        return view('dashboard.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        if ($request->password) {
         $admin->update($request->all());
        }else{
            $admin->update($request->except('password'));
        }
        return redirect()->route('admins.index')->with('success', 'Data saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {

        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Data deleted successfully.');
    }

}
