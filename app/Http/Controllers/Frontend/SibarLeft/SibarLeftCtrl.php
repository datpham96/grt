<?php

namespace App\Http\Controllers\Frontend\SibarLeft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\LinkModel;
use App\Models\SupportModel;

class SibarLeftCtrl extends Controller
{
    private $categoryModel;
	private $supportModel;
	private $linkModel;

    public function __construct(CategoryModel $categoryModel,
    							LinkModel $linkModel,
    							SupportModel $supportModel){
    	$this->categoryModel = $categoryModel;
    	$this->supportModel = $supportModel;
    	$this->linkModel = $linkModel;
    }

    public function getSibarLeft(){
    	$getCategory = $this->categoryModel->get();
    	$getLink = $this->linkModel->get();
    	$getSupport= $this->supportModel->get();

    	return view('frontend.sibarLeft.sibarLeft', compact('getCategory','getLink','getSupport'));
    }
}
