<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

/**
 * Class BookingController
 * @package App\Http\Controllers
 */
class BookingController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d|after:yesterday',
            'timeofday' => 'required|in:morning,afternoon,evening',
            'email' => 'required|email',
            'info' => 'sometimes|max:1024',
        ]);

        $booking = new Booking($request->all());
        $booking->save();

        \Mail::send('emails.booking', $request->all(), function ($message) use ($request) {
            $message->from($request->get('email'));
            $message->to('fithub.now@gmail.com');
            $message->subject('New Booking Request');
        });

        \Session::flash('success', "Your booking has been placed, we'll be in contact to confirm the details");

        return redirect('/');

    }

}
