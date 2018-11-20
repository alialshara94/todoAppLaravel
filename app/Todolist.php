<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    //
    protected $table='todolists';
    protected $fillable =[
        'title',
        'content',
        'status',
        'photo_id',
        'date_id',
        'start_date',
        'end_date',
        
    ];

    // public function photo()
    // {
    //    return $this->morphMany('App\Photo','imageable'); 
       
    // }

}
