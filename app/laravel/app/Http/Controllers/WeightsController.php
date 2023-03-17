<?php

namespace App\Http\Controllers;
use App\Weight;
use App\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class WeightsController extends Controller
{
    public function weight_register(request $request){
        $id=Auth::id();
        $weight = new weight;
        $weight->user_id = $id;
        $weight->weight	 = $request->weight;
        $weight->date = $request->date;
        $weight->save();
        return redirect('/weight');
   }
}
