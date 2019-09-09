<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>BooldBnB</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
    <!--TITLE/SEARCHBAR-->
      <div class="searchbar-container">
        <div class="row">
          <div class="col-12">
            <div class="title">
              <p>BoolBnB<p>
                <div class="searchbar">
                  <form class="form my-2 my-lg-0 w-50 mx-auto">
                    <input class="form-control" type="search" placeholder="Cerca appartamenti" aria-label="Search">
                    <button class="btn btn-dark my-2 my-sm-0" type="submit">CERCA!</button>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  <!--HEADER-->
    <div class="header-container">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>I nostri appartamenti:</p>
            @foreach ($appartamenti as $appartamento)
              <div class="container-card col-md-3">
                <div class="card-body">
                  <p class="card-title">{{ $appartamento->title }}</p>
                  <img class="dim-img col-md-12" src="{{ asset('storage/'. $appartamento->url_img) }}" alt=" " class="rounded">
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!--FOOTER-->
    <div class="footer-container">
        <div class="row">
          <div class="col-md-12">
            <p class="privacy">Condizioni e privacy:</p>
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
    </div>
  </div>
  </body>
</html>
