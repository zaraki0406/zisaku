<?php

namespace App\Http\Controllers;
use App\Weight;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mypage() {

        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('mypage', ['my_user' => $user]);
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
        $user = DB::table('users')->find($id);
        $user->del_flg = 1;
        $user->save();
        return view('home');
    }

    public function weight(Request $request) {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('weight', [
        'my_user' => $user,]);
    }
}
