@extends('layouts.app')
@section('content')
<p><img src="{{ asset('storage'.$my_user->image)}}" ></p>
<p>名前:{{ $my_user->name }}</p>
<p>メールアドレス:{{ $my_user->email }}</p>
<p>{{ $my_user->profile }}</p>
<p>こちらのアカウントを削除しても良いですか？</p>
<div class>
    <a href ="{{route('Logical.Delete.Account')}}">
        <button type='button' class='btn btn-secondary' style='background-color:red'>削除する</button>
    </a>
</div>
<div class>
    <button type='button' class='btn btn-secondary' onclick="window.history.back();">編集画面に戻る</button>
</div>
@endsection