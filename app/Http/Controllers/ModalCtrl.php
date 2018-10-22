<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalCtrl extends Controller
{
    function index($modalName){
        $view = 'Modal.' . $modalName;
        return view($view);
    }
}
