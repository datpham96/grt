<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class PostModel extends MyModel
{
    protected $table = 'posts';

    //filter by id
    public function filterId($id){
        if(!empty($id)){
            $this->setFunctionCond('where', ['id', $id]);
        }
        
        return $this;
    }

    //filter by name
    public function filterName($name){
        if(!empty($id)){
            $this->setFunctionCond('where', ['name', 'LIKE','%$name%']);
        }
        
        return $this;
    }
}
