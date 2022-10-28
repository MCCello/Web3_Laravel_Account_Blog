@php
    use App\User;
    use App\Post;
@endphp
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
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
    <script src="{{asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/pace.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3>Popular Posts</h3>

               
                <div class="block-1-2 block-m-full popular__posts">
                  
                  @php $posts = Post::popular(); 
                       $count = 0; 
                @endphp

                @foreach($posts as $post) 
                @php if($count>3) break; @endphp

                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="{{asset('/images/cover/'.$post->cover_image)}}" alt="">
                    </a>
                    <h5><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                    <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">{{(User::find($post->author))->name}}</a></span>
                        <span class="popular__date"><span>on</span> <time datetime="">{{$post->created_at}}</time></span>
                    </section>
                </article>
                @php $count = $count+1; @endphp
                 @endforeach

                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
                <h3>About SkillBook</h3>

                <p>
                SkillBook is an online community guided towards bringing gamers from all around the world together. No matter what type of gamer you are, be it professional, or useless (I mean casual), we strive to connect you with like minded individuals in order to upstart your gaming career.
 In SkillBook you can interact with many people through our posts and comment features. Adding friends coming soon. </p>

                <ul class="about__social">
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
            </div> <!-- end about -->

        </div> <!-- end row -->



    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4>Quick Links</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="/">Home</a></li>
                        <li><a href="/posts">Blog</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="https://www.rocketlawyer.com/sem/online-privacy-policy.rl?id=1646&partnerid=103&cid=1795580607&adgid=72188618352&loc_int=9054497&loc_phys=20554&mt=b&ntwk=g&dv=c&adid=349034984050&kw=%2Bwebsite%20%2Bprivacy%20%2Bpolicy&adpos=&plc=&trgt=&trgtid=kwd-30630455532&gclid=CjwKCAjwt-L2BRA_EiwAacX32U2EIt1OgH-LuOyFvGGy8ZLmmds-oZBeZfc2iSlTnRKNvFXrJ69KPRoCEn0QAvD_BwE#/">Privacy Policy</a></li>
                    </ul>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__social">
                        
                    <h4>Social</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="https://www.facebook.com">Facebook</a></li>
                        <li><a href="https://www.instagram.com">Instagram</a></li>
                        <li><a href="https://www.twitter.com">Twitter</a></li>
                        <li><a href="https://www.pinterest.com">Pinterest</a></li>
                        <li><a href="https://www.linkedin.com">LinkedIn</a></li>
                    </ul>

                </div> <!-- end s-footer__social -->

                <div class="col-five md-full end s-footer__subscribe">
                        
                    <h4>Our Newsletter</h4>

                    <p>Feel free to subscribe to our weekly news!
                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <span>© Copyright SkillBook</span> 
                      </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->



    </footer> <!-- end s-footer -->

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


</body>

</html>