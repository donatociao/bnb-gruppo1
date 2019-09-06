<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
  public function index()
  {
      $appartamenti = Apartment::all();
      return view('homepage', compact('appartamenti'));
  }
}
