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

          <div class="w3-container w3-card-4 w3-padding-16 w3-white">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </div>
            </form>

          </div>



          <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group w3-container form-spacing-top" data-parsley-validate =''>
              <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input id="firstname" name="firstname" class="form-control" placeholder="Enter first name" required = '', maxlength = '255'>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="input-group ">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input id="lastname" name="lastname" class="form-control" placeholder="Enter last name" required = '', maxlength = '255'>
              </div>
            </div>
          </div>


            <div class="form-group w3-container" data-parsley-validate =''>
              <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input id="email" name="email" class="form-control" placeholder="Enter email" required = '', maxlength = '255' >
              </div>
            </div>
          </div>
          <div class="form-group w3-container" data-parsley-validate =''>
            <div class="col-sm-12">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-phone"></i>
              </div>
              <input id="phone" name="phone" class="form-control" placeholder="Enter contact number">
            </div>
          </div>
        </div>

        <div class="form-group w3-container" data-parsley-validate =''>
          <div class="col-sm-12">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-cog "></i>
            </div>
            <input id="subject" name="subject" class="form-control" placeholder="Enter message subject" required = '', maxlength = '255'>
          </div>
        </div>
      </div>

        <div class="form-group w3-container" data-parsley-validate =''>
          <div class="col-sm-12">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-comment fa-2"></i>
              </div>
              <textarea class="form-control" name="message" id="message" rows="5" style="width:100%" placeholder="Enter your message here" required = '', maxlength = '255'></textarea>
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
