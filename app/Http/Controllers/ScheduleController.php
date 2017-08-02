<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

/**
 * Class ScheduleController
 * @package App\Http\Controllers
 */
class ScheduleController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'day' => 'array',
            'day.*.morning' => 'sometimes|boolean',
            'day.*.evening' => 'sometimes|boolean',
            'day.*.afternoon' => 'sometimes|boolean'
        ]);

        $selectedDays = $request->get('day');


//        dd(array_merge(['a' => false, false, false], ['a' => true]));
        foreach (Schedule::orderBy('id')->get() as $id => $scheduleDay) {

            $scheduleDay->update(array_get($selectedDays, $scheduleDay->id));
            $scheduleDay->save();
        }
//        dd($request->all(), $selectedDays, Schedule::orderBy('id')->get());


        \Session::flash('success', 'Schedule updated');

        return redirect()->route('schedule.edit');

    }

    /**
     * @return mixed
     */
    public function edit ()
    {
        return view('schedule.edit')->withSchedule(Schedule::orderBy('id')->get());
    }
    //
}
