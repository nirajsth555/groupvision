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
  <script type="text/javascript"> (function e(){var e=document.createElement("script");e.type="text/javascript",e.async=!0, e.src="//staticw2.yotpo.com/c8etE7njfzCFlAMkEIuWQ1IWOW8fFeXmO7UvfJ3e/widget.js";var t=document.getElementsByTagName("script")[0]; t.parentNode.insertBefore(e,t)})(); </script>
      
      
       
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
                <li class="fixed-logo"><a href="index.html"><img src="{{url('public/user/images/logo-vision-9.svg')}}" alt="Logo" class="responsive-img"></a></li>
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
                <form action="">
                  <img src="{{url('public/user/images/search-icon.png')}}" alt="Search">
                  <input type="text" placeholder="type your search..." id="search" required>
                  <ul class="search-result-ul">
                  <li class="search-results"> </li>
                  <!-- Search results goes here -->
                </ul>
                </form>
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
            <input type="text" placeholder="type your search..." class="browser-default" required>
            <button type="submit"><img src="{{url('public/user/images/search-icon.png')}}" alt="Search" class="responsive-img"></button>
          </form>
          <ul class="search-result-ul">
                  <li class="search-results"> </li>
                  <!-- Search results goes here -->
                </ul>
        </ul>
      </div>