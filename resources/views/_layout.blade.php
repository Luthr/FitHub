<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fit Hub @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" type="text/css">
    @yield('styles')

</head>
<body class="w3-light-grey">
    <div class="page-margin-top">
        @include('partials._nav')
        @include('partials._messages')
        @yield('content')
        @include('partials._footer')
        <a href="#" class="scrollToTop">Scroll To Top</a>
    </div>
</body>
<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
@yield('scripts')
</html>