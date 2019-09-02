<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Apartment;
use App\Address;
use App\Service;

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
      $idUtente=Auth::user()->id;
      $appartamentiUtente = Apartment::where('user_id','=', $idUtente)->get();

      return view('apartments.index', compact('appartamentiUtente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validazione dei dati
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'rooms_number' => 'required|integer|min:0',
        'host_number' => 'required|integer|min:0',
        'wc_number' => 'required|integer|min:0',
        'mq' => 'required|integer|min:0',
        'url_img' => 'required|image',
        'city' => 'required|string|max:255',
        'cap' => 'required|integer|digits:5',
        'prov' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'civic_number' => 'required|integer|between:0,999',
        'wifi' => 'required|boolean',
        'parking' => 'required|boolean',
        'pool' => 'required|boolean',
        'reception' => 'required|boolean',
        'spa' => 'required|boolean',
        'sea_view' => 'required|boolean'
        ]);

        //Recupero i dati
        $dati_inseriti = $request->all();

        //Creo 3 nuove istanze relative ad 1 appartamento
        $nuovo_appartamento = new Apartment();
        $nuovo_indirizzo = new Address();
        $nuovi_servizi = new Service();

        //Salvo i dati recuperati
        $nuovo_indirizzo->fill($dati_inseriti);
        $nuovo_indirizzo->save();
        $nuovo_appartamento->fill($dati_inseriti);
        $id_utente = Auth::user()->id; // Recupero l'id dell'utente loggato
        $nuovo_appartamento->user_id = $id_utente; // Salvo la chiave esterna relativa all'utente loggato nella tabella apartments
        $path_foto = Storage::put('apartment_images', $dati_inseriti['url_img']);
        $nuovo_appartamento->url_img = $path_foto;
        $nuovo_appartamento->address_id = $nuovo_indirizzo->id; // Salvo la chiave esterna relativa all'indirizzo nella tabella apartments
        $nuovo_appartamento->save();
        $nuovi_servizi->fill($dati_inseriti);
        $nuovi_servizi->apartment_id = $nuovo_appartamento->id; // Salvo la chiave esterna relativa all'appartamento nella tabella services
        $nuovi_servizi->save();

        return redirect()->route('apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
