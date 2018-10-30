<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Libs\Config\StatusCodeConfig;
use Mail;
use Validator;

class ContactCtrl extends Controller
{
    private $emailSelf;

    public function __construct(){
        $this->emailSelf = config('info.emailSelf');
    }

    public function sendMail(Request $request){

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'content' => 'required',
            'captcha' => 'required|captcha',
        ], [
            'name.required' => StatusCodeConfig::CONST_VALIDATE_NAME,
            'title.required' => StatusCodeConfig::CONST_VALIDATE_TITLE,
            'email.required' => StatusCodeConfig::CONST_VALIDATE_EMAIL,
            'content.required' => StatusCodeConfig::CONST_VALIDATE_CONTENT,
            'captcha.required' => StatusCodeConfig::CONST_VALIDATE_CAPTCHA,
            'captcha.captcha' => StatusCodeConfig::CONST_VALIDATE_CHECK_CAPTCHA,
        ]);
        
        if ($validate->fails()) {
            return response()->json($validate->messages(), 422);
        }
    	$email = $request->input('email','');
    	$title = $request->input('title','');
    	$name = $request->input('name','');
    	$content = $request->input('content','');
        $emailSelf = config('info.emailSelf');

    	Mail::to($this->emailSelf)->send(new SendMail($title,$name,$email,$content));
    	if (Mail::failures()) {
	        return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
	    }

	    return response()->json(['status' => true], 200);
    }

    public function refereshCapcha(){
        return captcha_img('flat');
    }
}
