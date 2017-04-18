@extends('main')
@section('title', " | Blog")
@section('content')

  <!-- w3-content defines a container for fixed size centered content,
  and is wrapped around the whole page content, except for the footer in this example -->
  <div class="w3-content" style="max-width:1400px">
  <!-- Header -->
  <header class="w3-container w3-center w3-padding-32 page-margin-top">
    <h1><b>MY BLOG</b></h1>
    <p>Welcome to the blog of  <span class="w3-tag">Dean</span></p>
  </header>

  <!-- Grid -->
  <div class="w3-row">

  <!-- Blog entries -->
  <div class="w3-col l8 s12">
    <!-- Blog entry -->
    @foreach ($posts as $post)
      <div class="w3-card-4 w3-margin w3-white post">
        @if ($post->image)
          <div>
           <img src="{{ asset('images/' . $post->image)}}" class='imagefit w3-hover-sepia'/>
          </div>
        @endif


        <div class="w3-container">
          <h3 class='form-spacing-top'>{{  $post->title }}</h3>
          <h6 class='form-spacing-top'>{{ $post->category->name }}</h6>
          <h5{{ $post->category->name }}, <span class="w3-opacity">{{ date('M j, Y', strtotime($post->created_at))}}</span></h5>
        </div>

        <div class="w3-container">
          <p class="form-spacing-top">{{ substr(strip_tags($post->body), 0, 400) }}{{ strlen(strip_tags($post->body)) > 400 ? "..." : "" }}</p>
          <div class="w3-row ">
            <div class="w3-col m8 s12 w3-margin-bottom">
              <a href="{{ url('blog/'.$post->slug)}}" class=" form-spacing-top w3-button w3-padding-large w3-white w3-border btn btn-primary">Read More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="w3-col m4 w3-hide-small">
              <p>
              @foreach ($post->tags as $tag)
                <a href='{{route('tags.show', $tag->id)}}'><span class="  form-spacing-top w3-tag w3-light-grey w3-small w3-margin-bottom">{{ $tag->name }}</span></a>
              @endforeach
              </p>
            </div>
          </div>
        </div>
      </div>
      <hr>
    @endforeach
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          {!! $posts->links() !!}
        </div>
      </div>
    </div>
  </div>

  <!-- Introduction menu -->
  <div class="w3-col l4">

    <!-- Posts -->
    <div class="w3-card-2 w3-margin">
      <div class="w3-container w3-padding">
        <h4>Popular Posts</h4>
      </div>
      <ul class="w3-ul w3-hoverable w3-white">
        @foreach ($posts as $post)
        <li class="w3-padding-16" onclick="location.href='{{ url('blog/'.$post->slug)}}';"  style="cursor:pointer;">
          @if ($post->image)
            <img src="{{ asset('images/' . $post->image)}}" alt="Image" class="w3-left w3-margin-right poppostimg">
          @endif
          <span class="w3-large">{{  $post->title }}</span><br>
          <span>{{ $post->category->name }}</span>
        </li>
      @endforeach
      </ul>
    </div>
    <hr>

    <!-- Labels / tags -->
    <div class="w3-card-2 w3-margin">
      <div class="w3-container w3-padding">
        <h4>Tags</h4>
      </div>
      <div class="w3-container w3-white">
      <p>
        @foreach ($tags as $tag)
          <a href='{{route('tags.show', $tag->id)}}'><span class="  form-spacing-top w3-tag w3-light-grey w3-small w3-margin-bottom">{{ $tag->name }}</span></a>
        @endforeach
      </p>
      </div>
    </div>
    <hr>

    <div class="w3-card-2 w3-margin">
      <div class="w3-container w3-padding">
        <h4>Subscribe</h4>
      </div>
      <div class="w3-container w3-white">
        <p>Enter your e-mail below and get notified on the latest blog posts.</p>
        <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
        <p><button type="button" onclick="document.getElementById('subscribe').style.display='block'" class="w3-button w3-block w3-red">Subscribe</button></p>
      </div>
    </div>

  <!-- END Introduction Menu -->
  </div>

  <!-- END GRID -->
  </div><br>

  <!-- END w3-content -->
  </div>


@endsection
