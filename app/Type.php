<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['name'];

  public function services()
  {
    return $this->belongsToMany('App\Service')->withTimestamps();
  }

  public function rooms()
  {
    return $this->hasMany('App\Room');
  }
}
