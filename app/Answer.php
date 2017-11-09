<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['id','user_id','question_id','text'];
}