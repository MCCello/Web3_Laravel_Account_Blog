@php 
use App\User;
@endphp
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Skillbook</title>
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->

    <link rel="stylesheet" href="{{public_path('css/vendor.css')}}">
    <link rel="stylesheet" href="{{public_path('css/main.css')}}">
    <link rel="stylesheet" href="{{public_path('css/vendor.css')}}">
    
  </head>
<body>
    <section class="s-styles">
  
        
            <h1 class="s-content__header-title">
              {{$post->title}}
            </h1>
            <ul class="s-content__header-meta">
                <li class="date"> Created at: {{$post->created_at}}</li>
            </ul>
      

      
            <div class="s-content__post-thumb" >
                <img src="{{public_path('/images/cover/'.$post->cover_image)}}" style="max-height: 400px"  >
            </div>
      


        <div class="col-full s-content__main">
            <p class="lead">{{$post->body}}</p>
<hr>
 
                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a href="#0">By {{(User::find($post->author))->name}}</a>
                    </h4>
                
                    <p>Here should be displayed the public and available information of the author of this post!
                    </p>

           
                </div>
            </div><br>
        </div>
    

    </section>
</body>
</html>