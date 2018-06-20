<footer>
        <div class="container">
          <div class="my-row no-mb">
            <div class="afcol">
              <img src="{{url('public/user/images/footer-logo.svg')}}" alt="Logo" class="responsive-img">
              <p class="footer-para">Vision education group is Nepal based private education company.
              Our mission is to be the leading independent provider of high-quality
              resources that empower generations of students to achieve their goals.</p>
            </div>

            <div class="afcol">
              <h5 class="f-title">Company</h5>
              <ul>
                <li><a href="{{url('our-company')}}">About Us</a></li>
                <li><a href="{{url('our-company')}}">Our Company</a></li>
                <li><a href="{{url('news')}}">In the News</a></li>
                <li><a href="{{url('partner')}}">Partners</a></li>
                <li><a href="{{url('contact_us')}}">Contact</a></li>
                <li><a href="{{url('career')}}">Career</a></li>
              </ul>
            </div>

            <div class="afcol">
              <h5 class="f-title">Our Business</h5>
              <ul>
                @foreach($d['business'] as $b)
                  <li><a href="{{url('our-business')}}/{{$b->id}}/{{$b->slug}}">{{$b->title}}</a></li>
                @endforeach
              </ul>
            </div>

            <div class="afcol">
              <h5 class="f-title">Resources</h5>
              <ul>
                <li><a href="{{url('videos')}}">Videos</a></li>
                <li><a href="{{url('events')}}">Webinar & Events</a></li>
                <li><a href="#!">Sitemap</a></li>
                <li><a href="{{url('case-studies')}}">Case Studies</a></li>
                <li><a href="{{url('blogs')}}">Blogs</a></li>
                <li><a href="{{url('news')}}">Newsroom</a></li>
              </ul>
            </div>

            <div class="afcol">
              <h5 class="f-title">Stay Connect With Us</h5>
              <ul class="f-social">
                <li>
                  <a href="#!"><i class="fa fa-facebook"></i></a>
                  <a href="#!" class="facebook-icon"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#!"><i class="fa fa-twitter"></i></a>
                  <a href="#!" class="twitter-icon"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#!"><i class="fa fa-youtube-play"></i></a>
                  <a href="#!" class="yt-icon"><i class="fa fa-youtube-play"></i></a>
                </li>
                <li>
                  <a href="#!"><i class="fa fa-instagram"></i></a>
                  <a href="#!" class="insta-icon"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                  <a href="#!"><i class="fa fa-linkedin"></i></a>
                  <a href="#!" class="ld-icon"><i class="fa fa-linkedin"></i></a>
                </li>
              </ul>
            </div>

          </div>
        </div>

        <div class="f-copy">
          <div class="container">
            <div class="row no-mb">
              <span class="cright">© Copyright 2015-2017 visioneducationgroup.com. All other trademarks and copyrights are the property of their respective owners. All rights reserved.</span>
            </div>
          </div>
        </div>
      </footer>

      <div class="gtop">
        <div class="go-top">
          <a href="#!" id="go-to-top" class="hide" title="Top">
            <img src="{{url('public/user/images/hover-top-b.png')}}" alt="Top" class="responsive-img not-h">
            <img src="{{url('public/user/images/hover-top-o.png')}}" alt="Top" class="responsive-img hide yes-h">
          </a>
        </div>
      </div>
      
      

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{url('public/user/js/jquery.min.js')}}"></script>
     
      
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="{{url('public/user/js/materialize.min.js')}}"></script>
      <script type="text/javascript" src="{{url('public/user/js/owl.carousel.min.js')}}"></script>
      <script type="text/javascript" src="{{url('public/user/js/wow.min.js')}}"></script>
      <script type="text/javascript" src="{{url('public/user/js/main.js')}}"></script>

      
      
      <script type="text/javascript" src="{{url('public/user/js/custom.js')}}"></script>
      <div id="fb-root"></div>


      
      <script>

      function initMap() {
        var vplace = {lat: 27.6878955, lng: 85.3333438};
        var map = new google.maps.Map(document.getElementById('mapVision'), {
          zoom: 17,
          center: vplace
        });
        var marker = new google.maps.Marker({
          position: vplace,
          map: map
        });
      }
    </script>
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=214568886006146&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-9lsQIRFgK8pYMzdNwsFAOQiqMjBSJsw&callback=initMap">
    </script>
    </body>
  </html>