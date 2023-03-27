<?php

namespace App\Http\Controllers;
use App\post;
use App\user;
use App\like;
use App\comment;
use App\Http\Requests\CreatePost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
  
    
    public function post_register(CreatePost $request){
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
        if(is_null($posts)){
            abort(404);
        }
        $myid = Auth::id();
        $user = DB::table('users')->find($myid);
        $like_model = new Like;
        $like = $like_model->where('post_id',$id)->get()->count();
        $posts ->likes_count = $like;
        $user_comment = DB::table('comments')->select('users.id as id','users.name as name','users.image as image','comments.id as comments_id','comments.user_id as user_id','comments.post_id as post_id','comments.text as text')->join('users','comments.user_id','=','users.id')->where('post_id','=',$id)->get();
        return view('post_detail', ['my_user' => $user,'my_post' => $posts,'user_comment'=> $user_comment]);
    }
   
    public function PostEdit(CreatePost $request) {
        $post = Post::query()->where('id','=',$request->id)->first();
        $request->validate([
            'image' => 'file|image|mimes:jpeg,png,jpg|max:2048',
         ]);
        $image = request()->file('image');
        $img_url = $image->storeAs('' ,$image ,'public');

        $post->title = $request->title;
        $post->date = $request->date;
        $post->image = $image;
        $post->comment = $request->comment;
        $post->save();
    
        return redirect('/mypage');
    }

    public function others_detail(int $id) {
        $posts = Post::query()->where('id','=',$id)->first();
        if(is_null($posts)){
            abort(404);
        }
        $oid = $posts->user_id;
        $user = DB::table('users')->find($oid);
        $like_model = new Like;
        $like = $like_model->where('post_id',$id)->get()->count();
        $posts ->likes_count = $like;
        $user_comment = DB::table('comments')->select('users.id as id','users.name as name','users.image as image','comments.id as comments_id','comments.user_id as user_id','comments.post_id as post_id','comments.text as text')->join('users','comments.user_id','=','users.id')->where('post_id','=',$id)->get();
        return view('others_detail', ['my_user' => $user,'post' => $posts,'like_model'=>$like_model,'user_comment'=> $user_comment]);
    }
    public function others_comment(int $id,Request $request) {
        $my_id=Auth::id();
       

        $comment =new comment;
        $comment->user_id = $my_id;
        $comment->post_id = $id;
        $comment->text = $request->text;
        $comment->save();

        return back();
    }

    public function post_delete(int $id,Request $request) {
        $posts = Post::query()->where('id','=',$id)->first();
        if(is_null($posts)){
            abort(404);
        }
        $posts ->delete();
        return redirect('/mypage');
    }

    public function post_search(Request $request)
    {
        $id = Auth::id();
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $query = Post::query()->select('posts.id as posts_id','posts.user_id as user_id','posts.title as title','posts.date as date','posts.image as image','posts.comment as comment','posts.hidden_flg as hidden_flg','users.name as name','users.gender as gender')->join('users','posts.user_id','=','users.id')->where('user_id', '!=',$id);
        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%");
        }
        if(!empty($gender)) {
            $query->where('gender', 'LIKE', "$gender");
        }
        
        $user_post = $query->paginate(5);
        return view('/post_search', compact('user_post', 'keyword'));
    }

    public function good_post()
    {
        $id = Auth::id();
        
        $user_post = Post::query()->select('likes.id as likes_id','likes.user_id as likes_user_id','likes.post_id as post_id','posts.id as id','posts.user_id as user_id','posts.title as title','posts.date as date','posts.image as image','posts.comment as comment','posts.hidden_flg as hidden_flg')->join('likes','posts.id','=','likes.post_id')->where('likes.user_id',$id)->paginate(5);
        return view('/good_post', compact('user_post'));
    }
    public function administrator_postsearch(Request $request)
    {
        $id = Auth::id();
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $query = Post::query()->select('posts.id as posts_id','posts.user_id as user_id','posts.title as title','posts.date as date','posts.image as image','posts.comment as comment','posts.hidden_flg as hidden_flg','users.name as name','users.gender as gender')->join('users','posts.user_id','=','users.id')->where('user_id', '!=',$id);
        
        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%");
        }
        if(!empty($gender)) {
            $query->where('gender', 'LIKE', "$gender");
        }
        
        $user_post = $query->paginate(5);
        return view('/administrator_postsearch', compact('user_post', 'keyword'));
    }
    public function post_admin_delete(int $id,Request $request) {
        $posts = Post::query()->where('id','=',$id)->first();
        if(is_null($posts)){
            abort(404);
        }
        $posts ->delete();
        return redirect('/administrator_postsearch');
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
