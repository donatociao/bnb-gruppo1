@extends('layouts.app')


@section('content')
  <div class="container mt-5">
    <h1 style="font-size: 30px; margin: 30px 0;">Modifica appartamento: {{$appartamento->title}}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="form_geo" method="post" action="{{ route('apartments.update', $appartamento->id) }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name">Titolo:</label>
        <input type="text" class="form-control" name="title"  value="{{ old('title', $appartamento->title) }}">
      </div>
      <div class="form-group">
        <label for="rooms_number">Numero stanze:</label>
        <input type="number" class="form-control" name="rooms_number" placeholder="Inserisci il numero delle stanze" value="{{ old('rooms_number', $appartamento->rooms_number) }}">
      </div>
      <div class="form-group">
        <label for="host_number">Numero posti letto:</label>
        <input type="number" class="form-control" name="host_number" placeholder="Inserisci il numero dei posti letto" value="{{ old('host_number', $appartamento->host_number) }}">
      </div>
      <div class="form-group">
        <label for="wc_number">Numero bagni:</label>
        <input type="number" class="form-control" name="wc_number" placeholder="Inserisci il numero dei bagni" value="{{ old('wc_number', $appartamento->wc_number) }}">
      </div>
      <div class="form-group">
        <label for="mq">Metri quadri:</label>
        <input type="number" class="form-control" name="mq" placeholder="Inserisci i metri quadri" value="{{ old('mq', $appartamento->mq) }}">
      </div>
      <div class="form-group">
        <label for="url_img">Foto appartamento:</label>
        <div class="">
          <img src="{{ asset('storage/'. $appartamento->url_img) }}">
        </div>
        <input type="file" class="form-control-file" name="url_img">
      </div>


      <div class="form-group">
        <label for="city">Città:</label>
        <input type="text" class="form-control modCoordinate" name="city" placeholder="Inserisci la città" value="{{ old('city', $indirizzo->city) }}">
      </div>
      <div class="form-group">
        <label for="cap">Cap:</label>
        <input type="text" class="form-control modCoordinate" name="cap" placeholder="Inserisci il cap" value="{{ old('cap', $indirizzo->cap) }}">
      </div>
      <div class="form-group">
        <label for="prov">Provincia:</label>
        <input type="text" class="form-control modCoordinate" name="prov" placeholder="Inserisci la provincia" value="{{ old('prov', $indirizzo->prov) }}">
      </div>
      <div class="form-group">
        <label for="street">Via:</label>
        <input type="text" class="form-control modCoordinate" name="street" placeholder="Inserisci la via" value="{{ old('street', $indirizzo->street) }}">
      </div>
      <div class="form-group">
        <label for="civic_number">Numero civico:</label>
        <input type="text" class="form-control modCoordinate" name="civic_number" placeholder="Inserisci il numero civico" value="{{ old('civic_number', $indirizzo->civic_number) }}">
      </div>

      <div class="invio">
        Calcola le coordinate
      </div>

      <div class="form-group">
        <label for="geolocals">Coordinate:</label>
        <input class="lat_input" type="text"  name="latitude" value="{{ old('latitude', $localizzazione->latitude) }}">Latitudine
        <input class="lon_input" type="text"  name="longitude" value="{{ old('longitude', $localizzazione->longitude) }}">Longitudine
      </div>

      <div class="form-group">
        <label for="wifi">Wi-fi:</label>
        <input type="radio"  name="wifi" value="1" {{ old('wifi', $servizi->wifi) == "1" ? 'checked' : null }}>si
        <input type="radio"  name="wifi" value="0" {{ old('wifi', $servizi->wifi) == "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="parking">Parcheggio:</label>
        <input type="radio"  name="parking" value="1" {{ old('parking', $servizi->parking) == "1" ? 'checked' : null }}>si
        <input type="radio"  name="parking" value="0" {{ old('parking', $servizi->parking) == "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="pool">Piscina:</label>
        <input type="radio"  name="pool" value="1" {{ old('pool', $servizi->pool) == "1" ? 'checked' : null }}>si
        <input type="radio"  name="pool" value="0" {{ old('pool', $servizi->pool) == "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="reception">Portineria:</label>
        <input type="radio"  name="reception" value="1" {{ old('reception', $servizi->reception) == "1" ? 'checked' : null }}>si
        <input type="radio"  name="reception" value="0" {{ old('reception', $servizi->reception) == "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="spa">Sauna:</label>
        <input type="radio"  name="spa" value="1" {{ old('spa', $servizi->spa) == "1" ? 'checked' : null }}>si
        <input type="radio"  name="spa" value="0" {{ old('spa', $servizi->spa) == "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="sea_view">Vista mare:</label>
        <input type="radio"  name="sea_view" value="1" {{ old('sea_view', $servizi->sea_view) == "1" ? 'checked' : null }}>si
        <input type="radio"  name="sea_view" value="0" {{ old('sea_view', $servizi->sea_view) == "0" ? 'checked' : null }}>no
      </div>


      @if ($appartamento->public === 1)
        <label for="public">Rendi invisibile l'appartamento nei risultati di ricerca:</label>
        <input type="checkbox"  name="public" value="0">
      @else
        <label for="public">Rendi visibile l'appartamento nei risultati di ricerca:</label>
        <input type="checkbox"  name="public" value="1">
      @endif

      <button id="createApartment" type="submit" class="btn btn-primary" style="display: block; margin: 30px 0;">Modifica</button>
    </form>
    <div class="">
      <a class="btn btn-primary" href="{{route('apartments.index')}}">Torna agli appartamenti</a>
    </div>
  </div>

@endsection
