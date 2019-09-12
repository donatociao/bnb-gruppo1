<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    {{-- FILTRI --}}
    <div class="form-group">
      <label for="km">Entro km:</label>
      <input type="number" id="km" class="form-control" name="km" placeholder="Inserisci numero minimo di stanze" value="">
    </div>
    <div class="form-group">
      <label for="rooms_number">Numero minimo di stanze:</label>
      <input type="number" id="stanze" class="form-control" name="rooms_number" placeholder="Inserisci numero minimo di stanze" value="">
    </div>
    <div class="form-group">
      <label for="host_number">Numero minimo di letti:</label>
      <input type="number" id="letti" class="form-control" name="host_number" placeholder="Inserisci numero minimo di letti" value="">
    </div>
    <div class="form-group">
      <label for="wc_number">Numero minimo di bagni:</label>
      <input type="number" id="wc" class="form-control" name="wc_number" placeholder="Inserisci numero minimo di bagni" value="">
    </div>
    <div class="form-group">
      <label for="mq">Numero minimo di metri quadri:</label>
      <input type="number" id="mq" class="form-control" name="mq" placeholder="Inserisci numero minimo di metri quadri" value="">
    </div>

    <div class="form-group">
      <label for="wifi">Wi-fi:</label>
      <input id="wifi" type="checkbox"  name="wifi" value="">
    </div>
    <div class="form-group">
      <label for="parking">Parcheggio:</label>
      <input id="parking" type="checkbox"  name="parking" value="">
    </div>
    <div class="form-group">
      <label for="pool">Piscina:</label>
      <input id="pool" type="checkbox"  name="pool" value="">
    </div>
    <div class="form-group">
      <label for="reception">Portineria:</label>
      <input id="reception" type="checkbox"  name="reception" value="">
    </div>
    <div class="form-group">
      <label for="spa">Sauna:</label>
      <input id="spa" type="checkbox"  name="spa" value="">
    </div>
    <div class="form-group">
      <label for="sea_view">Vista mare:</label>
      <input id="sea_view" type="checkbox"  name="sea_view" value="">
    </div>
    <div style="display: none" class="form-group">
      <input  id="latitudine" type="text"  name="latitude" value="{{$latitudine}}">
      <input id="longitudine" type="text"  name="latitude" value="{{$longitudine}}">
    </div>
    <br>
    <br>
    <br>
    <br>


    {{-- CONTAINER INIZIALE CHE POI VIENE SOSTITUITO CON LE CARD DI HANDLEBARS SE SI ATTIVA QUALCHE FILTRO --}}
    <div class="container">
      @foreach ($appartamenti as $appartamento)
        <div>
          @if ($appartamento->public)
            {{-- FOTO : <img src="{{ asset('storage/'. $appartamento->url_img) }}"> --}}
            TITOLO: {{$appartamento->title}}
            CITTA': {{$appartamento->city}}
            NUMERO CIVICO: {{$appartamento->civic_number}}
            NUMERO STANZE: {{$appartamento->rooms_number}}
            NUMERO LETTI: {{$appartamento->host_number}}
            NUMERO BAGNI: {{$appartamento->wc_number}}
            METRI QUADRI: {{$appartamento->mq}}
            Wifi: {{$appartamento->wifi}}
            Parcheggio: {{$appartamento->parking}}
            Piscina: {{$appartamento->pool}}
            Portineria: {{$appartamento->reception}}
            Sauna: {{$appartamento->spa}}
            Vista mare: {{$appartamento->sea_view}}
          @endif
        </div>
        <br>
      @endforeach
    </div>



    {{-- SCRIPT DI HANDLEBARS --}}
    <script id="card" type="text/x-handlebars-template">
      <div>
        <!-- FOTO: -->
        TITOLO: @{{titolo}}
        CITTA': @{{citta}}
        NUMERO CIVICO: @{{numero_civico}}
        NUMERO STANZE: @{{numero_stanze}}
        NUMERO LETTI: @{{numero_letti}}
        NUMERO BAGNI: @{{numero_bagni}}
        METRI QUADRI: @{{metri_quadri}}
        Wifi: @{{wifi}}
        Parcheggio: @{{parcheggio}}
        Piscina: @{{piscina}}
        Portineria: @{{portineria}}
        Sauna: @{{sauna}}
        Vista mare: @{{vista_mare}}
      </div>
      <br>
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
  </body>
</html>
