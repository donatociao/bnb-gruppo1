@extends('layouts.app')

@section('content')
<div class="container" style="position: relative; top: 120px;">
  <h1><i class="fas fa-chart-bar"></i> Statistiche appartamento</h1>
  <div class="grafico my-4">
    <canvas id="grafico_barre" width="300" height="500" style="border:solid #000000; 3px;padding:7px;">
  </div>

  <div class="container d-flex flex-column align-items-center my-4">
    {{-- Condizioni per la statistica messaggi/visualizzazioni --}}
    <h1><i class="fas fa-home fa-2x pr-2"></i>{{$titolo}}</h1>
    @if ($rapporto)
      <h2>RAPPORTO MESSAGGI/VISUALIZZAZIONI = {{$rapporto}}%</h2>
      @if ($rapporto>=30)
        <h2>L'appartamento sta avendo molto successo, circa 1 su 3 dei visitatori ti ha inviato un messaggio.</h2>
      @endif
      @if ($rapporto>=20 && $rapporto<30)
        <h2>L'appartamento sta avendo un discreto successo, circa 1 su 5 dei visitatori ti ha inviato un messaggio.</h2>
      @endif
      @if ($rapporto<20)
        <h2>L'appartamento non sta avendo molto successo, prova ad inserire un titolo più specifico o una foto migliore.</h2>
      @endif
    @else
      <h2>Nessun messaggio ricevuto.</h2>
    @endif

    <div class="my-2">
      <a class="btn btn-primary" href="{{route('apartments.index')}}">Torna agli appartamenti</a>
    </div>
  </div>
</div>

<input  class="d-none" id="apartment" type="text" name="" value="{{$array_grafico}}">
<input  class="d-none" id="title" type="text" name="" value="{{$titolo}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
@endsection
@section('title','BoolBnB - Statistiche appartamento')
