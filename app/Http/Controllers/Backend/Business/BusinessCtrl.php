<?php

namespace App\Http\Controllers\Backend\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessCtrl extends Controller
{
    public function business() {
        return view('backend.business.business');
    }
}
