@extends('layouts.footer')
@extends('layouts.app')

@section('content')

<section class="s-content s-content--narrow">

<div class="row">
<div class="s-content__header col-full">
      <h1 class="s-content__header-title">
          Connect worldwide with the ePower of video games.
      </h1>
  </div> <!-- end s-content__header -->

<div class="s-content__media col-full" style="margin-bottom: 2em">
      <div class="s-content__post-thumb">
          <img src="{{asset('/images/homeback.jpg')}}">
        </div>
</div>

</div>
</section>

<section id="styles" class="s-styles">
    
  <div class="row narrow section-intro add-bottom text-center">

      <div class="col-twelve tab-full">

          <h1>About SkillBook</h1>

          <p class="lead">SkillBook is an online community guided towards bringing gamers from all around the world together. No matter what type of gamer you are, be it professional, or useless (I mean casual), we strive to connect you with like minded individuals in order to upstart your gaming career. In SkillBook you can interact with many people through our posts and comment features. Adding friends coming soon.</p>

      </div>

  </div>


  <div class="row">

      <div class="col-six tab-full">

          <h3>Washington Post calls SkillBook "the future!"</h3>

          <aside class="pull-quote">
              <blockquote>
              <p>It's impressive how much these students have progressed, from focusing too much on design in Web1 to focusing a LOT more on design in Web3!
              Regardless really amazing website def. the best I have seen so far - probably </p>
              <cite>
              <a>Mr. Lara Rojas, John J.G - the mind of a generation</a>
            </cite>
              </blockquote>
          </aside>
          
      </div>

      <div class="col-six tab-full">

          <h3>I have never wasted so much time on a website before - A guy who wasted a lot more time on videogames!</h3>

          <blockquote cite="http://where-i-got-my-info-from.com">
          <p>Your work is going to fill a large part of your life, and the only way to be truly satisfied is
          to do what you believe is great work. And the only way to do great work is to love what you do.
          If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.
          </p>
          <cite>
              <a>Steve Trabajos</a>
          </cite>
          </blockquote>
          
          

          <blockquote>
          <p>Good design is as little design as possible.</p>
          <cite>
          <a>If only we listened</a>
          </cite>
          </blockquote>

      </div>


  </div> <!-- end row -->
</section>


@endsection
