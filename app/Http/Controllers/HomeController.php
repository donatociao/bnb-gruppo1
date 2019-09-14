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

      //contatore appartamenti inseriti
      $user = Auth::user();
      $id = $user->id;
      $appartamenti_caricati = DB::table('apartments')->where('user_id', '=', Auth::user()->id)->get();
      $conteggio_caricati = $appartamenti_caricati->count();

      //contatore messaggi ricevuti
      $messaggi_ricevuti = DB::table('messages')->where('user_id', '=', Auth::user()->id)->get();
      $conteggio_messaggi = $messaggi_ricevuti->count();

      $data = [
        'caricati' => $conteggio_caricati,
        'ricevuti' => $conteggio_messaggi,
      ];
        return view('dashboard', $data);
    }
}
