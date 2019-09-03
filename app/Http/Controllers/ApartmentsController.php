<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Apartment;
use App\Address;
use App\Service;
use App\Geolocal;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      $userID=Auth::user()->id;
      $userApartments = Apartment::where('user_id','=',$userID)->get();

      return view('apartments.index', compact('userApartments'));
    }


    public function create()
    {
      return view('apartments.create');
    }

    public function store(Request $request)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'rooms_number' => 'required|integer|min:1',
        'host_number' => 'required|integer|min:1',
        'wc_number' => 'required|integer|min:1',
        'mq' => 'required|integer|min:1',
        'url_img' => 'required|image',
        'city' => 'required|string|max:255',
        'cap' => 'required|integer|digits:5',
        'prov' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'civic_number' => 'required|integer|between:1,999',
        'wifi' => 'required|boolean',
        'parking' => 'required|boolean',
        'pool' => 'required|boolean',
        'reception' => 'required|boolean',
        'spa' => 'required|boolean',
        'sea_view' => 'required|boolean',
        'latitude' => 'required',
        'longitude' => 'required'
        ]);

        //Recupero i dati
        $dati_inseriti = $request->all();

        //Creo 3 nuove istanze relative ad 1 appartamento
        $nuovo_appartamento = new Apartment();
        $nuovo_indirizzo = new Address();
        $nuovi_servizi = new Service();
        $nuove_coordinate = new Geolocal();

        //Salvo i dati recuperati
        $nuovi_servizi->fill($dati_inseriti);
        $nuovi_servizi->save();
        $nuove_coordinate->fill($dati_inseriti);
        $nuove_coordinate->save();
        $nuovo_indirizzo->fill($dati_inseriti);
        $nuovo_indirizzo->geolocal_id = $nuove_coordinate->id; // // Salvo la chiave esterna relativa alle coordinate nella tabella addresses
        $nuovo_indirizzo->save();
        $nuovo_appartamento->fill($dati_inseriti);
        $id_utente = Auth::user()->id; // Recupero l'id dell'utente loggato
        $nuovo_appartamento->user_id = $id_utente; // Salvo la chiave esterna relativa all'utente loggato nella tabella apartments
        $nuovo_appartamento->service_id = $nuovi_servizi->id; // Salvo la chiave esterna relativa ai servizi nella tabella apartments
        $path_foto = Storage::put('apartment_images', $dati_inseriti['url_img']); // Creo path dell'img da salvare nel db
        $nuovo_appartamento->url_img = $path_foto; // Salvo path dell'img nel db
        $nuovo_appartamento->address_id = $nuovo_indirizzo->id; // Salvo la chiave esterna relativa all'indirizzo nella tabella apartments
        $nuovo_appartamento->save();

        return redirect()->route('apartments.index');
    }


    public function show($id_apartment)
    {
      $dati_appartamento = Apartment::where('id', $id_apartment)->first();
      if (empty($dati_appartamento)) {
        abort(404);
      }
      $dati_indirizzo = Address::where('id', $dati_appartamento->address_id)->first();
      $dati_servizi = Service::where('id', $dati_appartamento->service_id)->first();
      $dati_localizzazione = Geolocal::where('id', $dati_indirizzo->geolocal_id)->first();
      $data = [
        'appartamento' => $dati_appartamento,
        'indirizzo' => $dati_indirizzo,
        'servizi' => $dati_servizi,
        'localizzazione' => $dati_localizzazione
      ];
      return view('apartments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
