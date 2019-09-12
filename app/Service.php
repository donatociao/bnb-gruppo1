<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $fillable = ['wifi', 'parking', 'pool', 'reception', 'spa', 'sea_view'];
}
