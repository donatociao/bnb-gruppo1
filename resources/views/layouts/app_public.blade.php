<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Meta mappa --}}
    <meta name="viewport" content="initial-scale=7.0, width=device-width" />

    <title>{{ config('app.name', 'EstasifashionReply_AR') }}</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer charset="utf-8"></script>

    {{-- script mappa --}}
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">


    <!--Css -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <!--NAVBAR TOP-->
    <div class="navbar-container">
      <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Accedi</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrati</a>
                    @endif
                @endauth
            </div>
          @endif
      </div>
    </div>
      @yield('content')
      <!--FOOTER-->
      <div class="footer-container">
        <div class="col col-lg-12 col-md-12 col-sm-12">
          <p class="privacy privacy-con">Condizioni e privacy:</p>
          <hr class="clearfix w-100 d-md-none pb-3">
          <div class="list">
            <ul class="list-unstyled">
              <li>
                <a href="">Condizioni</a>
              </li>
              <li>
                <a href="">Opportunità di lavoro</a>
              </li>
              <li>
                <a href="">Aiuto</a>
              </li>
              <li>
                <a href="">News</a>
              </li>
            </ul>
          </div>
          <div class="copyright">© 2019 BoolBnB, Inc. All rights reserved.</div>
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
            zoom: 10,
            center: { lng: {{$localizzazione->longitude}}, lat: {{$localizzazione->latitude}} }
          });

          // creo marker
        var marker = new H.map.Marker({ lat: {{$localizzazione->latitude}}, lng: {{$localizzazione->longitude}} });

          // aggiungo marker alla mappa:
        map.addObject(marker);
      </script>
  </body>
</html>
