<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostBusinessModel;
use App\Models\BusinessModel;
use Validator;
use App\Libs\Config\StatusCodeConfig;

class PostBusinessCtrl extends Controller
{
    private $postModel;
    private $businessModel;

    public function __construct(PostBusinessModel $postModel, BusinessModel $businessModel) {
        $this->postModel = $postModel;
        $this->businessModel = $businessModel;
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

        $resData = $this->postModel->filterName($freeText)->buildCond()->paginate($perPage);
                       
        return response()->json($resData);
    }

    public function insert(Request $request){
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'description' => 'required'
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'content.required' => StatusCodeConfig::CONST_VALIDATE_CONTENT,
            'description.required' => StatusCodeConfig::CONST_VALIDATE_DESCRIPTION,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $name = $request->input('name','');
        $description = $request->input('description','');
        $content = $request->input('content','');
        $avatar = $request->input('avatar','');
        $business_id = $request->input('business_id','');

        // $avatar_name = '';
        // if ($request->hasFile('avatar')) {
        //     $avatar_name = $request->avatar->store('public/posts');
        // }

        //thuc hien insert
        $postId = $this->postModel->insertGetId([
            "name" => $name,
            "business_id" => $business_id,
            "description" => $description,
            "content" => $content,
            "avatar" => $avatar, 
            "created_at" => Date('Y-m-d H:i:s'),
            "updated_at" => Date('Y-m-d H:i:s')
        ]);
        if(empty($postId)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }
        return response()->json(['status' => true], 200);
    }

    public function update(Request $request, $id){
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'description' => 'required'
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'content.required' => StatusCodeConfig::CONST_VALIDATE_CONTENT,
            'description.required' => StatusCodeConfig::CONST_VALIDATE_DESCRIPTION,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $postInfo = $this->postModel
                            ->filterId($id)
                            ->buildCond()->first();
        if(empty($postInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }

        $name = $request->input('name','');
        $business_id = $request->input('business_id','');
        $description = $request->input('description','');
        $content = $request->input('content','');
        $avatar = $request->input('avatar','');

        // $avatar_name = '';
        // if ($request->hasFile('avatar')) {
        //     $avatar_name = $request->avatar->store('public/posts');
        // }else{
        // 	$avatar_name = $postInfo->avatar;
        // }
        
        //thuc hien update
        $postInfo->name = $name;
        $postInfo->business_id = $business_id;
        $postInfo->description = $description;
        $postInfo->content = $content;
        $postInfo->avatar = $avatar;
        $postInfo->updated_at = Date('Y-m-d H:i:s');
        $postInfo->save();

        return response()->json(['status' => true]);
    }

    public function delete($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:post_business,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        //thuc hien xoa
        $this->postModel->filterId($id)->buildCond()->delete();

        return response()->json(['status' => true]);
    }

    public function info($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:post_business,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        //thuc hien xoa
        $getInfo = $this->postModel->filterId($id)->buildCond()->first();

        if(!$getInfo){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }

        return response()->json($getInfo);
    }
}
