@extends('layouts.app_public')

@section('content')

<div id="grafico" class="container_grafico">
  {{-- Append di JQuery per il garfico --}}
  <div class="grafico">
  </div>
  {{-- Condizioni per la statistica messaggi/visualizzazioni --}}
  @if ($rapporto)
    <h2>RAPPORTO MESSAGGI/VENDITE = {{$rapporto}}%</h2>
    @if ($rapporto>=30)
      <h2>L'appartamento sta avendo molto successo, circa 1 su 3 dei visitatori ti ha inviato un messaggio</h2>
    @endif
    @if ($rapporto>=20 && $rapporto<30)
      <h2>L'appartamento sta avendo un discreto successo, circa 1 su 5 dei visitatori ti ha inviato un messaggio</h2>
    @endif
    @if ($rapporto<20)
      <h2>L'appartamento non sta avendo molto successo, prova ad inserire un titolo più specifico o una foto migliore</h2>
    @endif
  @else
    <h2>Nessun messaggio ricevuto</h2>
  @endif
</div>

<div id="torna">
  <a class="btn btn-primary" href="{{route('apartments.index')}}">Torna agli appartamenti</a>
</div>

<input  class="d-none" id="apartment" type="text" name="" value="{{$array_grafico}}">
<input  class="d-none" id="title" type="text" name="" value="{{$titolo}}">

@endsection
