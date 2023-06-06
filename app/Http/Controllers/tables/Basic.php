<?php

namespace App\Http\Controllers\tables;

use App\Models\League;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Basic extends Controller
{
  public function index()
  {
    $allleagues = League::all();


    return view('content.tables.tables-basic',compact('allleagues'));
  }
}
