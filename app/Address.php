<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = ['city', 'cap', 'prov', 'street', 'civic_number'];

  public function apartment(){
    return $this-> hasOne('App\Apartment');
  }

  public function geolocal(){
    return $this->belongsTo('App\Geolocal','geolocal_id');
  }

}
