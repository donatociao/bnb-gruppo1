@extends('layouts.app_public')

@section('content')

  {{-- FILTRI --}}
  <div class="container-form2">
    <div class="form-group col-lg-12 col-md-12 col-sm-12">

      <label class="info" for="km">Entro km:</label>
      <input type="number" id="km" class="form-control" name="km" placeholder="Inserisci n° minimo di km" value="">

      <label class="info" for="rooms_number">Numero minimo di stanze:</label>
      <input type="number" id="stanze" class="form-control" name="rooms_number" placeholder="Inserisci n° minimo di stanze" value="">

      <label class="info" for="host_number">Numero minimo di letti:</label>
      <input type="number" id="letti" class="form-control" name="host_number" placeholder="Inserisci n° minimo di letti" value="">

      <label class="info" for="wc_number">Numero minimo di bagni:</label>
      <input type="number" id="wc" class="form-control" name="wc_number" placeholder="Inserisci n° minimo di bagni" value="">

      <label class="info" for="mq">Numero minimo di metri quadri:</label>
      <input type="number" id="mq" class="form-control" name="mq" placeholder="Inserisci n° minimo di metri quadri" value="">

      <label class="info" for="wifi">Wi-fi:</label>
      <input id="wifi" type="checkbox"  name="wifi" value="">

      <label class="info" for="parking">Parcheggio:</label>
      <input id="parking" type="checkbox"  name="parking" value="">

      <label class="info" for="pool">Piscina:</label>
      <input id="pool" type="checkbox"  name="pool" value="">

      <label class="info" for="reception">Portineria:</label>
      <input id="reception" type="checkbox"  name="reception" value="">

      <label class="info" for="spa">Sauna:</label>
      <input id="spa" type="checkbox"  name="spa" value="">

      <label class="info" for="sea_view">Vista mare:</label>
      <input id="sea_view" type="checkbox"  name="sea_view" value="">
    </div>

    <div style="display: none" class="form-group">
      <input  id="latitudine" type="text"  name="latitude" value="{{$latitudine}}">
      <input id="longitudine" type="text"  name="latitude" value="{{$longitudine}}">
    </div>


    {{-- CONTAINER INIZIALE CHE POI VIENE SOSTITUITO CON LE CARD DI HANDLEBARS SE SI ATTIVA QUALCHE FILTRO --}}
    <div class="container container-cards container-handlebars">
      <div class="row m-0 p-0">
        @foreach ($appartamenti as $appartamento)
          @if ($appartamento->public)
          <div class="card-app col-lg-3 col-md-6 col-sm-12">
            <h5 class="card-title2">{{$appartamento->title}}</h5>
            <img src="{{ asset('storage/'. $appartamento->url_img) }}" class="img-thumbnail mt-2 w-100">
            <div class="card-body h-15">
              <p class="card-title">{{$appartamento->street}}, {{$appartamento->civic_number}}, {{$appartamento->city}}, {{$appartamento->cap}}, {{$appartamento->prov}}</p>
              @php
                $distanza = $appartamento->distance;
                $dist = round($distanza/1000);
              @endphp
              <p class="card-title">Distanza: circa {{$dist}} km</p>
            </div>
            <ul class="list-group list-group-flush lista">
              <li class="list-group-item">N° stanze: {{$appartamento->rooms_number}}
              <li class="list-group-item">N° letti: {{$appartamento->host_number}}
              <li class="list-group-item">N° bagni: {{$appartamento->wc_number}}
              <li class="list-group-item">Mq: {{$appartamento->mq}}
            </ul>
            <form class="visual text-center" action="{{route('public.show')}}" method="get">
              <input style="display: none" id="id_appartamento" type="text" name="address_id" value={{$appartamento->address_id}}>
              <input class="visual2" type="submit" name="" value="Visualizza">
            </form>
          </div>
          @endif
        @endforeach
      </div>
    </div>


    {{-- SCRIPT DI HANDLEBARS --}}
    <script id="card" type="text/x-handlebars-template">
          <div class="card-app col-lg-3 col-md-6 col-sm-12">
            <h5 class="card-title2">@{{titolo}}</h5>
            <img src="http://localhost:8000/storage/@{{img_url}}" class="img-thumbnail mt-2 w-100">
            <div class="card-body h-15">
              <p class="card-title">@{{via}} @{{numero_civico}}, @{{citta}}, @{{cap}}, @{{provincia}}</p>
              <p class="card-title">Distanza: circa @{{distanza}} km</p>
            </div>
            <ul class="list-group list-group-flush lista">
              <li class="list-group-item">N° stanze: @{{numero_stanze}}
              <li class="list-group-item">N° letti: @{{numero_letti}}
              <li class="list-group-item">N° bagni: @{{numero_bagni}}
              <li class="list-group-item">Mq: @{{metri_quadri}}
            </ul>
            <form class="visual text-center" action="{{route('public.show')}}" method="get">
              <input style="display: none" id="id_appartamento" type="text" name="address_id" value="@{{address_id}}">
              <input class="visual2" type="submit" name="" value="Visualizza">
            </form>
          </div>
    </script>
@endsection
@section('title','BoolBnB - Cerca appartamento')
