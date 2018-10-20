<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class UserModal extends MyModel
{
    protected $table = 'users';
    public $timestamps = false;
    protected $hidden = ['password'];
}
