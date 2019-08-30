<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  public function address(){
    return $this->hasOne('App/Address');
  }

  public function users(){
    return $this->belongsTo('App/User');
  }
}
