<?php

use Illuminate\Database\Seeder;
use App\weight;

class WeightLogSampleSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //開始日を６ヶ月前にする
		$start = strtotime("-6 month");
		//作成する日数（180日分）
		$days = 180;
		//初期体重(50.0kg)
		$weight = 50.0;
		for($i = 0; $i < $days; $i++){
			//作成する日
			$date = $start + $i * 24 * 60 * 60;
			//体重をランダムで作成する
			//-200g〜200gで増減するようにする
			$weight += 0.1 * (2 - rand(0, 4));
			
			//保存実行
			$logs = new Weight();
			$logs->created_at = date("Ymd", $date);
            $logs->updated_at = date("Ymd", $date);
			$logs->weight = $weight;
            $logs->hidden_flg = false;
            $logs->user_id =1;
    }
    foreach($logs as $log){
        DB::table('weight')->create($log);
    }
}
}
