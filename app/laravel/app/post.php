<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = "posts";
    public function post(){
        return $this->belongsTo('App\user', 'user_id', 'id');
    }

}
