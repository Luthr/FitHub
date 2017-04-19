<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * @package App
 */
class Booking extends Model
{

    /**
     * @var string
     */
    public $table = 'bookings';

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'email',
        'date',
        'timeofday',
        'info'
    ];
    //
}
