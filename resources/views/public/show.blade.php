@extends('layouts.app_public')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">

    </div>
  </div>
</div>

<div class="container container-apartment">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card_container">
              <div class="title-apartment">
                {{$appartamento->title}}
              </div>
              <div class="img img-apartment col-lg-6 col-md-12 col-sm-12">
                <img src="{{ asset('storage/'. $appartamento->url_img) }}">
                <table class="bg-white table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Wi-Fi</th>
                      <th scope="col">Parking</th>
                      <th scope="col">Piscina</th>
                      <th scope="col">Portineria</th>
                      <th scope="col">Sauna</th>
                      <th scope="col">Vista mare</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">
                        @if ($servizi->wifi == 1)
                          <i class="far text-success fa-check-circle fa-2x"></i>
                        @else
                          <i class="far text-danger fa-times-circle fa-2x"></i>
                        @endif
                      </th>
                      <td>
                        @if ($servizi->parking == 1)
                          <i class="far text-success fa-check-circle fa-2x"></i>
                        @else
                          <i class="far text-danger fa-times-circle fa-2x"></i>
                        @endif
                      </td>
                      <td>
                        @if ($servizi->pool == 1)
                          <i class="far text-success fa-check-circle fa-2x"></i>
                        @else
                          <i class="far text-danger fa-times-circle fa-2x"></i>
                        @endif
                      </td>
                      <td>
                        @if ($servizi->reception == 1)
                          <i class="far text-success fa-check-circle fa-2x"></i>
                        @else
                          <i class="far text-danger fa-times-circle fa-2x"></i>
                        @endif
                      </td>
                      <td>
                        @if ($servizi->spa == 1)
                          <i class="far text-success fa-check-circle fa-2x"></i>
                        @else
                          <i class="far text-danger fa-times-circle fa-2x"></i>
                        @endif
                      </td>
                      <td>
                        @if ($servizi->sea_view == 1)
                          <i class="far text-success fa-check-circle fa-2x"></i>
                        @else
                          <i class="far text-danger fa-times-circle fa-2x"></i>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div class="btn btn-container">
                  <a class="btn-h btn-dark" href="{{route('homepage')}}">Torna alla homepage</a>
                </div>
              </div>
              <div class="container container-description col-lg-16 col-md-12 col-sm-12">
                <div class="description">
                  Numero stanze: {{$appartamento->rooms_number}}
                </div>
                <div class="description">
                  Numero letti: {{$appartamento->host_number}}
                </div>
                <div class="description">
                  Numero bagni: {{$appartamento->wc_number}}
                </div>
                <div class="description">
                  Metri quadri: {{$appartamento->mq}}
                </div>
                <div class="description">
                  Indirizzo: {{$indirizzo->city}}
                </div>
                <div class="description">
                  CAP: {{$indirizzo->cap}}
                </div>
                <div class="description">
                  Provincia: {{$indirizzo->prov}}
                </div>
                <div class="description">
                  Via: {{$indirizzo->street}}
                </div>
                <div class="description">
                  Numero civico: {{$indirizzo->civic_number}}
                </div>
                <div class="d-none description">
                  Latitudine: {{$localizzazione->latitude}}
                </div>
                <div class="d-none description">
                  Longitudine: {{$localizzazione->longitude}}
                </div>

              </div>
            </div>
        </div>
    </div>
</div>
<div class="container container-email col-lg-12 col-md-12 col-sm-12">
    <h2>Mappa:</h2>
    <div class="map" id="mapContainer">
      <script>
        // inizializzo:
        var platform = new H.service.Platform({
          'apikey': 'nTD1tckbHBV6EQuuwpL2THYIWMP-AYuoN9cJJPep0TA'
        });

        // definisco tipo mappa
        var maptypes = platform.createDefaultLayers();

        // visualizzo mappa:
        var map = new H.Map(
          document.getElementById('mapContainer'),
          maptypes.vector.normal.map,
          {
            zoom: 15,
            center: { lng: {{$localizzazione->longitude}}, lat: {{$localizzazione->latitude}} }
          });

          // creo marker
        var marker = new H.map.Marker({ lat: {{$localizzazione->latitude}}, lng: {{$localizzazione->longitude}} });

          // aggiungo marker alla mappa:
        map.addObject(marker);
      </script>

    </div>
  <div class="container container-form">
  @if (Auth::check() && Auth::user()->email === $utente->email)
    <p class="proprietario"> Sei il proprietario dell'appartamento! </p>
  @else
    <h2>Sei interessato all'appartamento? Contatta {{$utente->name}}!</h2>

    <form id="form_geo" method="post" action="{{ route('show.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">

        <input type="text" name="user_id" class="d-none" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$utente->id}}">
        <input type="text" name="apartment_id" class="d-none" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$appartamento->id}}">

        <label for="exampleInputEmail1">Indirizzo Email:</label>
        @if (Auth::check())
          <input type="email" name="email_req" class="form form-control col-lg-12 col-md-12 col-sm-12" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
        @else
          <input type="email" name="email_req" class="form form-control col-lg-12 col-md-12 col-sm-12" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        @endif
        <label for="exampleFormControlTextarea1">Messaggio:</label>
        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
      <div class="btn btn-container">
        <button type="submit" class="btn-h-e btn-dark col-lg-12 col-md-12 col-sm-12">Invia</button>
      </div>
    </div>
    </form>
  @endif
</div>
</div>
</div>
@endsection

<script>
  // inizializzo:
  var platform = new H.service.Platform({
    'apikey': 'nTD1tckbHBV6EQuuwpL2THYIWMP-AYuoN9cJJPep0TA'
  });

  // definisco tipo mappa
  var maptypes = platform.createDefaultLayers();

  // visualizzo mappa:
  var map = new H.Map(
    document.getElementById('mapContainer'),
    maptypes.vector.normal.map,
    {
      zoom: 10,
      center: { lng: {{$localizzazione->longitude}}, lat: {{$localizzazione->latitude}} }
    });

    // creo marker
  var marker = new H.map.Marker({ lat: {{$localizzazione->latitude}}, lng: {{$localizzazione->longitude}} });

    // aggiungo marker alla mappa:
  map.addObject(marker);
</script>
@section('title','BoolBnB - Visualizza appartamento')
