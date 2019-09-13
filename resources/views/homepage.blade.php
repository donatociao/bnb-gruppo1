<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>BooldBnB</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!--Css-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>

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
            <div class="col-sm-12 col-md-10 col-lg-8">
              <div class="card-body-b row no-gutters align-items-center">
                <form class="" action="{{route('public.search')}}" method="get">
                  @csrf
                  <div class="col-sm-12 col-md-12 col-lg-12">
                      <input id="query_cerca" class="cerca form-control form-control-lg form-control-borderless col-s-12 col-md-12" type="search" placeholder="Inserisci la città...">
                  </div>
                  <input  id="lat_search" type="text" name="lat_search" class="form-control d-none" value="" placeholder="">
                  <input  id="lon_search" type="text" name="lon_search" class="form-control d-none" value="" placeholder="">
                  <div class="col-auto">
                      <button class="btn btn-dark" type="submit">Cerca</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="header-container">
        <div class="container">
          <div class="row">
              <p>I nostri appartamenti in evidenza:</p>
              @foreach ($appartamenti as $appartamento)
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <div class="row">
                    <div class="col-12">
                      <h3 class="card-title">{{ $appartamento->title }}</h3>
                    </div>
                    <form class="" action="{{route('public.show')}}" method="get">
                      <input style="display: none" type="text" name="address_id" value={{$appartamento->address_id}}>
                      <input class="card-title" type="submit" name="" value="Visualizza">
                    </form>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <img class="dim-img" alt="Responsive image" src="{{ asset('storage/'. $appartamento->url_img) }}" alt=" " class="rounded">
                    </div>
                  </div>
                </div>
              @endforeach
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
