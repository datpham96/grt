<?php

namespace App\Http\Controllers\Frontend\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactCtrl extends Controller
{
    public function getContact(){
    	return view('frontend.contact.contact');
    }
}
