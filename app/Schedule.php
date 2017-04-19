<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 * @package App
 */
class Schedule extends Model
{

    /**
     * @var string Manually set table
     */
    public $table = 'schedule';

    /**
     * @var array Only allow day to be fillable
     */
    public $fillable = [
        'day',
        'morning',
        'afternoon',
        'evening'
    ];

    /**
     * @var bool Disable timestamps
     */
    public $timestamps = false;
    //

}
