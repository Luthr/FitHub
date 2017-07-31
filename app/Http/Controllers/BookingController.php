<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Mail\NewBooking;
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

        \Mail::send(new NewBooking($booking));

        \Session::flash('success', "Your booking has been placed, we'll be in contact to confirm the details");

        return redirect('/');

    }

}
