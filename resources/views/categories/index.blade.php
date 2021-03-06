@extends('_layout')

@section('title', ' | All Categories')

@section('content')
<div class="container page-margin-top">
  <div class="row">
    <div class="col-md-8">
      <h1>All Categories</h1>
      <table class='table form-spacing-top'>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <th> {{  $category->id }} </th>
              <td> <a href='{{route('category.show', $category->id)}}'>{{  $category->name }} </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div> <!-- end of col_8 -->
    <div class="col-md-3">
      <div class='well' style='color:black'>
        {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
          <h2>New Category</h2>
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
          {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>


@endsection
