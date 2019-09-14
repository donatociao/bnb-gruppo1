<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
      //contatore appartamenti inseriti
      $user = Auth::user();
      $id = $user->id;
      $appartamenti_caricati = DB::table('apartments')->where('user_id', '=', Auth::user()->id)->get();
      $conteggio_caricati = $appartamenti_caricati->count();

      //contatore messaggi ricevuti
      $messaggi_ricevuti = DB::table('messages')->where('user_id', '=', Auth::user()->id)->get();
      $conteggio_messaggi = $messaggi_ricevuti->count();

      $data = [
        'caricati' => $conteggio_caricati,
        'ricevuti' => $conteggio_messaggi,
      ];
        return view('profile.edit', $data);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
