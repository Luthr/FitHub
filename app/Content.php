<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Content
 * @package App
 */
class Content extends Model
{

    /**
     * @var array
     */
    public $fillable = [
        'image',
        'about',
        'website',
        'portfolio'
    ];

}
