<?php

namespace App\Http\Controllers\Frontend\Introduce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroduceCtrl extends Controller
{
    public function getIntroduce(){
    	return view('frontend.introduce.introduce');
    }
}
