<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['room_number','type_id','mrates','urate','status','floor_id'];
  
  // no_of_occupancy (removed 14/06/2020)

  public function photos($value='')
  {
    return $this->hasMany('App\Roomphoto');
  }

  public function type($value='')
  {
    return $this->belongsTo('App\Type');
  }

  public function floor($value='')
  {
    return $this->belongsTo('App\Floor');
  }

  public function available($value='')
  {
    if ($this->status == 0) {
      return 'available';
    }else if ($this->status == 1) {
      return 'booked';
    }else if ($this->status == 2) {
      return 'occupied';
    }
  }

}
