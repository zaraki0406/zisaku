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
    <h3>名前:{{ $my_user->name }}</h3>
</div>
<div class="d-flex flex-column align-items-center mx-5">
    <div class="row" style="width: 1000px;">
        <div class="card-deck " style="width: 1000px;" >
            <div class="card">
                    <div class="card-img-top d-flex flex-column align-items-center" ><img src="{{ asset('storage'.$post->image)}}" style="width: 200px; background: white;" ></div>
                    <div class="card-body">
                        <h3 class="card-title">タイトル：{{ $post ->title}}</h3>
                        <p class="card-text">日付：{{ $post ->date}}</p>
                        <h4 class="card-text">{{ $post ->comment}}</h4>
                    </div>
               
                <!-- 他ユーザーに -->
                @if($like_model->like_exist(Auth::user()->id,$post->id))
                <p class="favorite-marke">
                <button class="js-like-toggle loved"  data-postid="{{ $post->id }}"><i class="fas fa-heart"></i>いいね</button>
                <span class="likesCount">{{$post->likes_count}}</span>
                </p>
                @else
                <p class="favorite-marke">
                <button class="js-like-toggle"  data-postid="{{ $post->id }}"><i class="fas fa-heart"></i>いいね</button>
                <span class="likesCount">{{$post->likes_count}}</span>
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
                <form method="POST" action="{{ route('others.comment',['id' => $post['id']]) }}" >
                    @csrf
                    <div class="form-group row">
                        <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('コメント') }}</label>

                        <div class="col-md-6">
                            <textarea id="text" class="form-control" name="text"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('コメント投稿') }}
                            </button>
                        </div>
                    </div>
                </form>
                @foreach($user_comment as $comment)
                <p><img src="{{asset('storage'.$comment->image)}}" class="rounded-circle float-left" width="50" height="50" style="background: #cce5ff;">ユーザー:{{$comment->name}} <br> {{$comment->text}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class = "d-flex flex-column align-items-center">
    <button type='button' class='btn btn-secondary' onClick="history.back();">戻る</button>
</div>
@endsection

