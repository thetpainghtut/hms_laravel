<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
  use SoftDeletes;

  protected $fillable = ['transaction_id','guest_id','room_id','check_in_date','check_out_date','no_of_days','no_of_adults','no_of_children','discount_id','advance_payment'];
}
