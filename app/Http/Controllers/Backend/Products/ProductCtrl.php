<?php

namespace App\Http\Controllers\Backend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCtrl extends Controller
{
    public function products() {
        return view('backend.products.products');
    }

    public function productDetail() {
        return view('backend.products.productDetail');
    }
}
