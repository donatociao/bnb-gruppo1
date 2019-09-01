@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card_container d-flex flex-row justify-content-around">
              @forelse($userApartment as $apartment)
              <div class="card" style="width: 18rem;">
                <img src="{{ $apartment-> url_img }}" class="card-img-top" alt="Immagine appartamento">
                <div class="card-body">
                  <h5 class="card-title">{{ $apartment-> title}}</h5>
                  <p class="card-text"> {{ $apartment->address->street}} {{$apartment->address->civic_number}}, {{$apartment->address->city}} ({{$apartment->address->prov}}) </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Numero Stanze: <strong>{{ $apartment-> rooms_number}}</strong></li>
                  <li class="list-group-item">Numero Ospiti: <strong>{{ $apartment-> host_number}}</strong></li>
                  <li class="list-group-item">Dimensione(mq): <strong>{{ $apartment-> mq}}</strong></li>
                </ul>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#" class="card-link">Nascondi annuncio</a></li>
                    <li class="list-group-item"><a href="#" class="card-link">Pubblicizza annuncio</a></li>
                    <li class="list-group-item"><a href="#" class="card-link">Modifica annuncio</a></li>
                  </ul>
                </div>
              </div>
              @empty
              <p> Non ci sono appartamenti </p>
              @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
