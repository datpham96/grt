<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Validator;
use App\Libs\Config\StatusCodeConfig;

class CategoryCtrl extends Controller
{
    private $categoryModel;
    private $productModel;

    public function __construct(CategoryModel $categoryModel, ProductModel $productModel) {
        $this->categoryModel = $categoryModel;
        $this->productModel = $productModel;
    }

    public function list(Request $request){
        
        //lay danh sach
        $perPage = $request->input('perPage', 10);
        $freeText = $request->input('freeText', '');

        $resData = $this->categoryModel->filterName($freeText)->buildCond()->get();
                       
        return response()->json($resData);
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

        //thuc hien insert
        $cateId = $this->categoryModel->insertGetId([
            "name" => $name,
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

        $categoryInfo = $this->categoryModel
                            ->filterId($id)
                            ->buildCond()->first();
        if(empty($categoryInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }

        //thuc hien update
        $categoryInfo->name = $name;
        $categoryInfo->updated_at = Date('Y-m-d H:i:s');
        $categoryInfo->save();

        return response()->json(['status' => true]);
    }

    public function delete($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:category,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $productInfo = $this->productModel->filterCateId($id)->buildCond()->first();

        if(!empty($productInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_STATUS_CHECK_ID_CATEGORY_EXISTS], 422);
        }
        //thuc hien xoa
        $this->categoryModel->filterId($id)->buildCond()->delete();

        return response()->json(['status' => true]);
    }
}
