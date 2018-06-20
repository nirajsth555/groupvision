@include('user.header')

      <header class="main-video">
        <div class="container">
          <div class="row">
            <div class="video-part">
              <h4>{{$result->video_title}}</h4>
              <div class="video-container">
                <?php echo($result->video_link); ?>
              </div>
              <div class="social-icons">
                <div class="left-social">
                  <a href="#!" class="facebook-icon"><i class="fa fa-facebook"></i></a>
                  <a href="#!" class="twitter-icon"><i class="fa fa-google"></i></a>
                  <a href="#!" class="gp-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#!" class="insta-icon"><i class="fa fa-instagram"></i></a>
                </div>
                <div class="right-views">
                  <span>{{$result->views}} Views</span>
                </div>
              </div>
              <div class="desc">
                <h5 class="v-h5">Description :</h5>
                <p><?php echo($result->video_description); ?></p>
              </div>
            </div>
          </div>
        </div>
      </header>

      <main class="related-videos">
        <div class="container">
          <div class="row">
            <h5 class="v-h5">Related Videos</h5>
            <div class="act-videos">
              @foreach($n as $next)
              <div class="a-video">
                <a href="{{url('single-video')}}/{{$next->id}}/{{$next->slug}}" class="vc">
                  <img src="{{url($next->video_image)}}" alt="Video Name" class="responsive-img">
                  <span class="time">{{$next->video_runtime}}</span>
                </a>
                <div class="bottom-part">
                  <a href="{{url('single-video')}}/{{$next->id}}/{{$next->slug}}"><h6>{{$next->video_title}}</h6></a>
                  <span class="views">{{$next->views}} Views</span>
                  <p>{!! \Illuminate\Support\Str::words($next->video_description, 30,'....')  !!}.</p>
                </div>
              </div>
              @endforeach
              
              
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
  @include('user.footer')