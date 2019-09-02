<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = ['city', 'cap', 'prov', 'street', 'civic_number'];

  // DECIDERE QUALE USARE
  // public function apartments(){
  //   return $this-> belongsTo('App/Apartment');
  // }
  // public function apartment(){
  //   return $this-> hasOne('App\Apartment');
  // }
}
