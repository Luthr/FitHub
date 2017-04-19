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
    @include('partials._nav')
    <div class="w3-container">
    @include('partials._messages')
    </div>
        @yield('content')
        @include('partials._footer')

    <a href="#" class="scrollToTop">Scroll To Top</a>
    <script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
    @yield('scripts')
</body>
</html>