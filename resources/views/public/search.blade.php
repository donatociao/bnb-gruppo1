@extends('layouts.app_public')

@section('content')

    {{-- FILTRI --}}
    <div class="form-group col-lg-12 col-md-12 col-sm-12">
      <label for="km">Km:</label>
      <input type="number" id="km" class="form-control" name="km" placeholder="In che raggio di km stai cercando?" value="">


      <label for="rooms_number">Numero minimo di stanze:</label>
      <input type="number" id="stanze" class="form-control" name="rooms_number" placeholder="Inserisci numero minimo di stanze" value="">


      <label for="host_number">Numero minimo di letti:</label>
      <input type="number" id="letti" class="form-control" name="host_number" placeholder="Inserisci numero minimo di letti" value="">


      <label for="wc_number">Numero minimo di bagni:</label>
      <input type="number" id="wc" class="form-control" name="wc_number" placeholder="Inserisci numero minimo di bagni" value="">


      <label for="mq">Numero minimo di metri quadri:</label>
      <input type="number" id="mq" class="form-control" name="mq" placeholder="Inserisci numero minimo di metri quadri" value="">



      <label for="wifi">Wi-fi:</label>
      <input id="wifi" type="checkbox"  name="wifi" value="">


      <label for="parking">Parcheggio:</label>
      <input id="parking" type="checkbox"  name="parking" value="">


      <label for="pool">Piscina:</label>
      <input id="pool" type="checkbox"  name="pool" value="">

      <label for="reception">Portineria:</label>
      <input id="reception" type="checkbox"  name="reception" value="">

      <label for="spa">Sauna:</label>
      <input id="spa" type="checkbox"  name="spa" value="">

      <label for="sea_view">Vista mare:</label>
      <input id="sea_view" type="checkbox"  name="sea_view" value="">
    </div>

    <div class="d-none form-group">
      <input  id="latitudine" type="text"  name="latitude" value="{{$latitudine}}">
      <input id="longitudine" type="text"  name="latitude" value="{{$longitudine}}">
    </div>
    <br>
    <br>
    <br>
    <br>


    {{-- CONTAINER INIZIALE CHE POI VIENE SOSTITUITO CON LE CARD DI HANDLEBARS SE SI ATTIVA QUALCHE FILTRO --}}
    <div class="container d-flex justify-content-around">
      @foreach ($appartamenti as $appartamento)
          @if ($appartamento->public)
          <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/'. $appartamento->url_img) }}" class="card-img-top">
            <div class="card-body h-25">
              <h5 class="card-title">{{$appartamento->title}}</h5>
              <p class="card-title">{{$appartamento->city}}, {{$appartamento->distance}}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"> Numero stanze: @{{numero_stanze}}</li>
              <li class="list-group-item">Numero ospiti: @{{numero_letti}}</li>
              <li class="list-group-item">Numero bagni: @{{numero_bagni}}</li>
            </ul>
            <form class="" action="{{route('public.show')}}" method="get">
              <input style="display: none" id="id_appartameto" type="text" name="address_id" value={{$appartamento->address_id}}>
              <input type="submit" name="" value="Visualizza">
            </form>
          </div>
          @endif
        @endforeach
    </div>

    {{-- SCRIPT DI HANDLEBARS --}}
    <script id="card" type="text/x-handlebars-template">
      <div class="card" style="width: 18rem;">
        <img src="http://localhost:8000/storage/@{{img_url}}" class="card-img-top">
        <div class="card-body h-25">
          <h5 class="card-title">@{{titolo}}</h5>
          <p class="card-title">@{{citta}}, @{{distanza}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Numero stanze: @{{numero_stanze}}</li>
          <li class="list-group-item">Numero ospiti: @{{numero_letti}}</li>
          <li class="list-group-item">Numero bagni: @{{numero_bagni}}</li>
        </ul>
        <form class="" action="{{route('public.show')}}" method="get">
          <input style="display: none" id="id_appartameto" type="text" name="address_id" value="@{{address_id}}">
          <input type="submit" name="" value="Visualizza">
        </form>
      </div>
    </script>
@endsection
