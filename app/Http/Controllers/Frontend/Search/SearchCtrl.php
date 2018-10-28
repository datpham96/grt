<?php

namespace App\Http\Controllers\Frontend\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;

class SearchCtrl extends Controller
{
    private $productModel;

    public function __construct(ProductModel $productModel){
    	$this->productModel = $productModel;
    }

    public function getHome(Request $request){
    	$search = $request->input('search','');
    	$getProduct = $this->productModel->filterName($search)->orderBy('created_at', 'desc')->paginate(6);

    	return view('frontend.search.search', compact('getProduct'));
    }
}
