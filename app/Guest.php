<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['name','address','contact', 'nrc','email','gender'];

  public function gendertype($value='')
  {
    if ($this->gender == 0) {
      return 'female';
    }else if ($this->gender == 1) {
      return 'male';
    }
  }

  public function checkins()
  {
    return $this->belongsToMany('App\Checkin');
  }

}
