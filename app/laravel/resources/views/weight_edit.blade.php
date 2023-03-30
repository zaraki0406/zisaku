@extends('layouts.app')
@section('content')
<h1 class="header d-flex justify-content-center">体重の記録</h1>
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="card-deck">
                @forelse($my_weight as $weight)
                <div class="col mb-5" >
                    <div class="card" style="width: 300px; background: #cce5ff;">
                        <div class="card-body">
                            <p class="card-text">{{ $weight ->weight}}kg</p>
                            <p class="card-text">{{ $weight ->date}}</p>
                            <a href="{{ route('weight.delete',['id' => $weight['id']]) }}" class="btn btn-primary" style='background-color:red'>記録を削除</a>
                        </div>
                    </div>
                </div>
                    @empty
                        <td>記録がありません</td>
                    @endforelse
            </div>
        </div>
    </div>
    <dr>
    <div class=" d-flex justify-content-center">{{ $my_weight->links() }}</div>
    <dr>
    <div class="d-flex justify-content-center">
        <button type='button' class='btn btn-secondary' onClick="history.back();">戻る</button>
    </div>
@endsection