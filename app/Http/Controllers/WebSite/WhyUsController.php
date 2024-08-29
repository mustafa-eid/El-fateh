<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index(){
       $reasons= WhyUs::all();
        return view('website.why.index',compact('reasons'));
    }
}