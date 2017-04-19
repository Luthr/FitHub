<?php

use Illuminate\Database\Seeder;

/**
 * Class ScheduleSeeder
 */
class ScheduleSeeder extends Seeder
{

    /**
     * @var array
     */
    private $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->days as $day) {
            $schedule = new \App\Schedule(['day' => $day]);
            $schedule->save();
        }
        //
    }
}
