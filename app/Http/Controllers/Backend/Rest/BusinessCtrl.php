<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessModel;
use App\Models\PostBusinessModel;
use Validator;
use App\Libs\Config\StatusCodeConfig;

class BusinessCtrl extends Controller
{
    private $businessModel;
    private $postBusinessModel;

    public function __construct(BusinessModel $businessModel, PostBusinessModel $postBusinessModel) {
        $this->businessModel = $businessModel;
        $this->postBusinessModel = $postBusinessModel;
    }

    public function list(Request $request){
        
        //lay danh sach
        $perPage = $request->input('perPage', 10);
        $freeText = $request->input('freeText', '');

        $resData = $this->businessModel->filterName($freeText)->buildCond()->get();
                       
        return response()->json($resData);
    }

    public function listParent(Request $request){

        $resData = $this->businessModel->filterParentId(0)->buildCond()->get();
                       
        return response()->json($resData);
    }

    public function businessAllParent(Request $request){

        $resData = $this->businessModel->get();

        $arrChild = [];
        foreach ($resData as $val) {
            if($val->parent_id > 0){
                $arrChild[] = $val->parent_id;
            }
        }

        $filtered = $resData->whereNotIn('id', $arrChild);
        
        return response()->json($filtered);
    }

    public function insert(Request $request){
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $name = $request->input('name','');
        $parent_id = $request->input('parent_id','');
        $parentId = 0;
        if($parent_id != null || $parent_id != ''){
        	$parentId = $parent_id;
        }

        //thuc hien insert
        $cateId = $this->businessModel->insertGetId([
            "name" => $name,
            "parent_id" => $parentId,
            "created_at" => Date('Y-m-d H:i:s'),
            "updated_at" => Date('Y-m-d H:i:s')
        ]);
        if(empty($cateId)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }
        return response()->json(['status' => true], 200);
    }

    public function update(Request $request, $id){
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $name = $request->input('name','');
        $parent_id = $request->input('parent_id','');
        $parentId = 0;
        if($parent_id != null || $parent_id != ''){
        	$parentId = $parent_id;
        }

        $dataInfo = $this->businessModel
                            ->filterId($id)
                            ->buildCond()->first();
        if(empty($dataInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }

        //thuc hien update
        $dataInfo->name = $name;
        $dataInfo->parent_id = $parentId;
        $dataInfo->updated_at = Date('Y-m-d H:i:s');
        $dataInfo->save();

        return response()->json(['status' => true]);
    }

    public function delete($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:business,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $dataInfo = $this->businessModel->filterParentId($id)->buildCond()->first();
        $dataInfoPostBusiness = $this->postBusinessModel->filterbusinessId($id)->buildCond()->first();

        if(!empty($dataInfo) || !empty($dataInfoPostBusiness)){
            return response()->json(['status' => StatusCodeConfig::CONST_STATUS_CHECK_ID_CATEGORY_EXISTS], 422);
        }
        //thuc hien xoa
        $this->businessModel->filterId($id)->buildCond()->delete();

        return response()->json(['status' => true]);
    }
}
