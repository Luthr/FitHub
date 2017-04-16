<!DOCTYPE html>
<html>
  <head>
    @include('partials._head')
  </head>
  <body class="w3-light-grey">
    @include('partials._nav')
    <div class="w3-container">
      @include('partials._messages')
      @yield('content')
      @include('partials._footer')
    </div>
    <a href="#" class="scrollToTop">Scroll To Top</a>
    @include('partials._javascript')
    @yield('scripts')
    </body>
</html>
