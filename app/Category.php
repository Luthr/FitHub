<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Manual telling which table
    protected $table = 'categories';

    public function posts(){
      //Category has many posts
      return $this->hasMany('App\Post');
    }
}
