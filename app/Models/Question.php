<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function subject(){
        return $this->hasOne(Subject::class , 'id' , 'subject_id');
    }
}
