<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class ProductModel extends MyModel
{
    protected $table = 'products';

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
            $this->setFunctionCond('where', ['name', $name]);
        }
        
        return $this;
    }

    //filter by category id
    public function filterCateId($cateId){
        if(!empty($cateId)){
            $this->setFunctionCond('where', ['category_id', $cateId]);
        }
        
        return $this;
    }

    //relationship
    public function categorys()
    {
        return $this->hasOne('App\Models\CategoryModel','id','category_id');
    }
}
