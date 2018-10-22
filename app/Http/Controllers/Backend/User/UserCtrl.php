<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCtrl extends Controller
{
    public function userInfo(){
        return view('user.userInfo');
    }
}
