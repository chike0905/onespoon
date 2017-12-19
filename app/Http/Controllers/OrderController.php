<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Foods;

class OrderController extends Controller
{
    function index(){
        $foods = Foods::all()->toArray();
        return view("Order")->with("foods",$foods);
    }
}
