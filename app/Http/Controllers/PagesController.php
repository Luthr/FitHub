<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use App\Content;
use Mail;
use Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{


# Example
#  public function getExample() {
    # process variable data or params
    # talk to the model
    # revieve from the model
    # compile or process the data from the model if needed
    # pass the data to the correct view
#  }


    /**
     * @return mixed
     */
    public function getIndex()
    {

        $dayTimeSchedule = [];

        foreach (Schedule::all() as $daySchedule) {
            $dayTimeSchedule[$daySchedule->id] = [
                'morning' => $daySchedule->morning,
                'afternoon' => $daySchedule->afternoon,
                'evening' => $daySchedule->evening,
            ];
        }

        $dayTimeSchedule = json_encode($dayTimeSchedule, JSON_UNESCAPED_SLASHES);


        $daysDisabled = Schedule::where([
            'morning' => 0,
            'afternoon' => 0,
            'evening' => 0,
        ])->get()->pluck('id')->map(function($value){return $value - 1;})->implode(',');

        $daysHighlighted = Schedule::where([
            'morning' => 1,
            'afternoon' => 1,
            'evening' => 1,
        ])->get()->pluck('id')->map(function($value){return $value - 1;})->implode(',');

        $content = Content::find(1);
        // return view and pass in posts
        return view('pages.welcome', compact('content', 'daysDisabled', 'daysHighlighted', 'dayTimeSchedule'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        return view('pages.contact');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'sometimes',
            'subject' => 'min:4|max:30',
            'message' => 'required']);

        Mail::send('emails.contact', $request->all(), function ($message) use ($request) {
            $message->from($request->get('email'));
            $message->to('fithub.now@gmail.com');
            $message->subject($request->get('subject'));
        });

        Session::flash('success', 'Your Email Has Been Sent!');
        return redirect('/');
    }
}
