@extends('layouts.app')

@section('content')
<div class="container" style="position: relative; top: 120px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="title">
              <h1><i class="far fa-envelope-open fa-2x mr-2"></i> Lista delle richieste </h1>
              <p>Controlla tutti le richieste degli utenti interessati!</p>
            </div>

            <div class="card_container">
              <table class="table table-striped mt-7">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Mittente</th>
                    <th scope="col">Messaggio</th>
                    <th scope="col">Cod. appartamento</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                @forelse($userMessages as $message)
                <tbody>
                  <tr>
                    <th scope="row">{{$message->id}}</th>
                    <td>{{$message->email_req}}</td>
                    <td>{{$message->message}}</td>
                    <td>{{$message->apartment_id}}</td>
                    <td>
                      <a class="btn btn-success" href="{{route('mails.show', $message->id)}}">Visualizza</a>
                    </td>
                  </tr>
                </tbody>
              @empty
                <p> Non ci sono messaggi. </p>
              @endforelse
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
