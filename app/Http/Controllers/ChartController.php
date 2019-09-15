<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Message;

class ChartController extends Controller
{
  public function index($id_apartment)
  {
    $visualizzazioni = Apartment::where('id', $id_apartment)->first();
    $messaggi =  Message::where('apartment_id', $id_apartment)->get();
    $conteggio_messaggi = $messaggi->count();
    $array = [];
    array_push($array, $visualizzazioni->counter, $conteggio_messaggi);
    $array_string = implode(",", $array);
    if ($visualizzazioni->counter != 0) {
      $rapporto = ceil($conteggio_messaggi/$visualizzazioni->counter*100);
    }else {
      $rapporto = false;
    }

    $data = [
      'array_grafico' => $array_string,
      'titolo' => $visualizzazioni->title,
      'rapporto' => $rapporto
    ];

    return view('apartments.chart', $data);
  }

}
