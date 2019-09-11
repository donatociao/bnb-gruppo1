@extends('layouts.app')

@section('content')
<div class="container" style="position: relative; top: 120px;">
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
              <div class="">
                @if ($appartamento->public == 1)
                  Visibilità nei risultati di ricerca: Si
                @else
                  Visibilità nei risultati di ricerca: No
                @endif
              </div>
            </div>
            <div class="">
              <a class="btn btn-primary" href="{{route('apartments.index')}}">Torna agli appartamenti</a>
            </div>
        </div>
    </div>
</div>
@endsection
