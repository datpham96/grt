<?php

namespace App\Http\Controllers\Frontend\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessCtrl extends Controller
{
    public function getBusiness(){

    	return view('frontend.business.business');
    }
}
