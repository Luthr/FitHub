@extends('_layout')

@section('title', " | $category->name Category")

@section('content')
  <div class="container page-margin-top">
  <div class="row page-margin-top">
		<div class="col-md-8">
			<h1>{{ $category->name }} Category <span class="label label-default">{{ $category->posts()->count() }} Posts</span></h1>
		</div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Tags</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($category->posts as $post)
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>@foreach ($post->tags as $tag)
                <span class="label label-default">{{ $tag->name }}</span>
              @endforeach
              </td>
            <td><a href="{{ route('posts.show', $post->id ) }}" class="btn btn-default btn-xs">View</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
