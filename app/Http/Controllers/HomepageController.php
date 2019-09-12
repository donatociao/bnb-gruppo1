<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Address;
use App\Service;
use App\Geolocal;
use App\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
  public function index()
  {
      $appartamenti = Apartment::all();
      return view('homepage', compact('appartamenti'));
  }

  public function show($id_apartment)
  {
    $dati_appartamento = Apartment::where('id', $id_apartment)->first();
    if (empty($dati_appartamento)) {
      abort(404);
    }
    $dati_indirizzo = Address::where('id', $dati_appartamento->address_id)->first();
    $dati_servizi = Service::where('id', $dati_appartamento->service_id)->first();
    $dati_utente = User::where('id', $dati_appartamento->user_id)->first();
    $dati_localizzazione = Geolocal::where('id', $dati_indirizzo->geolocal_id)->first();
    $data = [
      'appartamento' => $dati_appartamento,
      'indirizzo' => $dati_indirizzo,
      'utente' => $dati_utente,
      'servizi' => $dati_servizi,
      'localizzazione' => $dati_localizzazione
    ];
    return view('public.show', $data);
  }
}
