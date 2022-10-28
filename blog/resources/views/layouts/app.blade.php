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
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
    



    <!-- script
    ================================================== -->
    <script src="{{asset('js/modernizr.js')}}"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <script src="{{asset('https://maps.googleapis.com/maps/api/js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

   
    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="/">
                        <img src="/images/logo2.png" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->
             

                <ul class="header__social">
                    <li>
                        <a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.pinterest.com"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

             <!--   <a class="header__search-trigger" href="#0"></a> -->

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                    <ul class="header__nav">
                        <li><a href="/" title="Home">Home</a></li>
                        <li><a href="/posts">News Feed</a></li>
                        <li><a href="/contact" title="Contact">Contact</a></li>
                        @can('export')
                        <li><a href="/excel_export">Export</a></li>
                        @endcan
         @guest

                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    
                    @else
                  
                        <li class="has-children">
                            <a>
                                @if(Auth::user()->avatar)  
                                 <img src="{{asset('/images/avatars/'.Auth::user()->avatar)}}" width='50px;' height='40px;' style="max-height:50px;border-radius:10px;margin-bottom:-20px;" />
                                @endif
                               {{ Auth::user()->name }} 
                                <span class="caret"></span>
                            </a>
                            <ul class="sub-menu">
                            <li><a href="/profile">Profile</a></li> 
                            <li><a href="/posts/create">Add Post</a></li>
                            <li><a href="/myposts">My posts</a></li>
        
                           
                            <li> <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
                            </li>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
   
                            </ul>
                        </li>


            @endguest
                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->

    </div> <!-- end s-pageheader -->

   
    <!-- s-content
    ================================================== -->



    <!--MAAAAIN ----- MAIN    ---- MAIN
    ================================================== -->
    <main>
        @include('components.messages')

        @yield('content')
    </main>



    
    <!-- Java Script
    ================================================== -->
 
</body>

</html>