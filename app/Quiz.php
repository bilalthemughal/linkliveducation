<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    public function marks(){
        return $this->belongsTo('App\Marks');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
