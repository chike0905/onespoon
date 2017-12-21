<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use App\Foods;
use App\Orders;


class OrderController extends Controller
{
    function index(){
        $foods = Foods::all()->toArray();
        return view("Order")->with("foods",$foods);
    }

    function submit(Request $request){
        $datas = $request->data;
        foreach($datas as $order){
            $dbreturn = Orders::create([
                "foodid" => $order["id"],
                "num" => $order["num"]
                ]);
        }
        $rtn = ["status" => $dbreturn];
        return Response::json($rtn);
    }
}
