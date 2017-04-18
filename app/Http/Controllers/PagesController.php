<?php

namespace App\Http\Controllers;

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
        $content = Content::find(1);
        // return view and pass in posts
        return view('pages.welcome')->withContent($content);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
        return view('pages.about');
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
