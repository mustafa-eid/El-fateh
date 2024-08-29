<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class WebBranchController extends Controller
{
    public function index(){
        $branches=Branch::get();
        $socialLinks=SocialMedia::get();
        return view('website.branches.index',compact('branches','socialLinks'));
    }
}
