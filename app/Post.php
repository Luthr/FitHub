<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
      //Post belongs to a category
      return $this->belongsTo('App\Category');
    }

    public function tags(){
      //Post belongs to a category
      return $this->belongsToMany('App\Tag');
    }

}
