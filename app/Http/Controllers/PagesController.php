<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Post;
use Mail;
use Session;

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
      // order data
      $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
      // return view and pass in posts
      return view('pages.welcome')->withPosts($posts);
  }

  public function getAbout() {

      $first    = 'Dean';
      $last     = 'Porter';
      $fullname = $first . " " . $last;
      $email    = "deanporter_7@hotmail.com";
      $data     = [];
      $data['email']= $email;
      $data['fullname']= $fullname;
      return view('pages.about')->withData($data);
  }

  public function getContact() {
       return view('pages.contact');
  }

  public function postContact(Request $request) {
       $this->validate($request, [
         'email'    => 'required|email',
         'subject'  => 'min:4',
         'message'  => 'min:15']);

         $data = array(
           'email'        => $request->email,
           'subject'      => $request->subject,
           'emailMessage' => $request->message
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
