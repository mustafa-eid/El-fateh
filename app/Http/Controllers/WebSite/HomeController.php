<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\PreviousWork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::get();
        $aboutUs= AboutUs::first();
        return view('index',compact('categories','aboutUs'));
    }
    public function allPreviousWorks($category_id){
        $previousWorks=PreviousWork::where('category_id',$category_id)->get();
        return view('website.previousWorks.index',compact('previousWorks'));
    }
    public function previousWork($previousWork_id)
    {
        $previousWork=PreviousWork::findOrFail($previousWork_id);
        return view('website.previousWorks.previousWorkDetails',compact('previousWork'));
    }


}