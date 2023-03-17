<?php

namespace App\Http\Controllers;
use App\Weight;
use App\post;
use App\user;
use App\like;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mypage() {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        $posts = Post::query()->where('user_id',$id)->get();
        $Oposts = Post::query()->where('user_id', '!=',$id)->get();
        return view('mypage', ['my_user' => $user,'my_post'=> $posts, 'user_post'=>$Oposts]);
    }

    public function profile_edit() {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('profile_edit', ['my_user' => $user]);
    }

    public function ProfileEdit(Request $request){
         $request->validate([
            'image' => 'file|image|mimes:jpeg,png,jpg|max:2048',
         ]);
         $user = Auth::user();
         $image = request()->file('image');
         $img_url = $image->storeAs('' ,$image ,'public');

         $user->name = $request->name;
         $user->height = $request->height;
         $user->image = $image;
         $user->gender = $request->gender;
         $user->profile = $request->profile;
         $user->save();
         return redirect('/mypage');
    }

    public function account_delete() {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('account_delete', ['my_user' => $user]);
    }

    public function account_logical_delete(Request $request) {
        $id = Auth::id();
        $user = new user;
        $delete = $user->find($id);
        $delete->del_flg = 1;
        $delete->save();
        return view('/mypage');
    }

    public function weight(Request $request) {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        //$weight = weight::where("")
        return view('weight', [
        'my_user' => $user,]);
    }

    public function new_post() {
        return view('post');
    }

    public function post_edit(int $id) {
        $posts = Post::query()->where('id','=',$id)->first();
        return view('post_edit', ['my_post' => $posts]);
    }

    
}
