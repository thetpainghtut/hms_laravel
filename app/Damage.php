<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Damage extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['description','mrate'];

  public function checkin()
  {
    return $this->belongsToMany('App\Checkin');
  }
}
