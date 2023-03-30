@extends('layouts.app')
@section('content')
<style>
.card {
    margin-bottom: 10px !important;
}

.loved i {
  color: red !important;
}
</style>
<div class="d-flex flex-column align-items-center mx-5">

    <p><img src="{{ asset('storage'.$my_user->image)}}" class="rounded-circle float-left" width="200" height="200" style="background: #cce5ff;"></p>
    <h3>投稿者:{{ $my_user->name }}</h3>
</div>

<div class="d-flex flex-column align-items-center ">
    <div class="card-deck " style="width: 1000px;" >
        <div class="card align-items-center pt-3">
            <div class="d-flex flex justify-content-center" >
                <img src="{{ asset('storage'.$post->image)}}" style="width: 200px; background: white;" >
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title">タイトル：{{ $post ->title}}</h3>
                    <p class="card-text">日付：{{ $post ->date}}</p>
                    <h4 class="card-text">{{ $post ->comment}}</h4>
                </div>
            </div>
        
            <!-- 他ユーザーに -->
            @if($like_model->like_exist(Auth::user()->id,$post->id))
            <p class="favorite-marke d-flex  align-items-center" >
            <button class="js-like-toggle loved"  data-postid="{{ $post->id }}"><i class="fas fa-heart"></i>いいね</button><span class="likesCount">{{$post->likes_count}}</span>
            </p>
            @else
            <p class="favorite-marke d-flex  align-items-center">
            <button class="js-like-toggle"  data-postid="{{ $post->id }}"><i class="fas fa-heart"></i>いいね</button><span class="likesCount">{{$post->likes_count}}</span>
            
            </p>
            @endif
            <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            </div>
            
    </div>
</div>
<div class="d-flex flex-column align-items-center mt-3">
    <div class="card-deck " style="width: 1000px;">
        <div class="card align-items-center pt-3" style="width: 1000px;" >
            <form method="POST" action="{{ route('others.comment',['id' => $post['id']]) }}" >
                @csrf
                <div class="form-group row">

                    <div class="d-flex">
                        <div class="col-xs-2">
                            <textarea id="text" class="form-control" name="text" placeholder = '投稿するコメントを入力'></textarea>

                        </div>
                            <button type="submit" class="btn btn-primary btn-sm mx-3 my-2" >
                                {{ __('コメント投稿') }}
                            </button>
                    </div>
                </div>
            </form>
            <h3>コメント欄</h3>
            @foreach($user_comment as $comment)
            <p class= "d-flex justify-content-center"><img src="{{asset('storage'.$comment->image)}}" class="rounded-circle float-left" width="50" height="50" style="background: #cce5ff;">ユーザー:{{$comment->name}} <br> {{$comment->text}}</p>
            @endforeach
        </div>
    </div>
</div>
<div class = "d-flex flex-column align-items-center">
    <button type='button' class='btn btn-secondary' onClick="history.back();">戻る</button>
</div>
@endsection

