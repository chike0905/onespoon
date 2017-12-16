<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TableController extends Controller
{
  function index(){
    return view("table");
  }
}
