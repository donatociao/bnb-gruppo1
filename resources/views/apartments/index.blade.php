@extends('layouts.app')

@section('content')
<div class="container" style="position: relative; top: 120px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card_container">
              <table class="table table-striped mt-7">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Mq</th>
                    <th scope="col">Rooms</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                @forelse($userApartments as $apartment)
                <tbody>
                  <tr>
                    <th scope="row">{{$apartment->id}}</th>
                    <td>{{$apartment->title}}</td>
                    <td>{{$apartment->mq}}</td>
                    <td>{{$apartment->rooms_number}}</td>
                    <td>
                      <a class="btn btn-success" href="{{route('apartments.show', $apartment->id)}}">Visualizza</a>
                      <a class="btn btn-warning" href="{{route('apartments.edit', $apartment->id)}}">Modifica</a>
                      <form id="delete" action="{{ route('apartments.destroy', $apartment->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" name="" value="Cancella">
                      </form>
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
