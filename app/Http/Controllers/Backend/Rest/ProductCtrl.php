<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Validator;
use App\Libs\Config\StatusCodeConfig;

class ProductCtrl extends Controller
{
    private $productModel;

    public function __construct(ProductModel $productModel) {
        $this->productModel = $productModel;
    }

    public function list(Request $request){
        //validate
        $validate = Validator::make($request->all(), [
            'page' => 'required|numeric',
            'perPage' => 'numeric',
        ], [
            'page.required' => StatusCodeConfig::CONST_STATUS_PAGE_NOT_EMPTY,
            'page.numeric' => StatusCodeConfig::CONST_STATUS_PAGE_FORMAT_ERR,
            'perPage.numeric' => StatusCodeConfig::CONST_STATUS_PAGE_FORMAT_ERR,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }
        
        //lay danh sach
        $perPage = $request->input('perPage', 10);
        $freeText = $request->input('freeText', '');

        $resData = $this->productModel->filterName($freeText)->buildCond()->with('categorys')->get();
                       
        return response()->json($resData);
    }

    public function insert(Request $request){
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'content.required' => StatusCodeConfig::CONST_VALIDATE_CONTENT,
            'category_id.required' => StatusCodeConfig::CONST_VALIDATE_PARENT_ID,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $name = $request->input('name','');
        $description = $request->input('description','');
        $content = $request->input('content','');
        $cateId = $request->input('category_id','');

        $avatar_name = '';
        if ($request->hasFile('avatar')) {
            $avatar_name = $request->avatar->store('public/products');
        }

        //thuc hien insert
        $productId = $this->productModel->insertGetId([
            "name" => $name,
            "description" => $description,
            "content" => $content,
            "category_id" => $cateId,
            "avatar" => $avatar_name, 
            "created_at" => Date('Y-m-d H:i:s'),
            "updated_at" => Date('Y-m-d H:i:s')
        ]);
        if(empty($productId)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }
        return response()->json(['status' => true], 200);
    }

    public function update(Request $request, $id){
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'content.required' => StatusCodeConfig::CONST_VALIDATE_CONTENT,
            'category_id.required' => StatusCodeConfig::CONST_VALIDATE_PARENT_ID,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $productInfo = $this->productModel
                            ->filterId($id)
                            ->buildCond()->first();
        if(empty($productInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }

        $name = $request->input('name','');
        $description = $request->input('description','');
        $content = $request->input('content','');
        $cateId = $request->input('category_id','');

        $avatar_name = '';
        if ($request->hasFile('avatar')) {
            $avatar_name = $request->avatar->store('public/products');
        }else{
        	$avatar_name = $productInfo->avatar;
        }
        
        //thuc hien update
        $productInfo->name = $name;
        $productInfo->description = $description;
        $productInfo->content = $content;
        $productInfo->category_id = $cateId;
        $productInfo->avatar = $avatar_name;
        $productInfo->updated_at = Date('Y-m-d H:i:s');
        $productInfo->save();

        return response()->json(['status' => true]);
    }

    public function delete($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:products,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        //thuc hien xoa
        $this->productModel->filterId($id)->buildCond()->delete();

        return response()->json(['status' => true]);
    }

    public function info($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:products,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        //thuc hien xoa
        $getInfo = $this->productModel->filterId($id)->buildCond()->with('categorys')->first();

        if(!$getInfo){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }

        return response()->json($getInfo);
    }


}
