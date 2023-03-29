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
<div class="d-flex flex-column align-items-center mx-5" >
    <div class="d-flex mb-4 col-md-6 col-md-offset-3">
        @if (Session::has('message'))
            <p>{{ session('message') }}</p>
        @endif
        <p><img src="{{ asset('storage'.$my_user->image)}}" class="rounded-circle float-left" width="200" height="200" style="background: #cce5ff;"></p>
        <h3 >名前:{{ $my_user->name }}<br><br><br>メールアドレス:{{ $my_user->email }}</h3>
        
    </div>
    <div class="col-md-6 col-md-offset-3">
        <h3>プロフィール</h3>
        <h4>身長{{ $my_user->height }}cm<br>{{ $my_user->profile }}</h4>
    </div>
    <div class = "col-md-6 col-md-offset-3">
        <div class>
                <a href="weight">
                    <button type='button' class='btn btn-primary'>体重を記録、管理する</button>
                </a>
        </div>
        <br>
        <div class>
                <a href="new_post">
                    <button type='button' class='btn btn-primary'>新規投稿</button>
                </a>
        </div>
        <br>
        <div class>
                <a href="profile_edit">
                    <button type='button' class='btn btn-primary'>ユーザー情報編集</button>
                </a>
        </div>
        <br>
        <div class>
                <a href="post_search">
                    <button type='button' class='btn btn-primary'>投稿を検索する</button>
                </a>
        </div>
        <br>
        <div class>
                <a href="good_post">
                    <button type='button' class='btn btn-primary'>いいねした投稿</button>
                </a>
        </div>
    </div>
</div>
<div class = "d-flex flex-column align-items-center mx-5" ><h1 class="header">自身の投稿</h1></div>
        <div class="container-fluid d-flex justify-content-center" >
            <div class="row" >
                <div class="card-deck" >
                    @foreach($my_post as $post)
                        <div class="card" style="width: 300px; background: #cce5ff;">
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