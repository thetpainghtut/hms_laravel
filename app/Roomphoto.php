<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roomphoto extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['room_id','file_dir'];
}
