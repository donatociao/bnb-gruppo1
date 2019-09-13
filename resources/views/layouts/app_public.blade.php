<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EstasifashionReply_AR') }}</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer charset="utf-8"></script>

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
  </body>
</html>
