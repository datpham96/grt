<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyModel;

class SupportModel extends MyModel
{
    protected $table = 'supports';

    //filter by email
    public function filterEmail($email){
        if(!empty($email)){
            $this->setFunctionCond('where', ['email', $email]);
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

    //filter by freeText
    public function filterFreeText($freeText){
        if(!empty($freeText))
        {
            $this->setFunctionCond('where', [function($query) use ($freeText){
                $query->where('name', 'like', "%$freeText%")
                ->orWhere('email', 'like', "%$freeText%")
                ->orWhere('phone', 'like', "%$freeText%");
            }]);
        }
        
        return $this;
    }
}
