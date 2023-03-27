@extends('layouts.app')
@section('content')
<div class="d-flex flex-column align-items-center mx-5">
    <p><img src="{{ asset('storage'.$my_user->image)}}" style="background: white;"></p>
    <p>名前:{{ $my_user->name }}</p>
    <p>メールアドレス:{{ $my_user->email }}</p>
    <p>プロフィール：{{ $my_user->profile }}</p>
    <h3>こちらのアカウントを削除しても良いですか？</h3>
    <div class>
        <a href ="{{route('Logical.Delete.Account')}}">
            <button type='button' class='btn btn-secondary' style='background-color:red'>削除する</button>
        </a>
    </div>
    <br>
    <div class>
        <button type='button' class='btn btn-secondary' onclick="window.history.back();">編集画面に戻る</button>
    </div>
</div>
@endsection