@extends('main')
@section('title', ' | View Post')
@section('content')
  <div class="w3-content" style="max-width:1400px">
    <div class='w3-row page-margin-top'>
    {{-- New --}}
      <div class="w3-col l8 s12">
      <!-- Blog entry -->
        <div class="w3-card-4 w3-margin w3-white post">

          @if ($post->image)
            <div>
             <img src="{{ asset('images/' . $post->image)}}" style='width:100%'/>
            </div>
          @endif
          <div class="singlepad">
          <div class="w3-container w3-padding-16">
            <h3 class='form-spacing-top'>{{ $post->title }}</h3>
            <h6 class='form-spacing-top'>{{ $post->category->name }}</h6>
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
    <!-- END BLOG ENTRIES -->
  </div>
</div>
  <div class="w3-col l4">
    <div class="well  w3-margin w3-white">
      <dl class="dl-horizontal">
        <label>Url:</label>
        <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
      </dl>

      <dl class="dl-horizontal">
        <label>Category:</label>
        <p>{{ $post->category->name}}</p>
      </dl>
        <dl class="dl-horizontal">
          <label>Created At:</label>
          <p>{{date('M j, Y h:ia', strtotime($post->created_at))}}</p>

        </dl>
        <dl class="dl-horizontal">
          <label>Last Updated</label>
          <p>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</p>

        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => "btn btn-primary btn-block"))!!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
              {!! Form::submit('Delete', ['class' => "btn btn-danger btn-block"]) !!}
            {!! Form::close() !!}
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <hr>
            {{ Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => "btn btn-default btn-block btn_h1_spacing"]) }}
          </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
