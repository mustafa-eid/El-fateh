<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function login(){
        return view('admin.login');
    }

    public function siginedin(){
        return view('admin.index');
    }
    public function signupView(){
        return view('admin.signup');
    }

    public function adminSignup(Request $request) {
        // Validation rules
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|string|max:20|unique:admins|regex:/^[0-9]{10,20}$/',
            'password' => 'required|string|min:8',
        ]);
    
        // Proceed with saving data if validation passes
        $admin = Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' =>  Hash::make($request->password),
        ]);
        // Auth::guard('admin')->loginUsingId($admin->id);
        // return redirect()->route('dashboard');
        return redirect()->route('login')->with('success', 'Waiting for approved registration');

    }
    

    public function adminSignin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password ,'status' => 'active'])) {

            // toastr()->success('تم تسجيل الدخول بنجاح ');

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Login failed, please check your email and password');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
        
    }

}