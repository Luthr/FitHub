<!-- Default Bootstrap Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Fit Hub</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : ""}}"><a href="/"><i class="fa fa-home fa-fw"></i> Home</a></li>
            <li class="{{ Request::is('blog') ? "active" : ""}}"><a href="/blog"><i class="fa fa-commenting-o fa-fw"></i> Blog</a></li>
            <li class="{{ Request::is('about') ? "active" : ""}}"><a href="/about"><i class="fa fa-user fa-fw"></i>  About</a></li>
            <li class="{{ Request::is('contact') ? "active" : ""}}"><a href="/contact"><i class="fa fa-envelope fa-fw"></i> Contact</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            @if (auth::check())
              <li class="dropdown">
                <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('content.edit', [1])}}">Home Content</a></li>
                  <li><a href="{{ route('posts.index')}}">Posts</a></li>
                  <li><a href="{{ route('category.index')}}">Categories</a></li>
                  <li><a href="{{ route('tags.index')}}">Tags</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ route('logout') }}">Log Out</a></li>
                </ul>
              </li>
            @endif
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>
