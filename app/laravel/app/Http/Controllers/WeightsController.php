<?php

namespace App\Http\Controllers;
use App\Weight;
use App\user;
use App\Http\Requests\CreateWeight;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class WeightsController extends Controller
{
    public function weight_register(CreateWeight $request){
        $id=Auth::id();
        $weight = new weight;
        $weight->user_id = $id;
        $weight->weight	 = $request->weight;
        $weight->date = $request->date;
        $weight->save();
        return redirect('/weight');
   }
   public function weight_edit(){
    $id = Auth::id();
    $user = DB::table('users')->find($id);
    $weight = weight::where("user_id",$id)->paginate(10);
    return view('/weight_edit', ['my_weight' => $weight]);
    }

    public function weight_delete(int $id,request $request){
        $weight = weight::query()->where('id','=',$id)->first();
        $weight ->delete();
        return redirect('/weight');
   }
}
