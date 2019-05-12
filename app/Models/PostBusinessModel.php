<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class PostBusinessModel extends MyModel
{
    protected $table = 'post_business';

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
            $this->setFunctionCond('where', ['name', 'LIKE',"%$name%"]);
        }
        
        return $this;
    }

    //filter by business id
    public function filterbusinessId($businessId){
        if(!empty($businessId)){
            $this->setFunctionCond('where', ['business_id', $businessId]);
        }
        
        return $this;
    }

    //relationship
    public function categorys()
    {
        return $this->hasOne('App\Models\BusinessModel','id','business_id');
    }
}
