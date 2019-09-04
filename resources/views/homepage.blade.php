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
    <link rel="stylesheet" href="public/css/app.css">
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
    <!--TITLE-->
    <div class="title m-b-md">
      BoolBnB
      </div>
      <!--SEARCHBAR-->
      <div class="searchbar">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
          <button type="button" class="btn btn-secondary">Cerca</button>
        </form>
      </div>
    </div>

  <!--HEADER-->
  <div class="header-container">
    <p>I nostri appartamenti:</p>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">(primo appartamento)</h5>
          <h6 class="card-subtitle mb-2 text-muted">(piccola descrizione e luogo)</h6>
          <img src=" " alt=" " class="rounded">
        </div>
      </div>
  </div>
</body>
</html>
