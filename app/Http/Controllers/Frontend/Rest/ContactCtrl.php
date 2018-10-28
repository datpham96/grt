<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Libs\Config\StatusCodeConfig;
use Mail;

class ContactCtrl extends Controller
{
    public function sendMail(Request $request){
    	$emailSelf = "datdudon96@gmail.com";
    	$title = "Báo giá sản phẩm";
    	$name = "Phạm Tiến Đạt";
    	$email = "datpt@newtel.vn";
    	$content = "Đây là nội dung của báo giá sản phẩm";
    	Mail::to($emailSelf)->send(new SendMail($title,$name,$email,$content));
    	if (Mail::failures()) {
	        return response()->json(['status' => StatusCodeConfig::CONST_VALIDATE_ERRORS], 422);
	    }

	    return response()->json(['status' => true], 200);
    }
}
