@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card_container">
              @forelse($appartamentiUtente as $apartment)
              
              id: {{$apartment->id}} - title: {{$apartment->title}} -  mq: {{$apartment->mq}} - num stanze: {{$apartment->rooms_number}} -
              @empty
              <p> Non ci sono appartamenti </p>
              @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
