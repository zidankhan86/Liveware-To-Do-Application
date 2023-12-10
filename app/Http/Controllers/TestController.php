<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function landing(){
    return view('backend.pages.dashboard');
  }
}
