@extends('_layout')

@section('title', ' | Create New Post')


@section('content')
  <div class="container page-margin-top">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>
      {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' =>'', 'files' => true  )) !!}
      {{ Form::label('title', 'Title:')}}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}


        {{ Form::label('category', "Category:")}}
        <select class="form-control" name="category_id">
          @foreach ($categories as $category)
            <option value='{{ $category->id }}'>{{ $category->name }}</option>
          @endforeach
        </select>

        {{ Form::label('tags', "Tags:")}}
        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
          @foreach ($tags as $tag)
            <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
          @endforeach
        </select>

        {{ Form::label('selected_image', "Upload Selected Image:")}}
        {{ Form::file("selected_image")}}
        <hr>

        {{ Form::label('body', "Post Body:")}}
        {{ Form::textarea('body', null, array('class' => 'form-control editor', 'required' => '', 'maxlength' => '255'))}}

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}
      {!! Form::close() !!}
      <br>
      <br>
      </div>
    </div>
  </div>
@endsection