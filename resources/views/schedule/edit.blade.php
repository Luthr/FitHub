@extends('_layout')

@section('title', "| Edit Tag")

@section('content')
    <div class="container page-margin-top">
        <div class="row">
            <!-- Blog entries -->
            <div class="w3-col w3-margin">
                <h1>Update Your Schedule</h1>
                <h5>Select the day and period available for bookings</h5>
                <hr>
        {{ Form::open(['route' => 'schedule.update', 'method' => "PUT"]) }}

        @foreach ($schedule as $day)
            <div class="panel panel-info">
                <!-- Default panel contents -->
                <div class="panel-heading">{{ $day->day }}</div>
                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ Form::label('day[' . $day->id . '][morning]', "Morning:") }}</th>
                        <th>{{ Form::label('day[' . $day->id . '][afternoon]', "afternoon:") }}</th>
                        <th>{{ Form::label('day[' . $day->id . '][evening]', "evening:") }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ Form::hidden('day[' . $day->id . '][morning]', 0) }}{{ Form::checkbox('day[' . $day->id . '][morning]', 1, $day->morning) }}</td>
                        <td>{{ Form::hidden('day[' . $day->id . '][afternoon]', 0) }}{{ Form::checkbox('day[' . $day->id . '][afternoon]', 1, $day->afternoon) }}</td>
                        <td>{{ Form::hidden('day[' . $day->id . '][evening]', 0) }}{{ Form::checkbox('day[' . $day->id . '][evening]', 1, $day->evening) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {{--{{ Form::label('day[' . $day->id . '][morning]', "Morning:") }}--}}
            {{--{{ Form::checkbox('day[' . $day->id . '][morning]', 1, $day->morning) }}--}}
            {{--{{ Form::label('day[' . $day->id . '][afternoon]', "afternoon:") }}--}}
            {{--{{ Form::checkbox('day[' . $day->id . '][afternoon]', 1, $day->afternoon) }}--}}
            {{--{{ Form::label('day[' . $day->id . '][evening]', "evening:") }}--}}
            {{--{{ Form::checkbox('day[' . $day->id . '][evening]', 1, $day->evening) }}--}}
        @endforeach

        {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}

        {{ Form::close() }}
    </div>
        </div>
    </div>

@endsection