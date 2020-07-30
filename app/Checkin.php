<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkin extends Model
{
  use SoftDeletes;

  protected $fillable = ['transaction_id','room_id','check_in_date','check_out_date','no_of_days','no_of_adults','no_of_children','discount_id','total'];

  public function discount($value='')
  {
    return $this->belongsTo('App\Discount');
  }

  public function room($value='')
  {
    return $this->belongsTo('App\Room');
  }

  public function guests()
  {
    return $this->belongsToMany('App\Guest');
  }

  public function damages()
  {
    return $this->belongsToMany('App\Damage');
  }

}
