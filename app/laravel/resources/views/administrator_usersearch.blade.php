@extends('layouts.app')
@section('content')
<div class="d-flex flex-column align-items-center">
    <h4>管理者ページ</h4>
    <div class="search">
        <form action="administrator.usersearch" method="GET">
            @csrf

            <div class="form-group">
                <div>
                    <label for="">キーワード
                    <div>
                        <input type="text" name="keyword" value="">
                    </div>
                    </label>
                </div>


                <div>
                    <label for="">性別
                    <div>
                        <select name="gender" data-toggle="select">
                        <option value="0">男性</option>
                        <option value="1">女性</option>
                        <option value="2">性別不詳</option>
                        </select>
                    </div>
                    </label>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary form-btn" value="検索">
                </div>
            </div>
        </form>
        <table> 
            <tr>
                <th>ユーザーid</th>
                <th>ユーザー名</th>
                <th>プロフィール</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            @forelse($users  as $user)
            <tr>
                <td>{{$user->id}}</td>  
                <td>{{$user->name}}</td>
                <td>{{$user->profile}}</td>
                <td>{{$user->updated_at}}</td>
                <td>{{$user->created_at}}</td>
                <td><a href="{{ route('account.admin.delete',['id' => $user['id']]) }}" class="btn btn-primary" style='background-color:red'>削除</a></td>
            </tr>
            @empty
                            <td>ユーザーがいません</td>
            @endforelse
        </table>
    </div>
    <div class=" d-flex justify-content-center">{{ $users->links() }}</div>
    <button type='button' class='btn btn-secondary' onClick="history.back();">戻る</button>
</div>
@endsection