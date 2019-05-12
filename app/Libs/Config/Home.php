<?php 

namespace App\Libs\Config;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\LinkModel;
use App\Models\SupportModel;
use App\Models\BusinessModel;
use App\Models\PostBusinessModel;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Home {
	private $categoryModel;
	private $supportModel;
	private $linkModel;
	private $productModel;
	private $businessModel;
	private $postBusinessModel;

	public function __construct(){
    	$this->categoryModel = new CategoryModel();
    	$this->supportModel = new SupportModel();
    	$this->linkModel = new LinkModel();
    	$this->productModel = new ProductModel();
    	$this->businessModel = new BusinessModel();
    	$this->postBusinessModel = new PostBusinessModel();
    }

	public function getProduct(){
		$getProduct = $this->productModel->orderBy('created_at', 'desc')->limit(6)->get();

		return $getProduct;
	}

	public function getProductByCate($id){
		$getData = $this->productModel->filterCateId($id)->buildCond()->orderBy('created_at', 'desc')->limit(3)->get();
		return $getData;
	}

	public function getBusinessByCate($id){
		$getData = $this->postBusinessModel->filterbusinessId($id)->buildCond()->orderBy('created_at', 'desc')->limit(3)->get();
		return $getData;
	}

	public function getCateBusiness(){
		$getData = $this->businessModel->get();

		return $getData;
	}

	public function getChild($parentId){

		$getData = $this->categoryModel->filterParentId($parentId)->buildCond()->get();

		return $getData;
	}


	public function getCategory(){
		$getCategory = $this->categoryModel->where('parent_id','=',0)->get();

		return $getCategory;
	}

	public function getCategoryInfo($id){
		$getInfo = $this->categoryModel->filterId($id)->buildCond()->first();

		return $getInfo;
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

	public function formatDate($date){
		return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
	}

	public function strWord($content,$num){
		return Str::words($content, $words = $num, $end = '...');
	}

}