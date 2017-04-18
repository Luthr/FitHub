@extends('_layout')

@section('title', ' | Contact Us')

@section('content')
  <div class="container page-margin-top">
      <div class="row">
        <div class="col-md-12">
          <header class="w3-container w3-center w3-padding-32">
            <h1><b>Contact</b></h1>
            <p>Leave me message</p>
          </header>
          <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group w3-container form-spacing-top">
              <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input id="firstname" name="firstname" class="form-control" placeholder="Enter first name">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="input-group ">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input id="lastname" name="lastname" class="form-control" placeholder="Enter last name">
              </div>
            </div>
          </div>


            <div class="form-group w3-container">
              <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input id="email" name="email" class="form-control" placeholder="Enter email">
              </div>
            </div>
          </div>
          <div class="form-group w3-container">
            <div class="col-sm-12">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-phone"></i>
              </div>
              <input id="phone" name="phone" class="form-control" placeholder="Enter contact number">
            </div>
          </div>
        </div>

        <div class="form-group w3-container">
          <div class="col-sm-12">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-cog "></i>
            </div>
            <input id="subject" name="subject" class="form-control" placeholder="Enter message subject">
          </div>
        </div>
      </div>

        <div class="form-group w3-container">
          <div class="col-sm-12">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-comment fa-2"></i>
              </div>
              <textarea class="form-control" name="message" id="message" rows="5" style="width:100%" placeholder="Enter your message here"></textarea>
            </div>
          </div>
        <div class='w3-container w3-padding-16'>
          <input type="submit" value="Send Message" class="form-spacing-top btn btn-success">
        </div>
          </div>
          </form>
      </div>

    </div>
  </div>
@endsection
