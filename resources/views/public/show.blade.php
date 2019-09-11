@extends(Auth::user() ? 'layouts.app' : 'layouts.app_public')
@section('content')
<div class="container-apartment">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card_container">
              <div class="title-apartment">
                {{$appartamento->title}}
              </div>
              <div class="img-apartment-flex">
                <img src="{{ asset('storage/'. $appartamento->url_img) }}">
                <div class="btn-container">
                  <a class="btn-h btn-dark" href="{{route('homepage')}}">Torna alla homepage</a>
                </div>
              </div>
              <div class="container-description">
                <div class="description">
                  Numero stanze: {{$appartamento->rooms_number}}
                </div>
                <div class="description">
                  Numero letti: {{$appartamento->host_number}}
                </div>
                <div class="description">
                  Numero bagni: {{$appartamento->wc_number}}
                </div>
                <div class="description">
                  Metri quadri: {{$appartamento->mq}}
                </div>
                <div class="description">
                  Indirizzo: {{$indirizzo->city}}
                </div>
                <div class="description">
                  CAP: {{$indirizzo->cap}}
                </div>
                <div class="description">
                  Provincia: {{$indirizzo->prov}}
                </div>
                <div class="description">
                  Via: {{$indirizzo->street}}
                </div>
                <div class="description">
                  Numero civico: {{$indirizzo->civic_number}}
                </div>
                <div class="description">
                  Latitudine: {{$localizzazione->latitude}}
                </div>
                <div class="description">
                  Longitudine: {{$localizzazione->longitude}}
                </div>
                <div class="description">
                  @if ($servizi->wifi == 1)
                    WiFi: Si
                  @else
                    WiFi: No
                  @endif
                </div>
                <div class="description">
                  @if ($servizi->parking == 1)
                    Parcheggio: Si
                  @else
                    Parcheggio: No
                  @endif
                </div>
                <div class="description">
                  @if ($servizi->pool == 1)
                    Piscina: Si
                  @else
                    Piscina: No
                  @endif
                </div>
                <div class="description">
                  @if ($servizi->reception == 1)
                    Portineria: Si
                  @else
                    Portineria: No
                  @endif
                </div>
                <div class="description">
                  @if ($servizi->spa == 1)
                    Sauna: Si
                  @else
                    Sauna: No
                  @endif
                </div>
                <div class="description">
                  @if ($servizi->sea_view == 1)
                    Vista mare: Si
                  @else
                    Vista mare: No
                  @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container-email">
  <div class="container-form">
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
      <button type="submit" class="btn-h-e btn-dark">Invia</button>
    </form>
  @endif
</div>
</div>
@endsection
