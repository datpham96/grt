<?php

namespace App\Http\Controllers\Frontend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\LinkModel;
use App\Models\SupportModel;

class CategoryCtrl extends Controller
{
    private $categoryModel;
	private $supportModel;
	private $linkModel;
	private $productModel;

    public function __construct(ProductModel $productModel,
    							CategoryModel $categoryModel,
    							LinkModel $linkModel,
    							SupportModel $supportModel){
    	$this->categoryModel = $categoryModel;
    	$this->supportModel = $supportModel;
    	$this->linkModel = $linkModel;
    	$this->productModel = $productModel;
    }

    public function getCategoryDetail($id){
    	$getlistCateProduct = $this->productModel->filterCateId($id)->buildCond()->paginate(6);
    	$getProduct = $this->productModel->orderBy('created_at', 'desc')->limit(6)->get();
    	$getCategory = $this->categoryModel->get();
    	$getLink = $this->linkModel->get();
    	$getSupport= $this->supportModel->get();

    	return view('frontend.category.category', compact('getlistCateProduct','getProduct','getCategory','getLink','getSupport'));
    }
}
