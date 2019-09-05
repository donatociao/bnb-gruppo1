@extends('layouts.app')

@section('content')
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email_req" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Messaggio:</label>
    <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Invia</button>
</form>
@endsection
