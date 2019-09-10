@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card_container">
              <div class="">
                ID: {{$appartamento->id}}
              </div>
              <div class="">
                Titolo: {{$appartamento->title}}
              </div>
              <div class="">
                Numero stanze: {{$appartamento->rooms_number}}
              </div>
              <div class="">
                Numero letti: {{$appartamento->host_number}}
              </div>
              <div class="">
                Numero bagni: {{$appartamento->wc_number}}
              </div>
              <div class="">
                Metri quadri: {{$appartamento->mq}}
              </div>
              <div class="">
                Foto appartamento: <img src="{{ asset('storage/'. $appartamento->url_img) }}">
              </div>
              <div class="">
                Indirizzo: {{$indirizzo->city}}
              </div>
              <div class="">
                CAP: {{$indirizzo->cap}}
              </div>
              <div class="">
                Provincia: {{$indirizzo->prov}}
              </div>
              <div class="">
                Via: {{$indirizzo->street}}
              </div>
              <div class="">
                Numero civico: {{$indirizzo->civic_number}}
              </div>
              <div class="">
                Latitudine: {{$localizzazione->latitude}}
              </div>
              <div class="">
                Longitudine: {{$localizzazione->longitude}}
              </div>
              <div class="">
                @if ($servizi->wifi == 1)
                  WiFi: Si
                @else
                  WiFi: No
                @endif
              </div>
              <div class="">
                @if ($servizi->parking == 1)
                  Parcheggio: Si
                @else
                  Parcheggio: No
                @endif
              </div>
              <div class="">
                @if ($servizi->pool == 1)
                  Piscina: Si
                @else
                  Piscina: No
                @endif
              </div>
              <div class="">
                @if ($servizi->reception == 1)
                  Portineria: Si
                @else
                  Portineria: No
                @endif
              </div>
              <div class="">
                @if ($servizi->spa == 1)
                  Sauna: Si
                @else
                  Sauna: No
                @endif
              </div>
              <div class="">
                @if ($servizi->sea_view == 1)
                  Vista mare: Si
                @else
                  Vista mare: No
                @endif
              </div>
            </div>
            <div class="mt-1">
              <a class="btn btn-primary" href="{{route('homepage')}}">Torna alla homepage</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">

  @if (Auth::check() && Auth::user()->email === $utente->email)
    <p>Sei il proprietario dell'appartamento.</p>
  @else
    <h2>Sei interessato all'appartamento? Contatta {{$utente->name}}!</h2>

    <form id="form_geo" method="post" action="{{ route('show.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">

        <input type="text" name="user_id" class="d-none" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$utente->id}}">
        <input type="text" name="apartment_id" class="d-none" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$appartamento->id}}">

        <label for="exampleInputEmail1">Indirizzo Email:</label>
        @if (Auth::check())
          <input type="email" name="email_req" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$utente->email}}">
        @else
          <input type="email" name="email_req" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        @endif
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Messaggio:</label>
        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Invia</button>
    </form>
  @endif
</div>
@endsection
