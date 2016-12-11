     @include('frontend.includes.navbar')

    <!-- Site header -->
    <header class="page-header bg-img size-xl overlay-light" style="background-image: url(/img/frontend/blog-2.jpg)">
      <div class="container no-shadow">
        <h1 class="text-center">{{ $entry->title }}</h1>
        <p class="lead text-center"><time datetime="2016-03-28 20:00">{{ date('d. m. Y', strtotime($entry->created_at)) }}</time></p>
      </div>
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main class="container blog-page">

      <div class="row">
        <div class="col-md-8 col-lg-9">

          <article class="post">

            <div class="blog-content">
            
              {{ $entry->content }}
              
            </div>

            
          </article>

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
                  <time datetime="2016-04-04 20:00">{{ date('d. m. Y', strtotime($entry->created_at)) }}</time>
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

