@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('投稿編集') }}</div>

                <div class="card-body">
                    <form method="POST" action="PostEdit" enctype="multipart/form-data">
                        @csrf
                        
                         <input id="title" type="hidden" class="form-control" name="id" value="{{$my_post->id}}">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル名') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$my_post->title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right date">{{ __('日付') }}</label>
                                <div class="col-md-6">
                                    <input id="date" type="date" name="date" class="form-control" value="{{$my_post->date}}">
                                </div>
                            </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('画像登録') }}</label>
                            <img src="{{ asset('storage'.$my_post->image)}}">
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('コメント') }}</label>

                            <div class="col-md-6">
                                <textarea id="comment" class="form-control" name="comment">{{$my_post->comment}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('投稿編集') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class>
                        <button type='button' class='btn btn-secondary' onClick="history.back();">マイページに戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection