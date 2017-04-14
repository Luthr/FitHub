@extends ('main')
@section('title', ' | Contact Us')
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Contact Me</h1>
          <hr>
          <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label name="email">Email:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input id="email" name="email" class="form-control" placeholder="Enter email">
              </div>
            </div>
            <div class="form-group">
              <label name="subject">Subject:</label>
              <input id="subject" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <label name="message">Message:</label>
              <textarea id="message" name="message" class="form-control" placeholder="Type your message here..."></textarea>
            </div>

            <input type="submit" value="Send Message" class="btn btn-success">
          </form>
      </div>

    </div>
  </div>
@endsection
