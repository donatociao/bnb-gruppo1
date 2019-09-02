<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  protected $fillable = ['title', 'rooms_number', 'host_number', 'wc_number', 'mq'];

  public function address(){
    return $this->hasOne('App/Address');
  }

  public function users(){
    return $this->belongsTo('App/User');
  }
}
