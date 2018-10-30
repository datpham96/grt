<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\UserModel;
use App\Libs\Config\StatusCodeConfig;
use Validator, DB, Auth;

class LoginCtrl extends Controller
{
    use AuthenticatesUsers;

    private $userModel;

    function __construct(UserModel $userModel) {
        // $this->redirectTo = route('defaultPageAfterLogin');
        $this->middleware('guest')->except('logout');
        $this->userModel = $userModel;
    }

    public function getLogin() {
    	return view('user.login');
    }

    public function postLogin(Request $request) {
    	$rules = [
    		'account' =>'required',
    		'password' => 'required'
    	];
    	$messages = [
    		'account.required' => StatusCodeConfig::CONST_VALIDATE_ACCOUNT,
    		'password.required' => StatusCodeConfig::CONST_VALIDATE_PASSWORD,
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            return response()->json(["status" => StatusCodeConfig::CONST_VALIDATE_LOGIN_ERRORS], 422);
    	}
        
        $account = $request->input('account');
        $password = $request->input('password');

        
        $userInfo = $this->userModel->filterAccount($account)
                ->buildCond()->first();
           
        if($userInfo == NULL) {
            return response()->json(["status" => StatusCodeConfig::CONST_VALIDATE_LOGIN_ERRORS], 422);
        }
        if (app('hash')->check($password, $userInfo->password)) {
            Auth::attempt(['account' => $account, 'password' => $password]);
            return response()->json(["status" => true]);
        }else{
            return response()->json(["status" => StatusCodeConfig::CONST_VALIDATE_LOGIN_ERRORS], 422);
        };
        
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
