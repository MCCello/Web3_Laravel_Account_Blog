@extends('layouts.footer')
@extends('layouts.app')
@php
    use App\User;
    use App\Comment;
@endphp

@section('content')

<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
              {{$post->title}}
            </h1>
            <ul class="s-content__header-meta">
                <li class="date"> {{$post->created_at->diffForHumans()}}</li>
           
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full" style="display:flex;justify-content:center">
            <div class="s-content__post-thumb" >

                <a style="float:right" class="btn btn--primary" href="{{action('PostsController@downloadPDF',$post->id)}}">
                    Export to PDF  </a>

                <img src="{{asset('/images/cover/'.$post->cover_image)}}"  sizes="(max-width: 2000px) 100vw, 2000px" alt=""  >
            </div>
        </div>
        <div class="col-full s-content__main">
            <p class="lead">{{$post->body}}</p>
<hr>
            <div>
                <a style="float:right" href="/posts" class="btn btn--default"> Back</a>
                @can('update', $post)
                     <a style="float:left" class="btn btn--primary" href="/posts/{{$post->id}}/edit">
                        Edit  <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                          </svg> </a>
                @endcan

                    @can('delete', $post)
                            {!! Form::open(['action' => ['PostsController@destroy', $post->id],'method'=>'POST', 'class'=>'pull-left','onsubmit'=>'return confirm("Are you sure you want to delete this Post?")']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class'=>'btn btn--primary full-width'])}}
                            {!! Form::close() !!}

                    @endcan
            </div>
        </div> <!-- end s-content__main -->
    </article>

    <!-- comments
    ================================================== -->
    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">

                <h3 class="h2">Comments:</h3>

                <!-- commentlist -->
                <ol class="commentlist">
        @foreach($comments as $comment)
        @if(count($comments)>0)
            @if($post->id == $comment->post_id)
                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img width="50" height="50" class="avatar" src="/images/avatars/{{User::find($comment->author)->avatar}}" alt="">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <cite> {{User::find($comment->author)->name}}</cite>

                                <div class="comment__meta">
                                    <time class="comment__time">{{User::find($comment->author)->created_at->diffForHumans()}}</time>

                                </div>
                            </div>

                            <div class="comment__text">
                            <p>{{$comment->message}}</p>   </div>
                            <hr>

                        </div>

                    </li> <!-- end comment level 1 -->
                    @endif
                    @endif
        @endforeach
                    


                </ol> <!-- end commentlist -->

           
       @if(Auth::user())
                <div class="respond">

                    <h3 class="h2">Add Comment</h3>
                    <form action="/commentss" method="post" enctype="multipart/form-data">
                        @csrf
                         <textarea name="message" class="full-width" placeholder="Wonderfull post......"></textarea>
                         <input type="submit" class="btn btn--primary full-width" value="Comment" />
                         <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </form>
               
                </div>
        @endif
        </div> <!-- end row comments -->
    </div> <!-- end comments-wrap -->
    </div>
    <div class="s-content__author">
                <img src="{{asset('/images/avatars/'.User::find($post->author)->avatar )}}" alt="">

                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a href="#0">By {{(User::find($post->author))->name}}</a>
                    </h4>
                
                    <p>Here should be displayed the public and available information of the author of this post!
                    </p>

                    <ul class="s-content__author-social">
                       <li><a href="#0">Facebook</a></li>
                       <li><a href="#0">Twitter</a></li>
                       <li><a href="#0">GooglePlus</a></li>
                       <li><a href="#0">Instagram</a></li>
                    </ul>
                </div>
            </div><br>

</section> <!-- s-content -->




 @endsection

