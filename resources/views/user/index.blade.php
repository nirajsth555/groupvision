<!DOCTYPE html>
  <html>
    <head>
      <title>Vision Education Group</title>

      <link rel="icon" 
      type="image/png" 
      href="{{url('public/user/images/fav.png')}}">

      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{url('public/user/css/materialize.min.css')}}"  media="screen,projection"/>

      <link rel="stylesheet" href="{{url('public/user/font-aw/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{url('public/user/css/animate.css')}}">
      <link rel="stylesheet" href="{{url('public/user/css/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{url('public/user/css/owl-carousel-default.css')}}">

      <link rel="stylesheet" href="{{url('public/user/css/main.css')}}">
      <link rel="stylesheet" href="{{url('public/user/css/responsive.css')}}">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      
       
      <script type="text/javascript">
    // These variables are created here so that they can be used inside .js files
    var APP_URL = {!! json_encode(url('/')) !!}
    
  </script> 
  <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <!-- Dropdown Structure -->
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="business.html">Nepal Education Times</a></li>
        <li><a href="business.html">NUCAS</a></li>
        <li><a href="business.html">Center for Abroad Studies</a></li>
        <li><a href="business.html">Little Steps Pre-School</a></li>
        <li><a href="business.html">Nepal Careers Service</a></li>
        <li><a href="business.html">Vidhyalaya of Nepal</a></li>
      </ul>

      <ul id='dropdown2' class='dropdown-content'>
        @foreach($d['business'] as $b)
        <li><a href="{{url('our-business')}}/{{$b->id}}/{{$b->slug}}">{{$b->title}}</a></li>
        @endforeach
        
      </ul>

      <ul id='dropdown3' class='dropdown-content'>
        @foreach($d['whawedo'] as $b)
        <li><a href="{{url('what-we-do')}}/{{$b->id}}/{{$b->slug}}">{{$b->title}}</a></li>
        @endforeach
      </ul>

      <ul id='dropdown4' class='dropdown-content'>
        @foreach($d['wherewework'] as $b)
        <li><a href="{{url('where-we-work')}}/{{$b->id}}/{{$b->slug}}">{{$b->title}}</a></li>
        @endforeach
      </ul>

      <ul id='dropdown5' class='dropdown-content'>
        <li><a href="{{url('our-company')}}">Our Company</a></li>
        <li><a href="{{url('our-team')}}">Our Team</a></li>
        <li><a href="{{url('our-mission-and-value')}}">Our Mission & Values</a></li>
        <li><a href="{{url('our-story')}}">Our Story</a></li>
        <li><a href="{{url('partner')}}">Our Partners</a></li>
      </ul>

      <ul id='dropdown6' class='dropdown-content'>
        @foreach($d['services'] as $b)
        <li><a href="{{url('our-services')}}/{{$b->id}}/{{$b->slug}}">{{$b->service_title}}</a></li>
        @endforeach
      </ul>

      <!-- Nav-Bar -->
      <div class="nav-bar hide-on-med-and-down">
        <div class="container">
          <div class="row no-mb">
            <nav class="transparent z-depth-0">
              <div class="nav-wrapper">
                <a href="{{url('/')}}" class="brand-logo"><img src="{{url('public/user/images/logo-vision-9.svg')}}" alt="Logo" class="responsive-img"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                  <li><a href="{{url('research')}}">Research</a></li>
                  <li><a href="{{url('career')}}">Career</a></li>
                  <li><a href="{{url('books')}}">Bookshop</a></li>
                  <li><a href="{{url('blogs')}}">Blog</a></li>
                  <li class="search"><a href="#!" id="search-toggle"><img src="{{url('public/user/images/search-icon.png')}}" alt="Image" class="responsive-img"></a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>

      <div id="sticky" class="sticky-element">
        <div class="sticky-anchor"></div>
        <div class="nav-bar-main sticky-content">
          <div class="container no-padding">
            <div class="row no-mb">
              <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only">
                <span class="nav-ham"></span>
                <span class="nav-ham"></span>
                <span class="nav-ham"></span>
              </a>
              <a href="{{url('/')}}" class="hide-on-large-only mobile-logo"><img src="{{url('public/user/images/logo-vision-9.svg')}}" alt="Logo" class="responsive-img"></a>
              <ul class="hide-on-med-and-down">
                <li class="fixed-logo"><a href="{{url('/')}}"><img src="{{url('public/user/images/logo-vision-9.svg')}}" alt="Logo" class="responsive-img"></a></li>
                <li><a href="{{url('/')}}" class="">Home</a></li>
                <li class="n-d"></li>
                <li><a href="#!" class="dropdown-button5" data-activates="dropdown5">About Us <i class="fa fa-caret-down"></i></a></li>
                <li class="n-d"></li>
                <li><a href="#!" class="dropdown-button2" data-activates="dropdown2">Our Business <i class="fa fa-caret-down"></i></a></li>
                <li class="n-d"></li>
                <li><a href="#!" class="dropdown-button3" data-activates="dropdown3">What We Do <i class="fa fa-caret-down"></i></a></li>
                <li class="n-d"></li>
                <li><a href="#!" class="dropdown-button4" data-activates="dropdown4">Where We Work <i class="fa fa-caret-down"></i></a></li>
                <li class="n-d"></li>
                <li><a href="#!" class="dropdown-button6" data-activates="dropdown6">Our Services <i class="fa fa-caret-down"></i></a></li>
              </ul>

              <div class="search-div">
                <form action="" id="searchform">
                  <img src="{{url('public/user/images/search-icon.png')}}" alt="Search">
                  <input type="text" id="search" placeholder="type your search..." required>
                </form>
                <ul class="search-result-ul">
                  <li class="search-results"> </li>
                  <!-- Search results goes here -->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <ul id="slide-out" class="side-nav main-sn">
          <!-- <a href="index.html" class="logo-sn"><img src="images/logo-vision-9.svg" alt="Logo" class="responsive-img"></a> -->
          <div class="link-lists">
            <div class="one-list">
              <li><a href="{{url('/')}}">Home</a></li>
            </div>

            <div class="two-list">
              <li class="no-padding">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <a class="collapsible-header">About Us <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i></a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="{{url('our-company')}}" >Our Company</a></li>
                  <li><a href="{{url('our-team')}}">Our Team</a></li>
                  <li><a href="{{url('our-mission-and-value')}}" >Our Mission & Values</a></li>
                  <li><a href="{{url('our-story')}}">Our Story</a></li>
                  <li><a href="{{url('partner')}}">Our Partners</a></li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a class="collapsible-header">Our Business <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i></a>
                    <div class="collapsible-body">
                      <ul>
                        @foreach($d['business'] as $b)
                          <li><a href="{{url('our-business')}}/{{$b->id}}/{{$b->slug}}">{{$b->title}}</a></li>
                         @endforeach
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a class="collapsible-header">What We Do <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i></a>
                    <div class="collapsible-body">
                      <ul>
                        @foreach($d['whawedo'] as $b)
                        <li><a href="{{url('what-we-do')}}/{{$b->id}}/{{$b->slug}}">{{$b->title}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a class="collapsible-header">Where We Work <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i></a>
                    <div class="collapsible-body">
                      <ul>
                        @foreach($d['wherewework'] as $b)
                        <li><a href="{{url('where-we-work')}}/{{$b->id}}/{{$b->slug}}">{{$b->title}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a class="collapsible-header">Our Services <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i></a>
                    <div class="collapsible-body">
                      <ul>
                        @foreach($d['services'] as $b)
                        <li><a href="{{url('our-services')}}/{{$b->id}}/{{$b->slug}}">{{$b->service_title}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                </ul>
              </li>
            </div>
          </div>
          <form action="" class="search-sn">
            <input type="text" placeholder="type your search..." id="search" class="browser-default" required>
            <button type="submit"><img src="{{url('public/user/images/search-icon.png')}}" alt="Search" class="responsive-img"></button>
          </form>
          <ul class="search-result-ul">
                  <li class="search-results"> </li>
                  <!-- Search results goes here -->
                </ul>
        </ul>
      </div>

      <!-- Header -->
      <header class="my-header owl-carousel owl-theme">
        @foreach($slider as $s)
        <div class="item first-item">
          <img src="{{url($s->slider_image)}}" alt="Header Image" class="responsive-img hide-on-med-and-down">
          <div class="container">
            <div class="item-caption">
              <h3>{{$s->slider_title}}</h5>
              <p><?php echo($s->slider_short_info); ?></p>
              <a href="#!">Learn More</a>
            </div>
          </div>
        </div>
        @endforeach
        
        
        
      </header>

      <div class="header-text">
        <div class="container">
          <div class="row no-mb center-align">
            <h1>Helping students grow their careers, every day!</h1>
            <div class="col l4 m4 s12">
              <img src="{{url('public/user/images/our-partners2.png')}}" alt="Image" class="responsive-img">
              <h6 class="wow fadeInLeft" data-wow-delay="0.1s" data-wow-duration="2s">Our Partners</h6>
              <div class="counter wow fadeInLeft" data-wow-delay="0.1s" data-wow-duration="2s">
                <span class="counter-value" data-count="1200">0</span>
              </div>
            </div>

            <div class="col l4 m4 s12">
              <img src="{{url('public/user/images/membernationwide.png')}}" alt="Image" class="responsive-img">
              <h6 class="wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="2s">Members Nationwide</h6>
              <div class="counter wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="2s">
                <span class="counter-value" data-count="867">0</span>
              </div>
            </div>

            <div class="col l4 m4 s12">
              <img src="{{url('public/user/images/districts-reached.png')}}" alt="Image" class="responsive-img">
              <h6 class="wow fadeInLeft" data-wow-delay="0.9s" data-wow-duration="2s">Districts Reached</h6>
              <div class="counter wow fadeInLeft" data-wow-delay="0.9s" data-wow-duration="2s">
                <span class="counter-value" data-count="71">0</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Milestones -->
      <div class="miles">
        <div class="container">
          <div class="row no-mb">
            <h2 class="center-align">Marking Our Milestones</h2>
             @foreach($best as $cow)
            <div class="a-mile">
              <div class="col l5 m12 s12 wow fadeInLeft" data-wow-offset="200">
                <img src="{{url($cow->title_image)}}" alt="Image" class="responsive-img">
                <h4>{{$cow->slogan}}</h4>
                <p><?php echo(\Illuminate\Support\Str::words($cow->business_intro, 55,'....') );?></p>
                <a href="{{$cow->business_website}}">Visit Website <i class="fa fa-angle-right"></i></a>
              </div>
              <div class="col l7 m12 s12">
                <img src="{{url($cow->front_image)}}" alt="Image" class="responsive-img wow fadeInRight" data-wow-offset="200" data-wow-duration="0.8s" data-wow-delay="0.3s">
              </div>
            </div>
            @endforeach

           
            

           

            
           
          </div>
        </div>
      </div>

      <!-- News -->
      <div class="nevents">
        <div class="container">
          <div class="row no-mb">
            <h2 class="center-align">News & Events</h2>
            @foreach($n as $newss)

            <div class="col l4 m6 s12">
              <a href="{{url('single-news')}}/{{$newss->id}}/{{$newss->slug}}" class="nevents-img-container"><img src="{{url($newss->image)}}" alt="Image" class="responsive-img"></a>
              <a href="{{url('single-news')}}/{{$newss->id}}/{{$newss->slug}}"><p>{{$newss->title}}</p></a>
              <span>{{ Carbon\Carbon::parse($newss->created_at)->toFormattedDateString() }}</span>
            </div>
            @endforeach

            

            

            <div class="col s12 center-align">
              <a href="{{url('news')}}" class="more-btn">More News</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
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
                <li><a href="{{url('our-company')}}!">Our Company</a></li>
                <li><a href="{{url('news')}}">In the News</a></li>
                <li><a href="{{url('partner')}}">Partners</a></li>
                <li><a href="{{url('contact_us')}}">Contact</a></li>
                <li><a href="{{url('career')}}">Career</a></li>
              </ul>
            </div>

            <div class="afcol">
              <h5 class="f-title">Our Business</h5>
              <ul>
                @foreach($best as $business)
                <li><a href="{{url('our-business')}}/{{$business->id}}/{{$business->slug}}">{{$business->title}}</a></li>
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
      <script type="text/javascript" src="{{url('public/user/js/jquery-3.3.1.min.js')}}"></script>
      <script type="text/javascript" src="{{url('public/user/js/materialize.min.js')}}"></script>
      <script type="text/javascript" src="{{url('public/user/js/owl.carousel.min.js')}}"></script>
      <script type="text/javascript" src="{{url('public/user/js/wow.min.js')}}"></script>
      <script type="text/javascript" src="{{url('public/user/js/main.js')}}"></script>
      
      
      <script type="text/javascript" src="{{url('public/user/js/custom.js')}}"></script>
      
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-9lsQIRFgK8pYMzdNwsFAOQiqMjBSJsw&callback=initMap">
    </script>
    </body>
  </html>