<hr>
{!! Form::open(['route' => 'booking.store', 'class' => 'form-horizontal', 'id' => 'booking_form']) !!}
<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center">
            <div class="datepicker-container">
                <div id="datepicker" data-provide="datepicker">
                    <input type="hidden" name="date" value="{{ old('date') }}">
                </div>
                @if($errors->has('date'))
                    <div class="alert alert-danger">{{ $errors->first('date') }}</div>
                @endif
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group {{ $errors->has('timeofday') ? 'has-error' : '' }}">
                <label for="timeofday" class="col-sm-2 control-label">Time of Day</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="timeofday" id="timeofday_morning" value="morning" {{ old('timeofday') == 'morning' ? 'checked' : '' }}>
                            Morning (9am - 11pm)
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="timeofday" id="timeofday_afternoon" value="afternoon" {{ old('timeofday') == 'afternoon' ? 'checked' : '' }}>
                            Afternoon (12pm - 5pm)
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="timeofday" id="timeofday_evening" value="evening" {{ old('timeofday') == 'evening' ? 'checked' : '' }}>
                            Evening (7pm - 9pm)
                        </label>
                    </div>
                </div>
            </div>
            {{--@if($errors->has('timeofday'))--}}
            {{--<div class="alert alert-danger">{{ $errors->first('timeofday') }}</div>--}}
            {{--@endif--}}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="scheduleform_name" placeholder="Name" name="name" value="{{ old('name') }}">
                </div>
            </div>
            {{--@if($errors->has('name'))--}}
            {{--<div class="alert alert-danger">{{ $errors->first('name') }}</div>--}}
            {{--@endif--}}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="scheduleform_email" placeholder="Email"
                           name="email" value="{{ old('email') }}">
                </div>
            </div>
            {{--@if($errors->has('email'))--}}
            {{--<div class="alert alert-danger">{{ $errors->first('email') }}</div>--}}
            {{--@endif--}}

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Additional Information</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="scheduleform_message" name="info" placeholder="Additional Information">{{ old('info') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit <i class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}