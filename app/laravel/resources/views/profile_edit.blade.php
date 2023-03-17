@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('アカウント情報編集') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('profile.edit')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $my_user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('身長（cm）') }}</label>

                            <div class="col-md-6">
                                <input id="height" type="height" name="height" class="form-control" value="{{ $my_user->height }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>
                            <select class="col-md-2 form-control" id="gender" name="gender" value="{{ $my_user->gender }}">
                                <option value="0">男</option>
                                <option value="1">女</option>
                                <option value="2">性別不詳</option>
                            </select>
                        </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('ユーザーアイコン') }}</label>
                            <img src="{{ asset('storage'.$my_user->image)}}" >
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('プロフィール') }}</label>

                            <div class="col-md-6">
                                <textarea id="profile" class="form-control" name="profile">{{ $my_user->profile }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('アカウントを編集') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <a href="account_delete">
                            <button type="submit" class="btn btn-primary" style='background-color:red'>
                                {{ __('アカウントを削除') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class>
                            <a href="mypage">
                                <button type='button' class='btn btn-secondary'>マイページに戻る</button>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection