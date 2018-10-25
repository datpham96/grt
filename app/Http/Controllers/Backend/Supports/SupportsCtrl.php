<?php

namespace App\Http\Controllers\Backend\Supports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportsCtrl extends Controller
{
    public function supports() {
        return view('backend.supports.supports');
    }
}
