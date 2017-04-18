<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Post;
use App\Content;
use Mail;
use Session;
use Purifier; // Enables the use of purifier

class PagesController extends Controller {


# Example
#  public function getExample() {
      # process variable data or params
      # talk to the model
      # revieve from the model
      # compile or process the data from the model if needed
      # pass the data to the correct view
#  }


  public function getIndex() {
          // dd($content);
      // order data
      $content = Content::find(1);
      // return view and pass in posts
      return view('pages.welcome')->withContent($content);
  }

  public function getAbout() {

      return view('pages.about');
  }

  public function getContact() {
       return view('pages.contact');
  }

    public function postContact(Request $request) {
         $this->validate($request, [
            'firstname'   => 'required',
            'lastname'    => 'required',
            'email'       => 'required|email',
            'subject'     => 'min:4|max:30',
            'message'     => 'required']);
           $data = array(
             'firstname'  => $request->firstname,
             'lastname'   => $request->lastname,
             'email'      => $request->email,
             'phone'      => $request->phone,
             'subject'    => $request->subject,
             'emailMessage'    => $request->message
           );

         Mail::send('emails.contact', $data, function($message) use ($data){
          $message->from($data['email']);
          $message->to('fithub.now@gmail.com');
          $message->subject($data['subject']);
       });

       Session::flash('success', 'Your Email Has Been Sent!');
       return redirect('/');
  }
}
