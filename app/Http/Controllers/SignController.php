<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Console\ViewMakeCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignController extends Controller  
{
    public function index(){
        return View('login');
    }
    public function login(Request $request){
$request->validate([
    'email'=>['required','email','exists:users,email','max:50'],
    'password'=>['required','min:8'],
]);
if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password])){
return redirect()->route('index');
}else{
    return back()->withErrors([
        'email' => 'un correct email and password',
    ])->onlyInput('email');
}
    }
 public function register(){
return view('website.register');
 }
    public function createuser(Request $request){
        //dd($request);
        $request->validate([
        'ar_first_name'=>['required','min:3','max:50','alpha'],
        'ar_last_name'=>['required','min:3','max:50','alpha'],
        'en_first_name'=>['required','min:3','max:50','alpha'],
        'en_last_name'=>['required','min:3','max:50','alpha'],
        'email'=>['required','email','unique:users,email','max:100'],
        'password'=>['required','string','min:8','max:50'],
        'phone'=>['nullable','numeric','unique:users,phone'],
        'photo'=>'nullable|image|max:1048576',
        'gender'=>['in:male,female'],
        ]);
        $path="";
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $nameimg=$file->getClientOriginalName().date('y-m-d-h-i-s');
            $path=$file->storeAs('store',$nameimg,'public');
        }
       // $pas= Hash::make($request->password);
        $create=User::create($request->all());//['firstname'=>$request->firstname,'lastname'=>$request->lastname,'email'=>$request->email,'password'=>$pass,'type'=>'user','photo'=>$path,'number'=>$request->number]);
        Auth::login($create);
        return view('home');
            }
           

 public function logout(){
    Auth::logout();
    return redirect()->route('home');
        }

        //admin
        public function  indexadmin(){
            return View('admin.login');
        }
        public function loginadmin(Request $request){
        $request->validate([
            'email'=>['required','email','exists:admins,email','max:50'],
            'password'=>['required','min:8'],
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.index');
            }else{
                return back()->withErrors([
                    'email' => 'un correct email and password',
                ])->onlyInput('email');
            }
        }
        public function logoutadmin(){
            if(Auth::guard('admin')->user()){
                Auth::guard('admin')->logout();
                return redirect()->route('home');
            }else{
                abort(404);
            }
                }

}