<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $admin=Admin::findOrFail(auth()->guard('admin')->user()->id);
        return view('dashboard.setting.index',compact('admin'));
    }

    public function update(AdminRequest $request,$id)
    {
        $admin=Admin::findOrFail($id);
        $admin->update($request->all());
        return redirect()->back()->with('success', 'Data saved successfully.');
    }
}