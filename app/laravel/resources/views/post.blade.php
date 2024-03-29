@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">{{ __('新規投稿') }}</div>

                <div class="card-body">
                <div class="panel-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    <form method="POST" action="{{route('post.register')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル名') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right date">{{ __('日付') }}</label>
                                <div class="col-md-6">
                                    <input id="date" type="date" name="date" class="form-control" value="{{old('date')}}">
                                </div>
                            </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('画像登録') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('コメント') }}</label>

                            <div class="col-md-6">
                                <textarea id="comment" class="form-control" name="comment">{{old('comment')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新規投稿') }}
                                </button>
                                <br><br>
                                <a href="mypage">
                                    <button type='button' class='btn btn-secondary'>マイページに戻る</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection