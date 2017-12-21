<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Orders;
use App\Foods;

class KitchenController extends Controller {
    function index(){
        $datas = Orders::all()->toArray();
        $orders = [];
        foreach($datas as $data){
            $data["foodname"] = Foods::where(['id'=> $data["foodid"]])->get()->pluck("name")->first();
            array_push($orders, $data);
        }
        return view("ketchen")->with("data", $orders);
    }
}
