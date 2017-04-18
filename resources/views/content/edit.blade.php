@extends('main')
@section('title', ' | Content Update')
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
   tinymce.init({
     selector: "textarea",
     plugins: "link",
     menubar: false
     });
</script>
@endsection
@section('content')
<div class="container page-margin-top">
   <div class="row">
      <!-- Blog entries -->
      <div class="w3-col w3-margin">
         <h1>Update Your Homepage</h1>
         <h5>Text below will amend the relevent section within your Homepage <span class="w3-opacity">April 7, 2014</span></h5>
         <hr>
         {!! Form::model($content, ['route' => ['content.update', 1], 'method' => 'PUT', 'files'=>true]) !!}
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
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>About You</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
               {{ Form::textarea('about', null, array('class' => 'form-control'))}}
            </div>
         </div>
         <hr>
         <!-- Blog entry -->
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>About Your Website</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
               {{ Form::textarea('website', null, array('class' => 'form-control'))}}
            </div>
         </div>
         <hr>
         <!-- Blog entry -->
         <div class="w3-card-4 w3-white btn-bottom-space">
            <div class="w3-container w3-padding-large">
               <h3><b>Your Portfolio</b></h3>
            </div>
            <div class="w3-container w3-padding-large form-spacing-top">
               {{ Form::textarea('portfolio', null, array('class' => 'form-control'))}}
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
@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/trumbowyg.min.js') !!}
@endsection
