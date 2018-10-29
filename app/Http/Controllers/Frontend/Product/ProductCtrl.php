<?php

namespace App\Http\Controllers\Frontend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;

class ProductCtrl extends Controller
{
    private $productModel;

    public function __construct(ProductModel $productModel){
    	$this->productModel = $productModel;
    }

    public function getProduct(Request $request, $idCategory){
    	$getProduct = $this->productModel->filterCateId($idCategory)->buildCond()->orderBy('created_at', 'desc')->paginate(6);

    	return view('frontend.product.product', compact('getProduct'));
    }

    public function getCateProductDetail(Request $request, $idCategory, $id){
    	$getCateProductDetail = $this->productModel->filterCateId($idCategory)
    										   ->filterId($id)->buildCond()->with('categorys')->first();

    	return view('frontend.product.productDetail', compact('getCateProductDetail'));
    }

    public function getProductDetail(Request $request, $id){
        $getProductDetail = $this->productModel->filterId($id)->buildCond()->first();

        return view('frontend.product.productDetail', compact('getProductDetail'));
    }
}
