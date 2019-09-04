@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card_container">
              @forelse($userApartments as $apartment)
              id: {{$apartment->id}} - title: {{$apartment->title}} -  mq: {{$apartment->mq}} - num stanze: {{$apartment->rooms_number}}
                 <a class="btn btn-success" href="{{route('apartments.show', $apartment->id)}}">Visualizza</a>
               <form class="" action="{{route('apartments.destroy', $apartment->id)}}" method="post" style="display: inline;">
                 @method('DELETE')
                 @csrf
                 <input class="btn btn-danger" type="submit" name="" value="Cancella">
               </form>
              @empty
              <p> Non ci sono appartamenti </p>
              @endforelse
              <div class="">
                <a class="btn btn-primary" href="{{route('apartments.create')}}">Inserisci un appartamento</a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection