@extends('layouts.app')
@section('content')
<style>
.card {
    margin-bottom: 10px !important;
}
</style>
<div class="d-flex flex-column align-items-center mx-5">
    <p><img src="{{ asset('storage'.$my_user->image)}}" class="rounded-circle float-left" width="200" height="200" style="background: white;"></p>
    <h3>名前:{{ $my_user->name }}</h3>
</div>

<div class="d-flex flex-column align-items-center mx-5">
    <div class="row " style="width: 1000px;">
        <div class="card-deck" style="width: 1000px;">
            <div class="card">
                <div class="card-img-top d-flex flex-column align-items-center" ><img src="{{ asset('storage'.$my_post->image)}}" style="width: 200px; background: white;" ></div>
                <div class="card-body">
                    <h3 class="card-title">タイトル：{{ $my_post ->title}}</h3>
                    <span class="likesCount">いいね数{{$my_post->likes_count}}</span>
                    <p class="card-text">日付：{{ $my_post ->date}}</p>
                    <h4 class="card-text">{{ $my_post ->comment}}</h4>
                    
            </div>
                @foreach($user_comment as $comment)
                <p><img src="{{asset('storage'.$comment->image)}}" class="rounded-circle float-left " width="50" height="50" style="background: white;">ユーザー:{{$comment->name}} <br> {{$comment->text}}</p>
                @endforeach
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#exampleModalCenter">
    投稿を削除
</button>
<br>
<div>
    <button type='button' class='btn btn-secondary' onClick="history.back();">戻る</button>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">この投稿を削除しますか？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form method="POST" action="{{route('post.delete',['id' => $my_post['id']])}}">
                {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary" style='background-color:red'>
                        {{ __('削除する') }}
                    </button>
                </form>
            </div>

            <div class="modal-body">
                <button type="submit" class="btn btn-primary"  data-dismiss="modal">
                    {{ __('キャンセル') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection