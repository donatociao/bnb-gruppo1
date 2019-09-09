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
        <div class="title">
          <p>BoolBnB<p>

            <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                                <div class="card-body-b row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Cerca l'appartamento...">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-dark" type="submit">Cerca</button>
                                    </div>
                                    <!--end of col-->
                                </div>

                        </div>
                        <!--end of col-->
                    </div>
        </div>
      </div>
  <!--HEADER-->
    <div class="header-container">
      <div class="container">
        <div class="row-header">
          <div class="col-md-12">
            <p>I nostri appartamenti in evidenza:</p>
            <!--appartamenti in evidenza primi 4 (da vedere) : MORBIDO!-->
            @foreach ($appartamenti as $appartamento)
              <div class="container-card col-md-3 col-xs-4">
                <div class="card-body">
                  <p class="card-title">{{ $appartamento->title }}</p>
                  <img class="dim-img" alt="Responsive image" src="{{ asset('storage/'. $appartamento->url_img) }}" alt=" " class="rounded">
                </div>
              </div>
            @endforeach
          </div>
          <!--<div class="col-md-12">
            @foreach ($appartamenti as $appartamento)
              <div class="container-card col-md-3">
                <div class="card-body">
                  <p class="card-title">{{ $appartamento->title }}</p>
                  <img class="dim-img col-md-12" src="{{ asset('storage/'. $appartamento->url_img) }}" alt=" " class="rounded">
                </div>
              </div>
            @endforeach
          </div>-->
        </div>
      </div>
    </div>
    <!--FOOTER-->
    <div class="footer-container">
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
  </body>
</html>
