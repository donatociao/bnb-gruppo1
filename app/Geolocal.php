<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geolocal extends Model
{
    protected $fillable = ['latitude', 'longitude'];

    public function address(){
      return $this->hasOne('App\Address');
    }

}
