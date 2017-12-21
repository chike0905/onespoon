<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use App\Orders;
use App\Foods;

class TableController extends Controller {
    function index(){
        $datas = Orders::all()->toArray();
        $orders = [];
        foreach($datas as $data){
            if($data["share"] != $data["num"]){
                $data["foodname"] = Foods::where(['id'=> $data["foodid"]])->get()->pluck("name")->first();
                array_push($orders, $data);
            }
        }
        return view("table")->with("data", $orders);
    }
    function shareorder(Request $request){
        $data = $request->data;
        $order = Orders::find($data);
        $order->share = $order->share + 1;
        $order->save();
        $rtn = ["status" => $data];
        return Response::json($rtn);
    }
}
