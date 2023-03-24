@extends('layouts.app')
@section('content')
<style>
.card {
    min-width: 220px;
    max-width: 270px;
    margin-bottom: 10px !important;
    margin: auto;
}

.loved i {
  color: red !important;
}
</style>

<p><img src="{{ asset('storage'.$my_user->image)}}" ></p>
<p>名前:{{ $my_user->name }}</p>
<div class="container-fluid d-flex justify-content-center">
    <div class="row">
        <div class="card-deck">
            <div class="card" style="width: 300px;">
                <div class="card-img-top" ><img src="{{ asset('storage'.$post->image)}}" style="width: 100%; background: white;" ></div>
                <div class="card-body">
                    <h3 class="card-title">{{ $post ->title}}</h3>
                    <p class="card-text">{{ $post ->date}}</p>
                    <p class="card-text">{{ $post ->comment}}</p>
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
                <p><img src="{{asset('storage'.$comment->image)}}">{{$comment->name}} {{$comment->text}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class>
    <button type='button' class='btn btn-secondary' onClick="history.back();">戻る</button>
</div>
@endsection

