     @include('frontend.includes.navbar')


    <!-- Site header -->
    <header class="page-header bg-img size-lg" style="background-image: url(/img/frontend/bg-banner2.jpg)">
      <div class="container no-shadow">
        <h1 class="text-center">Blog</h1>
        <p class="lead text-center">Pratite novosti u stomatologiji</p>
      </div>
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main class="container blog-page">

      <div class="row">

        <div class="col-md-8 col-lg-9">


        @foreach($entries as $entry)
          <article class="post">
            <div class="post-media">
              <a href="{{ URL::route('showBlog', array('permalink' => $entry->permalink)) }}">
              {{ HTML::image(URL::to('/') . '/uploads/frontend/blog/thumbs/' . $entry->image, $entry->title) }}</a>
            </div>

            <header>
              <h2><a href="{{ URL::route('showBlog', array('permalink' => $entry->permalink)) }}">{{ $entry->title }}</a></h2>
              <time datetime="2016-04-04 20:00">{{ date('d. m. Y', strtotime($entry->created_at)) }}</time>
            </header>

            <div class="blog-content">
              <p class="text-justify">{{ $entry->intro }}</p>
            </div>

            <p class="read-more">
              <a class="btn btn-primary btn-outline" href="{{ URL::route('showBlog', array('permalink' => $entry->permalink)) }}">Nastavite čitati</a>
            </p>
          </article>
          @endforeach

       
          <nav>
            <ul class="pager">
             {{ $entries->links() }}
            </ul>
          </nav>

        </div>
        
    <div class="col-md-4 col-lg-3">
 

          <div class="widget">
            <h6 class="widget-title">Zadnje objave</h6>
            <ul class="widget-body media-list">
             @foreach($latest as $entry)
              <li>
                <div class="thumb"><a href="{{ URL::route('showBlog', array('permalink' => $entry->permalink)) }}"><img src="/uploads/frontend/blog/thumbs/{{ $entry->image }}" alt="..."></a></div>
                <div class="content">
                  <h5><a href="{{ URL::route('showBlog', array('permalink' => $entry->permalink)) }}">{{ $entry->title }}</a></h5>
                  <time datetime="2016-04-04 20:00">{{ date('d, m, Y', strtotime($entry->created_at)) }}</time>
                </div>
              </li>
              @endforeach
            </ul>
          </div>

 

        </div>  

      </div>

    </main>
    <!-- END Main container -->



     @include('frontend.includes.footer')