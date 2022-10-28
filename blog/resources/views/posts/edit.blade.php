@extends('layouts.app')

@section('content')


<section class="s-content s-content--narrow">
    <div class="row">
    <div class="col-full s-content__main">
    
        <h2 style="margin-top:-20px;" class="add-bottom">Edit your Post</h1><br>
        
         {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data' , 'onsubmit' => 'return confirm("Are you sure you want to update this post?")']) !!}
         
            
            <div>
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'full-width', 'placeholder' => 'Title'])}}
            </div>
        
            <div>
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['class' => 'full-width', 'placeholder' => 'Body'])}}
            </div>
        <br><br>
            <div>  
                {{Form::label('cover_image','Choose a new picture')}}
                <img style="width: 50%;margin-left:20%" src="{{asset('/images/cover/'.$post->cover_image)}}"><br> 
                {{ Form::file('cover_image',['class' => 'ful-width']) }}
          </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn--primary full-width'])}}
            {!!Form::close()!!}
        


       
    </div>
    </div>
    </section>
@include('components.alert')
@endsection