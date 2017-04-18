@extends('_layout')

@section('title',' | ' . $post->title)

@section('content')

  <div class="container page-margin-top">
  <div class='w3-row'>
    <div class="w3-content l8 s12">
      {{-- New --}}
        <!-- Blog entry -->
          <div class="w3-card-4 w3-margin  w3-white post">

            @if ($post->image)
              <div>
               <img src="{{ asset('images/' . $post->image)}}" style='width:100%'/>
              </div>
            @endif
            <header class="w3-container w3-light-grey">
            <h2 class='form-spacing-top singlepad'>{{ $post->title }}</h2>
            </header>
            <div class="singlepad">

            <div class="w3-container">
              <h6>{{ $post->category->name }}</h6>
              <h5{{ $post->category->name }}, <span class="w3-opacity">{{ date('M j, Y', strtotime($post->created_at))}}</span></h5>
            </div>

            <div class="w3-container">
              <p class="form-spacing-top">{!! $post->body !!}</p>
              <div class="w3-row btn-bottom-space">
                <div class="w3-col m8 s12 w3-margin-bottom">
                  <a href="/blog" class=" form-spacing-top w3-button w3-padding-large w3-white w3-border btn btn-primary"><i class="fa fa-chevron-circle-left "></i> Back to Blog</a>
                </div>
                <div class="w3-col m4 w3-hide-small">
                  <p>
                  @foreach ($post->tags as $tag)
                    <span class="  form-spacing-top w3-tag w3-light-grey w3-small w3-margin-bottom">{{ $tag->name }}</span>
                  @endforeach
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
