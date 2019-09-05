<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;

class EmailController extends Controller
{
  public function contatta(){
    return view('contatta_host');
  }

  public function leggiMessaggio(Request $request){
    $dati_messaggio = $request->all();
    $nuovo_messaggio = new Message();
    $nuovo_messaggio->fill($dati);
    $nuovo_messaggio->save();
  }
}
