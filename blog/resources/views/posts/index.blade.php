@php
    use App\User;
@endphp


@extends('layouts.footer')
@extends('layouts.app')




@section('content')

        <div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">

                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url({{asset('/images/cod.png')}}">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Review</a></span>

                                <h1><a href="https://www.pcmag.com/reviews/call-of-duty-black-ops-4-for-pc" title="">Missed it? Now it is coming back for PC! </a></h1>

   
                            </div> <!-- end entry__content -->
                            
                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div class="featured__column featured__column--small">

                        <div class="entry" style="background-image:url({{asset('/images/1feed.jpg')}}">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Championship</a></span>

                                <h1><a href="https://www.eswc.com/page/about-eswc" title="">ESWC Pioneered Competition back again!</a></h1>

     
                            </div> <!-- end entry__content -->
                          
                        </div> <!-- end entry -->

                        <div class="entry" style="background-image:url({{asset('/images/fifa.png')}}">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">News</a></span>

                                <h1><a href="https://www.fifa.com/fifaeworldcup/" title="">Do not miss Fifa eWorld Cup 2020</a></h1>

            
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->
<hr>
    </section> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">

    
        <div style="display: flex;justify-content:center;">
            <div style="margin-right: 15px;">
            <svg style="color:black"class="bi bi-newspaper" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 2A1.5 1.5 0 011.5.5h11A1.5 1.5 0 0114 2v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 010 14V2zm1.5-.5A.5.5 0 001 2v12a.5.5 0 00.5.5h11a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5h-11z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M15.5 3a.5.5 0 01.5.5V14a1.5 1.5 0 01-1.5 1.5h-3v-1h3a.5.5 0 00.5-.5V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
            </svg></div> <p style="margin-top: 10px;color:black">All posts</p><br>
            </div><hr>

        @if(count($posts)>=1)
        <div class="row masonry-wrap">
            <div class="masonry">
                <div class="grid-sizer"></div><br>
                
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
                                <a href="/posts/{{$post->id}}">{{$post->created_at->diffForHumans()}}</a>  
                            </div>
                            <h1 class="entry__title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                            
                        </div>
                        <div class="entry__excerpt">
                      
                        <p>{{substr($post->body,0,150)}}... </p>
                        </div>
                            
                    <div class="entry__meta" style="margin-bottom: -60px;">
                       <a href=""> <p>By {{ User::find($post->author)->name }}</p></a><br>
                    </div>
            
                    </div>
    
                </article> <!-- end article -->
@endforeach
@else
<h1>No posts</h2>
<h4> Try adding a new post</h3>
@endif

                <article class="masonry__brick entry format-quote" data-aos="fade-up">
                        
                    <div class="entry__thumb">
                        <blockquote>
                                <p>there's a spider in my bathroom, it's her bathroom now</p>
    
                                <cite>Marcello 2020</cite>
                        </blockquote>
                    </div>   
    
                </article> <!-- end article -->

              
            
            
            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

    

    </section> <!-- s-content -->


 @endsection
