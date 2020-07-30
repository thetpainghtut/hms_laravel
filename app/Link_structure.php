<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link_structure extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['name','status','icon'];
}
