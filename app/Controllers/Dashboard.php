<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
  public function index()
  {
    $Data = array('UserData' => session()->get('UserData'));
    return view('DashBoard/ViewPage', $Data);
  }
}
