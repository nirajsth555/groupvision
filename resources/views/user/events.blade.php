@include('user.header')

      <header class="career-header events-header">
        <div class="container">
          <div class="row no-mb">
            <h2>Events & Webinar</h2>
            <p>A great place to work is the product of the great<br>
            people who work there. Are you interested in joining us?</p>
          </div>
        </div>
      </header>

      <main class="career-main news-main events-main">
        <div class="container">
          <div class="row no-mb">
            <div class="news-block">
              <div class="nb-title">
                <h4>Events</h4>
                <span class="right">
                  
                  <!-- <a href="#!">2017</a><i class="fa fa-angle-right"></i>
                  <a href="#!">2018</a><i class="fa fa-angle-right"></i>
                  <a href="#!">2019</a> -->
                </span>
              </div>
              <div class="news-collection">
              @foreach($result as $r)
                <div class="a-news">
                  <a href="{{url('single-event')}}/{{$r->id}}"><img src="{{url($r->event_image)}}" alt="Image" class="responsive-img"></a>
                  <div class="right-side">
                    <a href="{{url('single-event')}}/{{$r->id}}"><h5>{{$r->event_title}}</h5></a>
                    <p>{!! str_limit(strip_tags(htmlspecialchars_decode($r->event_description)),$limit=500, $end='...') !!}</p>
                    <div class="event-date"><img src="{{url('public/user/images/calendar-icon.png')}}" alt="Date" class="responsive-img"> <span>{{$r->event_date_from}} - {{$r->event_date_to}}</span></div>
                    <div class="event-location"><img src="{{url('public/user/images/location-icon.png')}}" alt="Location" class="responsive-img"> {{$r->event_venue}}{{$r->event_address}}</div>
                    <a href="blog-inner.html" class="rmore-btn">Read More</a>
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