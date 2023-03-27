@extends('layouts.app')
@section('content')
<div class="container-fluid d-flex justify-content-center mx-5"><h1 class="header">いいねした投稿</h1></div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="card-deck">
                @forelse($user_post as $post)
                    <div class="card" style="width: 300px;">
                        <div class="card-img-top" ><img src="{{ asset('storage'.$post->image)}}" style="width: 100%; background: white;" ></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post ->title}}</h5>
                            <p class="card-text">{{ $post ->date}}</p>
                            <p class="card-text">{{ $post ->comment}}</p>
                            <a href="{{ route('others.detail',['id' => $post['id']]) }}" class="btn btn-primary">投稿詳細</a>
                        </div>
                    </div>
                @empty
                    <td>投稿がありません</td>
                @endforelse
            </div>
            <div class=" d-flex justify-content-center">{{ $user_post->links() }}</div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
        <a href="mypage">
            <button type='button' class='btn btn-secondary'>マイページに戻る</button>
        </a>
</div>

@endsection