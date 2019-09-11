<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['message','email_req','user_id','apartment_id'];

  public function apartments(){
    return $this->belongsTo('App/Apartment');
  }
}
