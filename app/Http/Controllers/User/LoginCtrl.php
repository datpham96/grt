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
    		'email' =>'required',
    		'password' => 'required'
    	];
    	$messages = [
    		'email.required' => StatusCodeConfig::CONST_VALIDATE_EMAIL,
    		'password.required' => StatusCodeConfig::CONST_VALIDATE_PASSWORD,
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            return response()->json(["status" => StatusCodeConfig::CONST_VALIDATE_LOGIN_ERRORS], 422);
    	}
        
        $email = $request->input('email');
        $password = $request->input('password');

        
        $userInfo = $this->userModel->filterEmail($email)
                ->buildCond()->first();
           
        if($userInfo == NULL) {
            return response()->json(["status" => StatusCodeConfig::CONST_VALIDATE_LOGIN_ERRORS], 422);
        }
        if (app('hash')->check($password, $userInfo->password)) {
            Auth::attempt(['email' => $email, 'password' => $password]);
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
