@extends('layouts.app')

@section('content')
<div class="container" style="position: relative; top: 120px;">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="title">
        <h1><i class="fas fa-home fa-2x mr-2"></i> Lista dei tuoi appartamenti</h1>
        <p>Controlla tutti gli appartamenti che hai inserito, aggiungene di nuovi, modificali, nascondili provvisoriamente o eliminali definitivamente!</p>
      </div>
      <div class="card_container">
        <table class="table table-striped mt-7">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Titolo</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          @forelse($userApartments as $apartment)
          <tbody>
            <tr>
              <th scope="row">{{$apartment->id}}</th>
              <td>{{$apartment->title}}</td>
              <td>
              <a class="d-inline-block btn btn-dark" href="{{route('apartments.show', $apartment->id)}}">Visualizza</a>
              <a class="d-inline-block btn btn-secondary" href="{{route('apartments.edit', $apartment->id)}}">Modifica</a>
              <form class="d-inline-block" id="delete" action="{{ route('apartments.destroy', $apartment->id) }}" method="post">
                @method('DELETE')
                @csrf
                <input class="btn btn-danger" type="submit" name="" value="Cancella">
              </form>
              <a class="d-inline-block btn btn-info" href="{{route('chart', $apartment->id)}}">Statistiche</a>
              </td>
            </tr>
          </tbody>
          @empty
          <p> Non ci sono appartamenti </p>
          @endforelse
        </table>
          <div style="margin: 40px 0;">
            <a class="btn btn-primary" href="{{route('apartments.create')}}">Inserisci un appartamento</a>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('title','BoolBnB - Tutti i tuoi appartamenti')
