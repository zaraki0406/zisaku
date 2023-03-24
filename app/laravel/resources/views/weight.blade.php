@extends('layouts.app')
@section('content')
<div id="element" data-name="{{$weight_data}}"></div>
<div id="Delement" data-name="{{$weight_date}}"></div>
<p><img src="{{ asset('storage'.$my_user->image)}}" ></p>

<p>名前:{{ $my_user->name }}</p>

<div class>
    <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#exampleModalCenter">
        体重を記録
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">確認画面</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('weight.register')}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right date">{{ __('日付') }}</label>
                        <div class="col-md-6">
                            <input id="date" type="date" name="date" class="form-control" value="">
                        </div>
                    </div>
                    

                    <div class="form-group row">
                    <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('体重（kg）') }}</label>
                        <div class="col-md-6">
                            <input id="weight" type="weight" name="weight" class="form-control" value="">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('登録') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class>
        <a href="weight_edit">
            <button type='button' class='btn btn-secondary'>体重を編集</button>
        </a>
</div>


<div class>
        <a href="mypage">
            <button type='button' class='btn btn-secondary'>マイページに戻る</button>
        </a>
</div>

   	<canvas id="myChart"></canvas>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<!-- グラフを描画 -->
   <script>
        //ラベル
        let element = document.getElementById('element');
        let target = element.dataset.name;
        let split_target = target.split(',');
        let weight_target = split_target.slice(0,split_target.length-1);
        let Delement = document.getElementById('Delement');
        let Dtarget = Delement.dataset.name;
        let split_Dtarget = Dtarget.split(',');
        let date_target = split_Dtarget.slice(0,split_Dtarget.length-1);
        //グラフを描画
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
            type: 'line',
            data : {
                labels:date_target,
                datasets: [{
                        label: '体重',
                        data: weight_target,
                        borderColor: "rgba(0,0,255,1)",
                        backgroundColor: "rgba(0,0,0,0)",
                        tension: 0,
                    }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: '体重ログ'
                }
            }
    });
   </script>
@endsection
