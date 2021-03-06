@extends('_layout')

@section('title', ' | All Posts')

@section('content')
  <div class="container page-margin-top">
  <div class="row">
    <div class="col-md-10">
      <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
      <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-10">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created At</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
              <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
                <td><a href="{{ route('posts.show', $post->slug) }}" class='btn btn-sm btn-default'>View</a>
                  <a href='{{ route('posts.edit', $post->slug) }}' class='btn btn-sm btn-default'>Edit</a></td>
              </tr>
          @endforeach
        </tbody>

      </table>
      <div class="text-center">
        {!! $posts->links() !!}
      </div>

    </div>
  </div>
  </div>
@endsection
