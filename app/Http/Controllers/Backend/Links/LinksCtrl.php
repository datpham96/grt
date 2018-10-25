<?php

namespace App\Http\Controllers\Backend\Links;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinksCtrl extends Controller
{
    public function links() {
        return view('backend.links.links');
    }
}
