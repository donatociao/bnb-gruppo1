@extends('layouts.app')

@section('content')
<div class="container" style="position: relative; top: 120px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card_container bg-white rounded">
              <div class="col-lg-12 py-2 border border-secondary">
                <i class="fas fa-user-circle fa-2x"></i>
                <h4 class="d-inline-block pl-3"><strong>Mittente:</strong> {{$messaggio->email_req}}</h4>
              </div>
              <div class="col-lg-12 py-2 border border-secondary">
                <i class="fas fa-home fa-2x"></i>
                <h4 class="d-inline-block pl-3"><strong>Codice App.:</strong> {{$messaggio->apartment_id}}</h4>
              </div>
              <div class="col-lg-12 py-2 border border-secondary" style="min-height:130px;">
                <h4 class="d-inline-block"><i class="far fa-envelope-open fa-2x pr-3"></i><strong>Messaggio:</strong> {{$messaggio->message}}</h4>
              </div>
              <div class="col-lg-12 py-2 border border-secondary">
                <h5><strong>Inviato il:</strong> {{$messaggio->created_at}}</h5>
              </div>
            </div>
            <a class="btn btn-primary mt-5" href="{{route('mails.index')}}">Torna alle richieste ricevute</a>
        </div>
    </div>
</div>
@endsection
