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
@if (Session::has('message'))
    <p>{{ session('message') }}</p>
@endif
<p><img src="{{ asset('storage'.$my_user->image)}}" ></p>
<p>名前:{{ $my_user->name }}</p>
<p>メールアドレス:{{ $my_user->email }}</p>

<div class>
        <a href="weight">
            <button type='button' class='btn btn-secondary'>体重を記録、管理する</button>
        </a>
</div>
<p>{{ $my_user->profile }}</p>
<p>{{ $my_user->target‗weight }}</p>
<p>身長{{ $my_user->height }}cm</p>
<div class>
        <a href="new_post">
            <button type='button' class='btn btn-secondary'>新規投稿</button>
        </a>
</div>
<div class>
        <a href="profile_edit">
            <button type='button' class='btn btn-secondary'>ユーザー情報編集</button>
        </a>
</div>
<div class>
        <a href="post_search">
            <button type='button' class='btn btn-secondary'>投稿を検索する</button>
        </a>
</div>
<div class>
        <a href="good_post">
            <button type='button' class='btn btn-secondary'>いいねした投稿</button>
        </a>
</div>

    <h1 class="header">自身の投稿</h1>
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="card-deck">
                @foreach($my_post as $post)
                    <div class="card" style="width: 300px;">
                        <div class="card-img-top" ><img src="{{ asset('storage'.$post->image)}}" style="width: 100%; background: white;" ></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post ->title}}</h5>
                            <p class="card-text">{{ $post ->date}}</p>
                            <p class="card-text">{{ $post ->comment}}</p>
                            <a href="{{ route('post.edit',['id' => $post['id']]) }}" class="btn btn-primary">投稿編集</a>
                            <a href="{{ route('post.detail',['id' => $post['id']]) }}" class="btn btn-primary card-text">投稿詳細</a>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </div>
    <div class=" d-flex justify-content-center">{{ $my_post->links() }}</div>
    <!-- Bootstrap jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
@endsection