<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  protected $fillable = ['title', 'rooms_number', 'host_number', 'wc_number', 'mq', 'public'];

  public function address(){
    return $this->belongsTo('App\Address','address_id');
  }

  public function users(){
    return $this->belongsTo('App/User');
  }
}
