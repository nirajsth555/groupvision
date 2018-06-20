@include('user.header')

      <div class="nevents">
        <div class="container">
          <div class="row no-mb">
            @foreach($result as $r)

            <div class="col l4 m6 s12">
              <a href="{{url('single-news')}}/{{$r->id}}/{{$r->slug}}" class="nevents-img-container"><img src="{{url($r->image)}}" alt="Image" class="responsive-img"></a>
              <a href="{{url('single-news')}}/{{$r->id}}/{{$r->slug}}"><p>{{$r->title}}</p></a>
              <span>{{ Carbon\Carbon::parse($r->created_at)->format('Y-m-d') }}</span>
            </div>
            @endforeach

            
          </div>
        </div>
      </div>

      <main class="career-main news-main">
        <div class="container">
          <div class="row no-mb">
            <div class="news-block">
              <div class="nb-title">
                <h4>Vision News</h4>
                <span class="right">
                  <a href="{{url('news/vision-news')}}">View All</a>
                  <!-- <a href="#!">2017</a><i class="fa fa-angle-right"></i>
                  <a href="#!">2018</a><i class="fa fa-angle-right"></i>
                  <a href="#!">2019</a> -->
                </span>
              </div>
              <div class="news-collection">
                @foreach($vision as $news)
                <div class="a-news">
                  <a href="{{url('single-news')}}/{{$news->id}}/{{$news->slug}}"><img src="{{url($news->image)}}" alt="Image" class="responsive-img"></a>
                  <div class="right-side">
                    <a href="{{url('single-news')}}/{{$news->id}}/{{$news->slug}}"><h5>{{$news->title}}</h5></a>
                    <span class="date">{{ Carbon\Carbon::parse($news->created_at)->format('Y-m-d') }}</span>
                    <p>{!! str_limit(strip_tags($news->fullnews), $limit = 300, $end = '...') !!} .</p>
                    <a href="{{url('single-news')}}/{{$news->id}}/{{$news->slug}}" class="rmore-btn">Read More</a>
                  </div>
                </div>
                @endforeach
               
                
              </div>
            </div>
            <div class="news-block">
              <div class="nb-title">
                <h4>Press Releases</h4>
                <span class="right">
                  <a href="{{url('news/press-release')}}">View All</a>
                </span>
              </div>
              <div class="news-collection">
                @foreach($press as $p)
                <div class="a-news">
                  <a href="{{url('single-news')}}/{{$p->id}}/{{$p->slug}}"><img src="{{url($p->image)}}" alt="Image" class="responsive-img"></a>
                  <div class="right-side">
                    <a href="{{url('single-news')}}/{{$p->id}}/{{$p->slug}}"><h5>{{$p->title}}</h5></a>
                    <span class="date">{{ Carbon\Carbon::parse($p->created_at)->format('Y-m-d') }}</span>
                    <p>{!! str_limit(strip_tags($p->fullnews), $limit = 300, $end = '...') !!}</p>
                    <a href="{{url('single-news')}}/{{$p->id}}/{{$p->slug}}" class="rmore-btn">Read More</a>
                  </div>
                </div>
                @endforeach
               
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
@include('user.footer')