@extends('_layout')

@section('title', ' | Contact Us')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <header class="w3-container w3-center">
                <h1><b>Contact</b></h1>
                <p>Leave me message</p>
            </header>
            <div class="w3-container w3-card-4 w3-padding-16 w3-white">
                <form class="form-horizontal" action="/contact" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                        <label for="inputFullname" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputFullname" name="fullname"
                                   placeholder="Name" value="{{ old('fullname') }}">
                            @if ($errors->has('fullname'))
                                <small class="text-danger">{{ $errors->first('fullname') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                   placeholder="Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="inputPhone" class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="inputPhone" name="phone"
                                   placeholder="Telephone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="inputMessage" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                                <textarea class="form-control" id="inputMessage" name="message"
                                          placeholder="Message">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <small class="text-danger">{{ $errors->first('message') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
