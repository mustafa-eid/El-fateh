<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::all();
        return view('dashboard.branches.index', compact('branches'));

    }

    public function create()
    {
        $branches = Branch::all();
        return view('dashboard.branches.create',compact('branches'));

    }

    public function store(BranchRequest $request)
    {
        $branch = Branch::create($request->only('en_name', 'ar_name', 'en_address', 'ar_address', 'latitude', 'longitude'));

        if ($request->has('phone_numbers')) {
            foreach ($request->phone_numbers as $phoneNumber) {
                $branch->phoneNumbers()->create($phoneNumber);
            }
        }
    
        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
        }

    public function edit(Branch $branch)
    {
        $mainBranch = Branch::first();

        return view('dashboard.branches.edit', compact('branch','mainBranch'));
    }

    public function update(BranchRequest $request, Branch $branch)
    {
        // Update branch details
        $branch->update($request->only(['en_name', 'ar_name', 'en_address', 'ar_address', 'latitude', 'longitude']));
    
        // Get existing phone numbers from the request
        $phoneNumbers = $request->input('phone_numbers', []);
    
        // Get existing phone numbers from the database
        $existingPhoneNumbers = $branch->phoneNumbers->keyBy('id');
    
        foreach ($phoneNumbers as $phoneNumber) {
            if (isset($phoneNumber['id']) && $existingPhoneNumbers->has($phoneNumber['id'])) {
                // Update existing phone number
                $existingPhoneNumbers[$phoneNumber['id']]->update([
                    'title' => $phoneNumber['title'],
                    'phone_number' => $phoneNumber['phone_number']
                ]);
            } else {
                // Create new phone number
                $branch->phoneNumbers()->create([
                    'title' => $phoneNumber['title'],
                    'phone_number' => $phoneNumber['phone_number']
                ]);
            }
        }
    
        // Delete phone numbers that were removed
        $existingPhoneNumbersIds = $existingPhoneNumbers->keys();
        $newPhoneNumbersIds = collect($phoneNumbers)->pluck('id')->filter();
        $idsToDelete = $existingPhoneNumbersIds->diff($newPhoneNumbersIds);
    
        foreach ($idsToDelete as $id) {
            $existingPhoneNumbers[$id]->delete();
        }
    
        return redirect()->route('branches.index')
                         ->with('success', 'Branch updated successfully.');
    }
    
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')
                         ->with('success', 'Branch deleted successfully.');
    }
}
