<?php 

namespace App\Libs\Config;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\LinkModel;
use App\Models\SupportModel;

class Home {
	private $categoryModel;
	private $supportModel;
	private $linkModel;
	private $productModel;

	public function __construct(){
    	$this->categoryModel = new CategoryModel();
    	$this->supportModel = new SupportModel();
    	$this->linkModel = new LinkModel();
    	$this->productModel = new ProductModel();
    }

	public function getProduct(){
		$getProduct = $this->productModel->orderBy('created_at', 'desc')->limit(6)->get();

		return $getProduct;
	}


	public function getCategory(){
		$getCategory = $this->categoryModel->get();

		return $getCategory;
	}

	public function getLink(){
		$getLink = $this->linkModel->get();

		return $getLink;
	}

	public function getSupport(){
		$getSupport = $this->supportModel->get();

		return $getSupport;
	}

	public function strLimit($content,$limit){
		return str_limit($content,$limit);
	}

}