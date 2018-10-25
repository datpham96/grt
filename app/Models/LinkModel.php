<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class LinkModel extends MyModel
{
    protected $table = 'links';

    //filter by id
    public function filterId($id){
        if(!empty($id)){
            $this->setFunctionCond('where', ['id', $id]);
        }
        
        return $this;
    }

     //filter by name
    public function filterName($name){
        if(!empty($name)){
            $this->setFunctionCond('where', ['name','LIKE', "%$name%"]);
        }
        
        return $this;
    }
}
