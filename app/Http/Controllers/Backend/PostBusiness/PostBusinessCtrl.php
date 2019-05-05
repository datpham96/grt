<?php

namespace App\Http\Controllers\Backend\PostBusiness;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostBusinessCtrl extends Controller
{
    public function postBusiness() {
        return view('backend.postBusiness.postBusiness');
    }

    public function postDetailBusiness() {
        return view('backend.postBusiness.postDetailBusiness');
    }

    public function mainBusiness() {
        return view('backend.postBusiness.mainBusiness');
    }
}
