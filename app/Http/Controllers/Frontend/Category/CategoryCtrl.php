<?php

namespace App\Http\Controllers\Frontend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class CategoryCtrl extends Controller
{
    private $categoryModel;
	private $productModel;

    public function __construct(ProductModel $productModel, CategoryModel $categoryModel){
        $this->productModel = $productModel;
    	$this->categoryModel = $categoryModel;
    }

    public function getCategoryDetail($id){
    	$getlistCateProduct = $this->productModel->filterCateId($id)->buildCond()->paginate(6);
        $getInfoCate = $this->categoryModel->filterId($id)->buildCond()->first();

    	return view('frontend.category.category', compact('getlistCateProduct','getInfoCate'));
    }
}
