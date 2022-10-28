@extends('layouts.app')

@section('content')



<section class="s-content s-content--narrow">
    <div class="row">
    <div class="col-full s-content__main">
    
        <h2 style="margin-top:-20px;" class="add-bottom">Add new post</h1><br>
        
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  
            
            <div>
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'full-width', 'placeholder' => '...'])}}
            </div>
        
            <div>
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['class' => 'full-width', 'placeholder' => '...'])}}
            </div>
        <br><hr>
            <div>  
                <h4>Choose a cover picture</h4>
                {{ Form::file('cover_image')}}
            </div><hr>
            {{Form::submit('Submit',['class' => 'btn btn--primary full-width'])}}
            {!!Form::close()!!}
        


       
    </div>
    </div>
    </section>

@include('components.alert')
@endsection