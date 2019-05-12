<?php

namespace App\Http\Controllers\Frontend\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessModel;
use App\Models\PostBusinessModel;

class BusinessCtrl extends Controller
{

	private $businessModel;
	private $postBusinessModel;

    public function __construct(PostBusinessModel $postBusinessModel, BusinessModel $businessModel){
        $this->postBusinessModel = $postBusinessModel;
    	$this->businessModel = $businessModel;
    }

    public function getBusinessDetail($id){
    	$getlistCateBusiness = $this->postBusinessModel->filterbusinessId($id)->buildCond()->paginate(6);
        $getInfoCateBusiness = $this->businessModel->filterId($id)->buildCond()->first();

    	return view('frontend.business.business', compact('getlistCateBusiness','getInfoCateBusiness'));
    }

    public function getBusiness(){
    	$getIdBusiness = $this->businessModel->buildCond()->first();
    	$getlistCateBusiness = $this->postBusinessModel->filterbusinessId($getIdBusiness->id)->buildCond()->paginate(6);
        $getInfoCateBusiness = $this->businessModel->filterId($getIdBusiness->id)->buildCond()->first();

    	return view('frontend.business.business', compact('getlistCateBusiness','getInfoCateBusiness'));
    }



    public function getCateBusinessDetail(Request $request, $idCategory, $id){
    	$getCateBusinessDetail = $this->postBusinessModel->filterbusinessId($idCategory)
    										   ->filterId($id)->buildCond()->with('categorys')->first();

    	return view('frontend.business.businessDetail', compact('getCateBusinessDetail'));
    }
}
