<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class UserModel extends MyModel
{
    protected $table = 'users';
    public $timestamps = false;
    protected $hidden = ['password'];

    public function filterEmail($email){
        if(!empty($email)){
            $this->setFunctionCond('where', ['email', $email]);
        }
        
        return $this;
    }
}
