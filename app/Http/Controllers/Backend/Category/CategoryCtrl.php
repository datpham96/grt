<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryCtrl extends Controller
{
    public function categorys() {
        return view('backend.category.category');
    }
}
