<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weight extends Model
{
    protected $table = "weights";

    public function weight(){
        return $this->belongsToMany('App\user', 'user_id', 'id');
    }
}
