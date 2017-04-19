@extends('_layout')

@section('title', ' | Homepage')

@section('content')

    @if(old() === [])
        @include('partials._homepage-content')
    @endif

    @include('partials._booking-form')

@endsection

@section('scripts')


    <script type="text/javascript">
        window.schedule = {
            daysDisabled: "{{ $daysDisabled }}",
            daysHighlighted: "{{ $daysHighlighted }}",
            dayTimes: {!! $dayTimeSchedule !!}
        }
    </script>

@append