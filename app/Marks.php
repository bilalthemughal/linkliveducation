<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    //
    protected $fillable = ['marks', 'user_id', 'quiz_id'];
}
