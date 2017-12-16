<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class KitchenController extends Controller
{
  function index(){
    return view("ketchen");
  }
}
