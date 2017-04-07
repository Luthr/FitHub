<?php

namespace App\Http\Controllers;

use App\Post;

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
      $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
      // return view and pass in posts
      return view('pages.welcome')->withPosts($posts);
  }

  public function getAbout() {

      $first = 'Dean';
      $last = 'Porter';
      $fullname = $first . " " . $last;
      $email = "deanporter_7@hotmail.com";
      $data = [];
      $data['email']= $email;
      $data['fullname']= $fullname;
      return view('pages.about')->withData($data);
  }

  public function getContact() {
       return view('pages.contact');
  }

  public function getBlog() {
       return view('pages.blog');
  }

  public function getAdmin() {
       return view('pages.admin');
  }





}
