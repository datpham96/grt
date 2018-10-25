<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportModel;
use Validator;
use App\Libs\Config\StatusCodeConfig;

class SupportCtrl extends Controller
{
    private $supportModel;

    public function __construct(SupportModel $supportModel) {
        $this->supportModel = $supportModel;
    }

    public function list(Request $request){
        //lay danh sach
        $perPage = $request->input('perPage', 10);
        $freeText = $request->input('freeText', '');

        $supportData = $this->supportModel->filterFreeText($freeText)->buildCond()->get();
                       
        return response()->json($supportData);
    }

    public function insert(Request $request){
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'phone.required' => StatusCodeConfig::CONST_VALIDATE_PHONE,
            'email.required' => StatusCodeConfig::CONST_VALIDATE_EMAIL,
            'email.email' => StatusCodeConfig::CONST_VALIDATE_EMAIL_DUPLICATE,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }
        $email = $request->input('email','');
        $name = $request->input('name','');
        $phone = $request->input('phone','');
        $avatar = $request->input('avatar','');

        // $avatar_name = '';
        // if ($request->hasFile('avatar')) {
        //     $avatar_name = $request->avatar->store('public/supports');
        // }

        $supportInfo = $this->supportModel
                            ->filterEmail($email)
                            ->buildCond()->first();
        if(!empty($supportInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_EMAIL_DUPLICATE], 422);
        }

        //thuc hien insert
        $supportId = $this->supportModel->insertGetId([
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "avatar" => $avatar, 
            "created_at" => Date('Y-m-d H:i:s'),
            "updated_at" => Date('Y-m-d H:i:s')
        ]);
        if(empty($supportId)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }
        return response()->json(['status' => true], 200);
    }

    public function update(Request $request, $id){
        //validate
        $validate = Validator::make(array_merge(['id' => $id],$request->all()), [
            'id' => 'required|exists:supports,id',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'phone.required' => StatusCodeConfig::CONST_VALIDATE_PHONE,
            'email.required' => StatusCodeConfig::CONST_VALIDATE_EMAIL
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        $supportInfo = $this->supportModel->filterId($id)->buildCond()->first();
        if(empty($supportInfo)){
            return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }
        // $avatar_name = '';
        // if ($request->hasFile('avatar')) {
        //     $avatar_name = $request->avatar->store('public/supports');
        // }else{
        //     $avatar_name = $supportInfo->avatar;
        // }
        
        $avatar = $request->input('avatar','');
        $name = $request->input('name','');
        $phone = $request->input('phone','');
        $email = $request->input('email','');
        //thuc hien update
        $supportInfo->name = $name;
        $supportInfo->phone = $phone;
        $supportInfo->email = $email;
        $supportInfo->avatar = $avatar;
        $supportInfo->updated_at = Date('Y-m-d H:i:s');
        $supportInfo->save();

        return response()->json(['status' => true]);
    }

    public function delete($id){
        //validate
        $validate = Validator::make(['id' => $id], [
            'id' => 'required|exists:supports,id',
        ], [
            'id.required' => StatusCodeConfig::CONST_STATUS_ID_NOT_EMPTY,
            'id.exists' => StatusCodeConfig::CONST_STATUS_ID_NOT_EXISTS,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }

        //thuc hien xoa
        $this->supportModel->filterId($id)->buildCond()->delete();

        return response()->json(['status' => true]);
    }
}
