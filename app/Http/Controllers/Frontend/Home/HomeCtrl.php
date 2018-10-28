<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;

class HomeCtrl extends Controller
{
	private $productModel;

    public function __construct(ProductModel $productModel){
    	$this->productModel = $productModel;
    }

    public function getHome(){
    	$getProduct = $this->productModel->orderBy('created_at', 'desc')->limit(6)->get();

    	return view('frontend.home.home', compact('getProduct'));
    }
}
