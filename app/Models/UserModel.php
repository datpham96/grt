<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class UserModel extends MyModel
{
    protected $table = 'users';
    public $timestamps = false;
    protected $hidden = ['email', 'password'];

    //filter by email
    public function filterEmail($email){
        if(!empty($email)){
            $this->setFunctionCond('where', ['email', $email]);
        }
        
        return $this;
    }

    //filter by account
    public function filterAccount($account){
        if(!empty($account)){
            $this->setFunctionCond('where', ['account', $account]);
        }
        
        return $this;
    }

    //filter by id
    public function filterId($id){
        if(!empty($id)){
            $this->setFunctionCond('where', ['id', $id]);
        }
        
        return $this;
    }
}
