@extends('layouts.app')
@section('content')
<div class="d-flex flex-column align-items-center">
    <h4>管理者ページ</h4>
        <form action="{{ route('administrator.postsearch') }}" method="GET">
            @csrf
            <div class="form-group">
                    <label for="">キーワード
                        <input type="text" name="keyword" value="{{ $keyword }}">
                    </label>
                    <label for="">性別
                        <select name="gender" data-toggle="select">
                            <option value=""></option>
                            <option value="0">男性</option>
                            <option value="1">女性</option>
                            <option value="2">性別不詳</option>
                        </select>
                    </label>
                    <input type="submit" class="btn btn-primary form-btn" value="検索">
            </div>
        </form>
            <div class="row">
                <div class="card-deck">
                    @forelse($user_post as $post)
                    <div class="col mb-5">
                        <div class="card" style="width: 300px; background: #cce5ff;">
                            <div class="card-img-top" ><img src="{{ asset('storage'.$post->image)}}" style="width: 100%; background: white;" ></div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post ->title}}</h5>
                                <p class="card-text">{{ $post ->date}}</p>
                                <p class="card-text">{{ $post ->comment}}</p>
                                <a href="{{ route('post.admin.delete',['id' => $post['posts_id']]) }}" class="btn btn-primary bg-danger" >投稿削除</a>
                            </div>
                        </div>
                    </div>
                        @empty
                            <td>投稿がありません</td>
                    @endforelse
                </div>
            </div>
    <div class=" d-flex justify-content-center">{{ $user_post->links() }}</div>
    <button type='button' class='btn btn-secondary' onClick="history.back();">戻る</button>
</div>
@endsection