<!DOCTYPE html>
<html>
  <head>
    @include('partials._head')
  </head>
  <body class="w3-blue-grey">
    @include('partials._nav')
    @include('partials._messages')
    <div class="container">
      @yield('content')
      @include('partials._footer')
    </div>
      <script>
        // Change style of navbar on scroll
        window.onscroll = function() {myFunction()};
        function myFunction() {
            var navbar = document.getElementById("myNavbar");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.className = "w3-bar" + " w3-card-2" + " w3-animate-top" + " w3-white";
            } else {
                navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
                    }
                }

        // Used to toggle the menu on small screens when clicking on the menu button
        function toggleFunction() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
      <a href="#" class="scrollToTop">Scroll To Top</a>
    </body>
</html>
