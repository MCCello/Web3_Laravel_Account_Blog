@extends('layouts.footer')
@extends('layouts.app')
@php
use Carbon\Carbon;
use App\User;
@endphp

@section('content')

<section class="s-content">
 <div style="display: flex;justify-content:center;">
        <div style="margin-right: 15px;color:black">
        <svg class="bi bi-newspaper" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M0 2A1.5 1.5 0 011.5.5h11A1.5 1.5 0 0114 2v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 010 14V2zm1.5-.5A.5.5 0 001 2v12a.5.5 0 00.5.5h11a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5h-11z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M15.5 3a.5.5 0 01.5.5V14a1.5 1.5 0 01-1.5 1.5h-3v-1h3a.5.5 0 00.5-.5V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
        </svg></div> <p style="margin-top: 10px;color:black">My posts</p>
        </div><br>
  
@if(Auth::user())
    <div style="display: flex;justify-content:center;">
    <a href="/posts/create"><button style="width: 350px;" class="btn full-width btn--primary">
        Add Post <svg style="margin-bottom:-7px;" class="bi bi-file-earmark-plus" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h5v-1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5v2.5A1.5 1.5 0 0 0 10.5 6H13v2h1V6L9 1z"/>
            <path fill-rule="evenodd" d="M13.5 10a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
            <path fill-rule="evenodd" d="M13 12.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
          </svg>
    </button></a>
    
    </div>
@endif

    @if(count($posts)>=1)
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>

@foreach($posts as $post)
            <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    
                <div class="entry__thumb">
                    <a href="/posts/{{$post->id}}" class="entry__thumb-link">
                        <img src="{{asset('/images/cover/'.$post->cover_image)}}" width='100%;'  />       
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">
                        
                        <div class="entry__date">
                            <a href="single-standard.html">{{ Carbon::parse($post->created_at)->diffForHumans()}}</a>  
                        </div>
                        <h1 class="entry__title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                        
                    </div>
                    <div class="entry__excerpt">
                        <p>
                            {{substr($post->body,0,150)}}...
                              </p>
                    </div>
                  
                    <div class="entry__meta">
                        <a href="">By {{ User::find($post->author)->name }}</a><br>
                    </div>
                </div>

            </article> <!-- end article -->
@endforeach
@else
<h1>No posts</h2>
<h4> Try adding a new post</h3>
@endif
@endsection


