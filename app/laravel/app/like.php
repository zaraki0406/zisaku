<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table = "likes";
    public function like(){
        return $this->belongsTo('App\user', 'user_id', 'id');
        return $this->belongsTo('App\post', 'post_id', 'id');
    }
    public function like_exist($user_id, $post_id) {
        return like::where('user_id', $user_id)->where('post_id', $post_id)->exists();

    }
}
