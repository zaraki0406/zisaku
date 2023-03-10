@extends('layouts.app')
@section('content')
<p><img src="{{ asset('storage'.$my_user->image)}}" ></p>

<p>名前:{{ $my_user->name }}</p>

<div class>
    <button type='button' class='btn btn-secondary' data-toggle="modal" data-target="Weight_edit">体重を記録</button>
</div>

<div class="modal fade" id="Weight_edit" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4></h4>
                </div>
                <div class="modal-body">
                    <label></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="button" class="btn btn-danger"></button>
                </div>
            </div>
        </div>
    </div>

<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>体重を編集</button>
        </a>
</div>

<div class>
        <a href="">
            <button type='button' class='btn btn-secondary'>体重を非表示/表示にする</button>
        </a>
</div>

<div class>
        <a href="mypage">
            <button type='button' class='btn btn-secondary'>マイページに戻る</button>
        </a>
</div>

<h1>グラフ</h1>
   	<canvas id="myChart"></canvas>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<!-- グラフを描画 -->
   <script>
	//ラベル

	//グラフを描画
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels,
			datasets: [
				{
					label: '',
					data: average_weight_log,
					borderColor: "rgba(0,0,255,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				}
			]
		},
		options: {
			title: {
				display: true,
				text: '体重ログ'
			}
		}
   });
   </script>
@endsection
