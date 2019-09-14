@extends('layouts.app')

@section('content')
<div class="container" style="position: relative; top: 120px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card_container">
              <div class="lead">
                <strong> ID:</strong> {{$appartamento->id}}
              </div>
              <div class="lead">
                <h1>{{$appartamento->title}}</h1>
              </div>
              <div class="my-3">
                <img src="{{ asset('storage/'. $appartamento->url_img) }}" class="img-thumbnail" style="width:700px;height:350px;">
              </div>
              <div class="lead">
                <strong> Numero stanze:</strong> {{$appartamento->rooms_number}}
              </div>
              <div class="lead">
                <strong> Numero letti:</strong> {{$appartamento->host_number}}
              </div>
              <div class="lead">
                <strong> Numero bagni:</strong> {{$appartamento->wc_number}}
              </div>
              <div class="lead">
                <strong> Metri quadri:</strong> {{$appartamento->mq}}
              </div>

              <div class="lead">
                <strong> Indirizzo:</strong> {{$indirizzo->city}}, {{$indirizzo->street}}, {{$indirizzo->civic_number}} - {{$indirizzo->cap}}
              </div>

              <div class="lead">
                <strong>Provincia:</strong> {{$indirizzo->prov}}
              </div>

              <div class="d-none">
                Latitudine: <input id="lat_map" type="text" value="{{$localizzazione->latitude}}">
              </div>
              <div class="d-none">
                Longitudine: <input id="lon_map" type="text" value="{{$localizzazione->longitude}}">
              </div>

              <div class="my-3" style="width: 100%; height: 480px" id="mapContainer"></div>

              <table class="table table-striped">
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
              </div>
              <div class="mb-4">
                <a class="btn btn-primary" href="{{route('apartments.index')}}">Torna agli appartamenti</a>
              </div>
            </div>
          </div>
        </div>

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
              center: { lng: {{$localizzazione->longitude}}, lat: {{$localizzazione->latitude}} },

            });

            // creo marker
          var marker = new H.map.Marker({ lat: {{$localizzazione->latitude}}, lng: {{$localizzazione->longitude}} });

            // aggiungo marker alla mappa:
          map.addObject(marker);
        </script>
      @endsection
