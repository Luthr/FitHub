<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function posts(){
    // belongs to a many to many relation
    return $this->belongsToMany('App\Post');
  }

}
