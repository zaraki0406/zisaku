<?php

namespace App\Http\Controllers;
use App\Weight;
use App\post;
use App\user;
use App\like;
use App\Http\Requests\EditUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mypage() {
        $role = Auth::user()->role;

        
        if($role === 0){
            return view('administrator_page');
        }elseif($role ===1){
            $id = Auth::id();
            $user = DB::table('users')->find($id);
            if(is_null($user->height)){
                $user->height ='?';
            };
            $posts = Post::query()->where('user_id',$id)->paginate(5);
            return view('mypage', ['my_user' => $user,'my_post'=> $posts]);
        };
        
        
    }


    public function profile_edit() {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('profile_edit', ['my_user' => $user]);
    }

    public function ProfileEdit(EditUser $request){
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
        Auth::logout();
        return view('/home');
    }

    public function weight(Request $request) {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        $weight = weight::where("user_id",$id)->get();
        $weight_data ='';
        $weight_date ='';
        foreach($weight as $weights){
            $weight_data = $weight_data.$weights->weight.',';
        };
        foreach($weight as $weights){
            $weight_date = $weight_date.$weights->date.',';
        };
        return view('weight', [
        'my_user' => $user,'weight_data'=>$weight_data,'weight_date'=>$weight_date]);
    }

    public function new_post() {
        return view('post');
    }

    public function post_edit(int $id) {
        $posts = Post::query()->where('id','=',$id)->first();
        if(is_null($posts)){
            abort(404);
        }
        return view('post_edit', ['my_post' => $posts]);
    }

    public function administrator_usersearch(Request $request) {
        $id = Auth::id();
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $query = user::query()->where('id', '!=',$id);
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('profile', 'LIKE', "%{$keyword}%");
        }
        if(!empty($gender)) {
            $query->where('gender', 'LIKE', "$gender");
        }
        
        $users = $query->paginate(5);
        return view('/administrator_usersearch', compact('users', 'keyword'));
    }
    public function account_admin_delete(int $id,request $request) {
        $user = user::query()->where('id','=',$id);
        if(is_null($user)){
            abort(404);
        }
        $user->delete();
        return redirect('/administrator_usersearch');
    }
}
