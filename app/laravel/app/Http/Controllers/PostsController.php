<?php

namespace App\Http\Controllers;
use App\post;
use App\user;
use App\like;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
  
    public function post_register(request $request){
        $request->validate([
            'image' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $id=Auth::id();
        $image = request()->file('image');
        $img_url = $image->storeAs('' ,$image ,'public');
        $post = new post;
        $post->user_id = $id;
        $post->title = $request->title;
        $post->date = $request->date;
        $post->comment = $request->comment;
        $post->image = $image;
        $post->save();
        return redirect('/mypage');
   }

    public function post_detail(int $id) {
        $posts = Post::query()->where('id','=',$id)->first();
        $myid = Auth::id();
        $user = DB::table('users')->find($myid);
        $like_model = new Like;
        $like = $like_model->where('post_id',$id)->get()->count();
        $posts ->likes_count = $like;
        return view('post_detail', ['my_user' => $user,'my_post' => $posts]);
    }
   

    public function others_detail(int $id) {
        $posts = Post::query()->where('id','=',$id)->first();
        $oid = $posts->user_id;
        $user = DB::table('users')->find($oid);
        $like_model = new Like;
        $like = $like_model->where('post_id',$id)->get()->count();
        $posts ->likes_count = $like;
        return view('others_detail', ['my_user' => $user,'post' => $posts,'like_model'=>$like_model]);
    }

    public function post_delete(int $id,Request $request) {
        $posts = Post::query()->where('id','=',$id)->first();
        $posts ->delete();
        return redirect('/mypage');
    }

    // いいね
    public function ajaxlike(Request $request)
    {

        $id = Auth::id();
        
        $post_id = $request->post_id;

        $like = new Like;
        $post = Post::findOrFail($post_id);

        $liked = Like::where('user_id',$id)->where('post_id',$post_id)->first();
        // 空でない（既にいいねしている）なら
        if (!$liked) {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = $id;
            $like->save();
        } else {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        //$likeC = $like->where('post_id',$id)->get()->count();
        $LikesCount = Like::where('post_id',$post_id)->get();
        $postLikesCount = $LikesCount->count();
        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}
