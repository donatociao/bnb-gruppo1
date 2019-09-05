<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>BooldBnB</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!--Fontawesome-->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!--Css-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>

    <!--NAVBAR TOP-->
    <div class="navbar-container">
      <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
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
    <!--TITLE-->
    <div class="title">
      BoolBnB
      <!--SEARCHBAR-->
      <div class="searchbar">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 " type="search" placeholder="Cerca appartamenti" aria-label="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Cerca</button>
        </form>
      </div>
    </div>
  </div>

  <!--HEADER-->
    <div class="header-container">
      <p>I nostri appartamenti:</p>
        <div class="card1 col-4" style="width: 18rem;">
          <div class="card-body">
            <p class="card-title">(primo appartamento)</p>
            <p class="card-subtitle text-muted">(piccola descrizione e luogo)</p>
            <img src=" " alt=" " class="rounded">
          </div>
        </div>
        <div class="card2 col-4" style="width: 18rem;">
          <div class="card-body">
            <p class="card-title">(primo appartamento)</p>
            <p class="card-subtitle text-muted">(piccola descrizione e luogo)</p>
            <img src=" " alt=" " class="rounded">
          </div>
        </div>
        <div class="card3 col-4" style="width: 18rem;">
          <div class="card-body">
            <p class="card-title">(primo appartamento)</p>
            <p class="card-subtitle text-muted">(piccola descrizione e luogo)</p>
            <img src=" " alt=" " class="rounded">
          </div>
        </div>
        <!--FOOTER-->
        <div class="footer-container">
          <p>Condizioni e privacy:</p>
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
          <div class="footer-copyright text-center py-3">© 2019 BoolBnB, Inc. All rights reserved.</div>
          </div>
        </div>
      </div>
  </body>
</html>
