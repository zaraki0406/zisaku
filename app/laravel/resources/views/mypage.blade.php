@extends('layouts.app')
@section('content')
@if (Session::has('message'))
    <p>{{ session('message') }}</p>
@endif


<p>名前:{{ $my_user->name }}</p>
<p>メールアドレス:{{ $my_user->email }}</p>
<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>フォロー一覧</button>
        </a>
</div>
<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>フォロワー一覧</button>
        </a>
</div>
<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>体重を記録、管理する</button>
        </a>
</div>
<p>{{ $my_user->profile }}</p>
<p>{{ $my_user->target‗weight }}</p>
<p>{{ $my_user->height }}</p>
<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>新規投稿</button>
        </a>
</div>
<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>ユーザー情報編集</button>
        </a>
</div>
<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>投稿を検索する</button>
        </a>
</div>
</body>
</html>
@endsection