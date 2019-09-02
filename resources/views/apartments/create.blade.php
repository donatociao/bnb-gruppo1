@extends('layouts.app')


@section('content')
  <div class="container mt-5">
    <h1>Inserisci un nuovo appartamento</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('apartments.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Titolo:</label>
        <input type="text" class="form-control" name="title" placeholder="Inserisci un titolo che descriva la tipologia di appartamento" value="{{ old('title') }}">
      </div>
      <div class="form-group">
        <label for="rooms_number">Numero stanze:</label>
        <input type="number" class="form-control" name="rooms_number" placeholder="Inserisci il numero delle stanze" value="{{ old('rooms_number') }}">
      </div>
      <div class="form-group">
        <label for="host_number">Numero posti letto:</label>
        <input type="number" class="form-control" name="host_number" placeholder="Inserisci il numero dei posti letto" value="{{ old('host_number') }}">
      </div>
      <div class="form-group">
        <label for="wc_number">Numero bagni:</label>
        <input type="number" class="form-control" name="wc_number" placeholder="Inserisci il numero dei bagni" value="{{ old('wc_number') }}">
      </div>
      <div class="form-group">
        <label for="mq">Metri quadri:</label>
        <input type="number" class="form-control" name="mq" placeholder="Inserisci i metri quadri" value="{{ old('mq') }}">
      </div>
      <div class="form-group">
        <label for="url_img">Foto appartamento:</label>
        <input type="file" class="form-control-file" name="url_img">
      </div>


      <div class="form-group">
        <label for="city">Città:</label>
        <input type="text" class="form-control" name="city" placeholder="Inserisci la città" value="{{ old('city') }}">
      </div>
      <div class="form-group">
        <label for="cap">Cap:</label>
        <input type="text" class="form-control" name="cap" placeholder="Inserisci il cap" value="{{ old('cap') }}">
      </div>
      <div class="form-group">
        <label for="prov">Provincia:</label>
        <input type="text" class="form-control" name="prov" placeholder="Inserisci la provincia" value="{{ old('prov') }}">
      </div>
      <div class="form-group">
        <label for="street">Via:</label>
        <input type="text" class="form-control" name="street" placeholder="Inserisci la via" value="{{ old('street') }}">
      </div>
      <div class="form-group">
        <label for="civic_number">Numero civico:</label>
        <input type="text" class="form-control" name="civic_number" placeholder="Inserisci il numero civico" value="{{ old('civic_number') }}">
      </div>

      <div class="form-group">
        <label for="wifi">Wi-fi:</label>
        <input type="radio"  name="wifi" value="1" {{ old('wifi') === "1" ? 'checked' : null }}>si
        <input type="radio"  name="wifi" value="0" {{ old('wifi') === "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="parking">Parcheggio:</label>
        <input type="radio"  name="parking" value="1" {{ old('parking') === "1" ? 'checked' : null }}>si
        <input type="radio"  name="parking" value="0" {{ old('parking') === "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="pool">Piscina:</label>
        <input type="radio"  name="pool" value="1" {{ old('pool') === "1" ? 'checked' : null }}>si
        <input type="radio"  name="pool" value="0" {{ old('pool') === "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="reception">Portineria:</label>
        <input type="radio"  name="reception" value="1" {{ old('reception') === "1" ? 'checked' : null }}>si
        <input type="radio"  name="reception" value="0" {{ old('reception') === "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="spa">Sauna:</label>
        <input type="radio"  name="spa" value="1" {{ old('spa') === "1" ? 'checked' : null }}>si
        <input type="radio"  name="spa" value="0" {{ old('spa') === "0" ? 'checked' : null }}>no
      </div>
      <div class="form-group">
        <label for="sea_view">Vista mare:</label>
        <input type="radio"  name="sea_view" value="1" {{ old('sea_view') === "1" ? 'checked' : null }}>si
        <input type="radio"  name="sea_view" value="0" {{ old('sea_view') === "0" ? 'checked' : null }}>no
      </div>

      <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
  </div>
@endsection
