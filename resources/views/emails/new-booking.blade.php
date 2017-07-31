@component('mail::message')
    # You have a new booking

@component('mail::table')
    |        |          |
    | ------------- |:-------------:|
    | Name          | {{ $name }} |
    | Email         | {{ $email }} |
    | Date          | {{ $date }} |
    | Time          | {{ $timeofday }} |
@endcomponent


@component('mail::panel')
    {{ $info }}
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
