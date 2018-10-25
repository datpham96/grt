<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LinkModel;
use Validator;
use App\Libs\Config\StatusCodeConfig;

class LinkCtrl extends Controller
{
    private $linkModel;

    public function __construct(LinkModel $linkModel) {
        $this->linkModel = $linkModel;
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

        $resData = $this->linkModel->filterName($freeText)->buildCond()->paginate($perPage);
                       
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
        $link = $request->input('link','');
        $avatar = $request->input('avatar','');

        //thuc hien insert
        $linkId = $this->linkModel->insertGetId([
            "name" => $name,
            "link" => $link,
            "avatar" => $avatar, 
            "created_at" => Date('Y-m-d H:i:s'),
            "updated_at" => Date('Y-m-d H:i:s')
        ]);
        if(empty($linkId)){
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

        $linkInfo = $this->linkModel
                            ->filterId($id)
                            ->buildCond()->first();
        if(empty($linkInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }

        $name = $request->input('name','');
        $link = $request->input('link','');
        $avatar = $request->input('avatar','');
        
        //thuc hien update
        $linkInfo->name = $name;
        $linkInfo->link = $link;
        $linkInfo->avatar = $avatar;
        $linkInfo->updated_at = Date('Y-m-d H:i:s');
        $linkInfo->save();

        return response()->json(['status' => true]);
    }

    public function delete($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:links,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        //thuc hien xoa
        $this->linkModel->filterId($id)->buildCond()->delete();

        return response()->json(['status' => true]);
    }
}
