homescd @extends('main')

@section('title', ' | All Tags')

@section('content')
  <div class="container page-margin-top">
  <div class="row page-margin-top">
    <div class="col-md-8">
      <h1>Tags</h1>
      <table class="table">
        <thead>
          <th>#</th>
          <th>Title</th>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <th> {{  $tag->id }} </th>
              <td> <a href='{{route('tags.show', $tag->id)}}'>{{  $tag->name }} </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div> <!-- end of col_8 -->
    <div class="col-md-3">
      <div class='well'>
        {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
          <h2>New Tag</h2>
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
          {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>


@endsection
