<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;

class EmailController extends Controller
{
  public function contatta_host(){
    return view('public.show');
  }

  public function invio_messaggio(Request $request){
    $validatedData = $request->validate([
    'message' => 'required|max:255',
    'email_req' => 'required|email',
    'user_id'=> 'required',
    'apartment_id' => 'required'
    ]);

    $dati_messaggio = $request->all();
    $nuovo_messaggio = new Message();
    $nuovo_messaggio->fill($dati_messaggio);
    $nuovo_messaggio->save();

    Mail::to('alessandrorossi643@gmail.com')->send(new NewMessage ($nuovo_messaggio));

    return redirect()->route('messaggio_inviato');
  }


  public function messaggio_inviato(){
    return view('public.messaggio_inviato');
  }


  public function visualizza_email(){
    $userID=Auth::user()->id;
    $userMessages = Message::where('user_id','=',$userID)->get();

    return view('mails.index', compact('userMessages'));
  }


  public function visualizza_singolaemail($id_email)
  {

    $dati_messaggio = Message::where('id', $id_email)->first();
    if (empty($dati_messaggio)) {
      abort(404);
    }

    $dati_appartamento = Apartment::where('id', $dati_messaggio->apartment_id)->first();
    $data = [
      'appartamento' => $dati_appartamento,
    ];
    return view('mails.show', $data);
  }
}
