@component('mail::message')
    # Contact Form Submission

@component('mail::table')
    |        |          |
    | ------------- |:-------------:|
    | Name          | {{ $fullname }} |
    | Email         | {{ $email or 'None' }} |
    | Phone         | {{ $phone or 'None' }} |
@endcomponent


@component('mail::panel')
    {{ $message }}
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent


