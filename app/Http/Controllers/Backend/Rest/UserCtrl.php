<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Auth, DB, Validator;
use App\Libs\Config\StatusCodeConfig;

class UserCtrl extends Controller
{
    private $userModel;

    public function __construct(UserModel $userModel){
    	$this->userModel = $userModel;
    }

    //get info current user
    public function authUser()
    {
        return response()->json(auth()->user());
    }

    //update user current
    public function updateUserSelf(Request $request)
    {
        $validator = $this->_validateUpdateUser($request);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();

        $userInfo = $this->userModel->filterId($user->id)
        ->buildCond()->first();

        if ($userInfo == null) {
            return response()->json(['message' => StatusCodeConfig::CONST_STATUS_USER_NOT_EXISTS], 422);
        }

        //Request User
        $avatar_name = '';
        if ($request->hasFile('avatar')) {

            $avatar_name = $request->avatar->store('public/avatars');
        }else{
            $avatar_name = $userInfo->avatar;
        }

        $userOldInfo = $this->userModel->filterId($user->id)->buildCond()->first();

        DB::beginTransaction();
        try {
        	if($this->_isChangeUserInfo($userOldInfo, $request->name, $request->phone, $avatar_name, $request->account)){
        		// Thực hiện update user
	            $userInfo->name = $request->name;
                $userInfo->phone = $request->phone;
	            $userInfo->account = $request->account;
	            $userInfo->avatar = $avatar_name;
	            $userInfo->save();
        	}
            
            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
        }
    }

    //update password current user
    public function updatePasswordSelf(Request $request)
    {
        $validator = $this->_validatePassword($request);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();

        $userInfo = $this->userModel->filterId($user->id)
        ->buildCond()->first();

        if ($userInfo == null) {
            return response()->json(['message' => StatusCodeConfig::CONST_STATUS_USER_NOT_EXISTS], 422);
        }
        if (app('hash')->check($request->currentPassword, $userInfo->password)) {
            $userInfo->password = app('hash')->make($request->newPassword);
            $userInfo->save();
            Auth::attempt(['account' => $user->account, 'password' => $request->newPassword]);
            return response()->json(['status' => true], 200);
        }
        return response()->json(['status' => false], 422);
    }

    //validate change password current user
    public function _validatePassword($request)
    {
        $validator = Validator::make($request->all(), [
            'newPassword' => 'required',
        ], [
            'newPassword.required' => StatusCodeConfig::CONST_STATUS_NEW_PASSWORD_NOT_EMPTY,
        ]
    );
        return $validator;
    }

    //validate update user current
    public function _validateUpdateUser($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'account' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'account.required' => StatusCodeConfig::CONST_VALIDATE_ACCOUNT,
            'phone.required' => StatusCodeConfig::CONST_VALIDATE_PHONE,
        ]
    );

        return $validator;
    }

    //check change info current user
    private function _isChangeUserInfo($oldInfo, $name, $phone, $avatar, $account)
    {
        $result = false;
        if ($oldInfo->name != $name or
            $oldInfo->phone != $phone or
            $oldInfo->avatar != $avatar or
            $oldInfo->account != $account
        ) {
            $result = true;
        }
        return $result;
    }
}
