<?php

namespace App\Http\Controllers;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

      //contatore appartamenti inseriti da completare by donato
      $user = Auth::user();
      $id = $user->id;
      $appartamenti_caricati = DB::table('apartments')->where('id', '=>', Auth::user()->id)->count();
      $conteggio_caricati = $appartamenti_caricati;
      $data = [
        'caricati' => $conteggio_caricati,
      ];
        return view('dashboard', $data);
    }
}
