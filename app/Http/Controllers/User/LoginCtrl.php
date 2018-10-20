<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginCtrl extends Controller
{
    use AuthenticatesUsers;

    public function getLogin() {
    	return view('user.login');
    }
}
