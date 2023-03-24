@extends('layouts.app')
@section('content')
<div class="search">
    <form action="{{ route('post.search') }}" method="GET">
        @csrf

        <div class="form-group">
            <div>
                <label for="">キーワード
                <div>
                    <input type="text" name="keyword" value="{{ $keyword }}">
                </div>
                </label>
            </div>


            <div>
                <label for="">性別
                <div>
                    <select name="gender" data-toggle="select">
                    <option value="0">男性</option>
                    <option value="1">女性</option>
                    <option value="2">性別不詳</option>
                    </select>
                </div>
                </label>
            </div>

            <div>
                <input type="submit" class="btn btn-primary form-btn" value="検索">
            </div>
        </div>
    </form>
    <h1 class="header">他者の投稿</h1>
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="card-deck">
                @forelse($user_post as $post)
                <div class="col mb-5">
                    <div class="card" style="width: 300px;">
                        <div class="card-img-top" ><img src="{{ asset('storage'.$post->image)}}" style="width: 100%; background: white;" ></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post ->title}}</h5>
                            <p class="card-text">{{ $post ->date}}</p>
                            <p class="card-text">{{ $post ->comment}}</p>
                            <a href="{{ route('others.detail',['id' => $post['posts_id']]) }}" class="btn btn-primary">投稿詳細</a>
                        </div>
                    </div>
                </div>
                    @empty
                        <td>投稿がありません</td>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class=" d-flex justify-content-center">{{ $user_post->links() }}</div>

@endsection