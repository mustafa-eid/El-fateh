<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneNumberRequest;
use App\Models\Branch;
use App\Models\ContactUs;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    
    public function index()
    {
        $phoneNumbers = PhoneNumber::with(['contactUs', 'branch'])->get();
        return view('dashboard.phone-numbers.index', compact('phoneNumbers'));
    }

    public function create()
    {
        $mainBranch = ContactUs::first();
        $branches = Branch::all();
        return view('dashboard.phone-numbers.create', compact('mainBranch', 'branches'));
    }
    public function showBranches()
    {
        $mainBranch = ContactUs::with('phoneNumbers')->first();
        $branches = Branch::with('phoneNumbers')->get();
        // return $branches;
        return view('dashboard.phone-numbers.show', compact('mainBranch', 'branches'));
    }

    public function store(PhoneNumberRequest $request)
    {
        $mainBranch = ContactUs::first();
        $phoneNumber =new PhoneNumber();
        $phoneNumber->en_title=$request->en_title;
        $phoneNumber->ar_title=$request->ar_title;
        $phoneNumber->phone_number=$request->phone_number;
        if ($request->branch_id==0) {
            $phoneNumber->contactUs_id=$mainBranch->id;
        }else{
            $phoneNumber->branch_id=$request->branch_id;
        }
        $phoneNumber->save();
        return redirect()->route('phone-numbers.index')->with('success', 'Phone number created successfully.');
    }


    public function edit($id)
    {
        $phoneNumber = PhoneNumber::findOrFail($id);
        $mainBranch = ContactUs::first();
        $branches = Branch::all();
        return view('dashboard.phone-numbers.edit', compact('phoneNumber', 'mainBranch', 'branches'));
    }


    public function update(PhoneNumberRequest $request, $id)
    {
        $mainBranch = ContactUs::first();
        $phoneNumber = PhoneNumber::findOrFail($id);
        $phoneNumber->en_title=$request->en_title;
        $phoneNumber->ar_title=$request->ar_title;
        $phoneNumber->phone_number=$request->phone_number;
        if ($request->branch_id==0) {
            $phoneNumber->contactUs_id=$mainBranch->id;
            $phoneNumber->branch_id=null;
        }else{
            $phoneNumber->contactUs_id=null;
            $phoneNumber->branch_id=$request->branch_id;
        }
        $phoneNumber->save();

        return redirect()->route('phone-numbers.index')->with('success', 'Phone number updated successfully.');
    }

 
    public function destroy($id)
    {
        $phoneNumber = PhoneNumber::findOrFail($id);
        $phoneNumber->delete();

        return redirect()->route('phone-numbers.index')->with('success', 'Phone number deleted successfully.');
    }
}
