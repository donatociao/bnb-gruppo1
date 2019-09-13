@extends('layouts.app_public')

@section('content')
<div class="container full-height">
  <div class="row">
    <div class="col-lg-12">
      <h2>Il tuo messaggio è stato inviato. L'host risponderà alla tua richiesta appena possibile.</h2>
    </div>
    <div class="col-lg-12 d-flex align-items-center justify-content-center">
      <a class="btn-h btn-dark text-center w-25" href="{{route('homepage')}}">Torna alla homepage</a>
    </div>
  </div>
</div>
@endsection
