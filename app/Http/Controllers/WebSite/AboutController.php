<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
       $aboutUs= AboutUs::first();
        return view('website.about.index',compact('aboutUs'));
    }


}