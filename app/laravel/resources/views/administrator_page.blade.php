@extends('layouts.app')
@section('content')
<div class="d-flex flex-column align-items-center">
    <h4>管理者ページ</h4>
    <a href="{{ route('administrator.usersearch') }}">
        <button type='button' class='btn btn-primary'>ユーザー検索</button>
    </a>
    <br>
    <a href="{{ route('administrator.postsearch') }}">
        <button type='button' class='btn btn-primary'>投稿検索</button>
    </a>
</div>
@endsection