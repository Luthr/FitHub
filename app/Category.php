<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{

    public $fillable = [
        'name'
    ];

    /**
     * @var string Set table name manually
     */
    protected $table = 'categories';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(){
      //Category has many posts
      return $this->hasMany(Post::class);
    }
}
