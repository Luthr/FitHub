<!DOCTYPE html>
<html>
  <head>
    @include('partials._head')
  </head>
  <body class="w3-light-grey">
    @include('partials._nav')
    @include('partials._messages')
    <div class="w3-container">
      @yield('content')
      @include('partials._footer')
    </div>
    <a href="#" class="scrollToTop">Scroll To Top</a>
    @include('partials._javascript')
    @yield('scripts')
    </body>
</html>
