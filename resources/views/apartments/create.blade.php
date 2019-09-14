@extends('layouts.app')


@section('content')
  <div class="container" style="position: relative; top: 120px;">
    <h1>Inserisci un nuovo appartamento:</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="form_geo" method="post" action="{{ route('apartments.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name" class="font-weight-bold">Titolo:</label>
        <input type="text" class="form-control" name="title" placeholder="Inserisci un titolo che descriva la tipologia di appartamento" value="{{ old('title') }}">
      </div>
      <div class="form-group">
        <label for="rooms_number"class="font-weight-bold">Numero stanze:</label>
        <input type="number" class="form-control" name="rooms_number" placeholder="Inserisci il numero delle stanze" value="{{ old('rooms_number') }}">
      </div>
      <div class="form-group">
        <label for="host_number" class="font-weight-bold">Numero posti letto:</label>
        <input type="number" class="form-control" name="host_number" placeholder="Inserisci il numero dei posti letto" value="{{ old('host_number') }}">
      </div>
      <div class="form-group">
        <label for="wc_number" class="font-weight-bold">Numero bagni:</label>
        <input type="number" class="form-control" name="wc_number" placeholder="Inserisci il numero dei bagni" value="{{ old('wc_number') }}">
      </div>
      <div class="form-group">
        <label for="mq" class="font-weight-bold">Metri quadri:</label>
        <input type="number" class="form-control" name="mq" placeholder="Inserisci i metri quadri" value="{{ old('mq') }}">
      </div>
      <div class="form-group">
        <label for="url_img" class="font-weight-bold">Foto appartamento:</label>
        <input type="file" class="form-control-file" name="url_img">
      </div>


      <div class="form-group">
        <label for="city" class="font-weight-bold">Città:</label>
        <input type="text" class="form-control modCoordinate" name="city" placeholder="Inserisci la città" value="{{ old('city') }}">
      </div>
      <div class="form-group">
        <label for="cap" class="font-weight-bold">Cap:</label>
        <input type="text" class="form-control modCoordinate" name="cap" placeholder="Inserisci il cap" value="{{ old('cap') }}">
      </div>
      <div class="form-group">
        <label for="prov" class="font-weight-bold">Provincia:</label>
        <input type="text" class="form-control modCoordinate" name="prov" placeholder="Inserisci la provincia" value="{{ old('prov') }}">
      </div>
      <div class="form-group">
        <label for="street" class="font-weight-bold">Via:</label>
        <input type="text" class="form-control modCoordinate" name="street" placeholder="Inserisci la via" value="{{ old('street') }}">
      </div>
      <div class="form-group">
        <label for="civic_number" class="font-weight-bold">Numero civico:</label>
        <input id="calculate" type="text" class="form-control modCoordinate" name="civic_number" placeholder="Inserisci il numero civico" value="{{ old('civic_number') }}">
      </div>

      <div class=" alert alert-dark invio" role="alert" style="cursor:pointer;">
        Calcola le coordinate:
      </div>

      <div class=" form-group">
        <label for="sea_view" class="font-weight-bold">Coordinate: </label>
        <input class="lat_input" type="text"  name="latitude" value="" placeholder="Latitudine" {{ old('latitude') }}>
        <input class="lon_input" type="text"  name="longitude" value="" placeholder="Longitudine" {{ old('longitude') }}>
      </div>

      <div class="form-group">
        <label for="wifi" class="font-weight-bold">Wi-fi:</label>
        <input type="radio"  name="wifi" value="1" {{ old('wifi') === "1" ? 'checked' : null }}> Presente
        <input type="radio"  name="wifi" value="0" {{ old('wifi') === "0" ? 'checked' : null }}> Non presente
      </div>
      <div class="form-group">
        <label for="parking" class="font-weight-bold">Parcheggio:</label>
        <input type="radio"  name="parking" value="1" {{ old('parking') === "1" ? 'checked' : null }}> Presente
        <input type="radio"  name="parking" value="0" {{ old('parking') === "0" ? 'checked' : null }}> Non presente
      </div>
      <div class="form-group">
        <label for="pool" class="font-weight-bold">Piscina:</label>
        <input type="radio"  name="pool" value="1" {{ old('pool') === "1" ? 'checked' : null }}> Presente
        <input type="radio"  name="pool" value="0" {{ old('pool') === "0" ? 'checked' : null }}> Non presente
      </div>
      <div class="form-group">
        <label for="reception" class="font-weight-bold">Portineria:</label>
        <input type="radio"  name="reception" value="1" {{ old('reception') === "1" ? 'checked' : null }}> Presente
        <input type="radio"  name="reception" value="0" {{ old('reception') === "0" ? 'checked' : null }}> Non presente
      </div>
      <div class="form-group">
        <label for="spa" class="font-weight-bold">Sauna:</label>
        <input type="radio"  name="spa" value="1" {{ old('spa') === "1" ? 'checked' : null }}> Presente
        <input type="radio"  name="spa" value="0" {{ old('spa') === "0" ? 'checked' : null }}> Non presente
      </div>
      <div class="form-group">
        <label for="sea_view" class="font-weight-bold">Vista mare:</label>
        <input type="radio"  name="sea_view" value="1" {{ old('sea_view') === "1" ? 'checked' : null }}> Presente
        <input type="radio"  name="sea_view" value="0" {{ old('sea_view') === "0" ? 'checked' : null }}> Non presente
      </div>

      <button id="createApartment" type="submit" class="btn btn-primary">Inserisci</button>
    </form>
  </div>
  <script src="{{asset('js/app.js')}}" charset="utf-8"></script>

@endsection
