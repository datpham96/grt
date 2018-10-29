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

    public function getSearch(Request $request){
    	$search = $request->input('search','');

    	$getSearch = $this->productModel->filterName('3')->orderBy('created_at', 'desc')->with('categorys')->paginate(6);

    	return view('frontend.search.search', compact('getSearch','search'));
    }
}
