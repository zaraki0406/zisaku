@extends('layouts.app')
@section('content')
<style>
.card {
    min-width: 220px;
    max-width: 270px;
    margin-bottom: 10px !important;
    margin: auto;
}
</style>
<p><img src="{{ asset('storage'.$my_user->image)}}" ></p>
<p>名前:{{ $my_user->name }}</p>
<div class="container-fluid d-flex justify-content-center">
    <div class="row">
        <div class="card-deck">
            <div class="card" style="width: 300px;">
                <div class="card-img-top" ><img src="{{ asset('storage'.$my_post->image)}}" style="width: 100%; background: white;" ></div>
                <div class="card-body">
                    <h3 class="card-title">{{ $my_post ->title}}</h3>
                    <span class="likesCount">いいね数{{$my_post->likes_count}}</span>
                    <p class="card-text">{{ $my_post ->date}}</p>
                    <p class="card-text">{{ $my_post ->comment}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class>
    <button type='button' class='btn btn-secondary' onClick="history.back();">マイページに戻る</button>
</div>

<button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#exampleModalCenter">
    投稿を削除
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">この投稿を削除しますか？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form method="POST" action="{{route('post.delete',['id' => $my_post['id']])}}">
                {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">
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