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
                
            </div>
        </div>
    </div>
</div>
<div class>
    <button type='button' class='btn btn-secondary' onClick="history.back();">マイページに戻る</button>
</div>
@endsection

