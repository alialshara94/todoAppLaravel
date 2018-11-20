<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //
    public $timestamps = false;
    protected $fillable =[ 'start_date'   ];

    public function todolist()
    {
       return $this->hasMany('App\Todolist'); 
    
    }
}
