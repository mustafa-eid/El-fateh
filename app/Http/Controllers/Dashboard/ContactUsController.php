<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {

        $contactUs = ContactUs::first();
        return view('dashboard.contactUs.index', compact('contactUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactUsRequest $request)
    {
        ContactUs::create($request->all());
        return redirect()->route('contact-us.index')->with('success', 'Data saved successfully');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUsRequest $request,  $id)
    {
        $contactUs=ContactUs::findOrFail($id);
        $contactUs->update($request->all());
        return redirect()->route('contact-us.index')->with('success', 'Data saved successfully.');
    }



}
