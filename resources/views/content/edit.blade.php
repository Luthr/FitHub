@extends('_layout')

@section('title', ' | Content Update')

@section('content')
<div class="container page-margin-top">
   <div class="row">
      <!-- Blog entries -->
      <div class="w3-col w3-margin">
         <h1>Update Your Homepage</h1>
         <h5>Text below will amend the relevent section within your Homepage</h5>
         <hr>
         @if (isset($content) && $content->exists())

            {!! Form::model($content, ['route' => ['content.update', $content->id], 'method' => 'PUT', 'files'=>true]) !!}
         @else
            {!! Form::open(['route' => ['content.store'], 'method' => 'POST', 'files'=>true]) !!}

         @endif
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>Your Personal Photo</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
              <div class=" w3-center w3-padding-large">
                <img src="{{ asset('images/' . $content->image)}}" class="w3-image" alt="Photo of Me" width="500" height="333">
              </div>
              <hr>
              <div  class=" w3-center w3-padding-large">
              {{ Form::file("image")}}
            </div>
            </div>
         </div>
         <hr>
         <!-- About entry -->
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>About You</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
               {{ Form::textarea('about', null, array('class' => 'form-control editor'))}}
            </div>
         </div>
         <hr>
         <!-- Website info entry -->
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>About Your Website</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
               {{ Form::textarea('website', null, array('class' => 'form-control editor'))}}
            </div>
         </div>
         <hr>
         <!-- Portfolio entry -->
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>Your Portfolio</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
               {{ Form::textarea('portfolio', null, array('class' => 'form-control editor'))}}
            </div>
         </div>
         <hr>
         <!-- Booking entry -->
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>Your Booking Information</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
               {{ Form::textarea('booking', null, array('class' => 'form-control editor'))}}
            </div>
         </div>
         <hr>
         <div class="row">
           <div>
             {!! Html::linkRoute('pages.welcome', 'Cancel', array('class' => "btn btn-danger btn-block"))!!}
           </div>
           <div>
             {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
           </div>
         </div>
             {!! Form::close() !!}
         <!-- END BLOG ENTRIES -->
      </div>
   </div>
</div>
@endsection