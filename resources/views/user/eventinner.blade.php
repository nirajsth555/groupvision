@include('user.header')

      <header class="career-header binner-header" style="background-image: url('../public/user/images/blog-bg.jpg')">
        <div class="container">
          <div class="row no-mb">
            <h2>Vision Blog</h2><!-- 
            <p>How La Cité College is Improving Student Retention with Learning Analytics</p> -->
          </div>
        </div>
      </header>

      <main class="career-main">
        <div class="container small-container">
          <div class="row no-mb">
            <div class="blog-inner">
              <!-- <h6 class="small-title">Blogs</h6> -->
              <h1 class="main-title">{{$result->event_title}}</h1>
              
              <!-- <h2 class="subtitle">See how gathering data right in the classroom can be used to do.</h2> -->
              <div class="main-post">
                <div class="left-part">
                  <!-- <img src="images/author-1.png" alt="Author" class="responsive-img">
                  <h6 class="author-name">Amit Thakuri</h6> -->
                  <div class="share-icons">
                    <a href="#!" class="facebook-icon"><i class="fa fa-facebook"></i> Share</a>
                    <a href="#!" class="twitter-icon"><i class="fa fa-twitter"></i> Tweet</a>
                    <a href="#!" class="google-icon"><i class="fa fa-google"></i> Share</a>
                    <a href="#!" class="linkedin-icon"><i class="fa fa-linkedin"></i> Share</a>
                    <a href="#!" class="at-icon"><i class="fa fa-envelope"></i> Email</a>
                  </div>
                </div>
                <div class="right-part">
                  <div class="act-text">
                    <img src="{{url($result->event_image)}}" alt="Image" class="responsive-img">
                    <h6>Event Date: {{Carbon\Carbon::parse($result->event_date_from)->format('M d ,Y')}} - {{ Carbon\Carbon::parse($result->event_date_to)->format('M d ,Y')}}<br></h6>
                    Address : {{$result->event_venue}}{{$result->event_address}}

                   
                    <p>{{strip_tags(htmlspecialchars_decode($result->event_description))}}</p>

                  </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
  @include('user.footer')