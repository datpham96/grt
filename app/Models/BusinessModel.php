<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class BusinessModel extends MyModel
{
     protected $table = 'business';

    //filter by id
    public function filterId($id){
        if(!empty($id)){
            $this->setFunctionCond('where', ['id', $id]);
        }
        
        return $this;
    }

    //filter by parentId
    public function filterParentId($parentId){
        if(!empty($parentId)){
            $this->setFunctionCond('where', ['parent_id', $parentId]);
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
