@include('user.header')

      <header class="career-header research-header videos-header" style="background-image: url('public/user/images/video-bg.png');">
        <div class="container">
          <div class="row no-mb">
            <a href="#"><h2>Watch Video <img src="{{url('public/user/images/play-button.png')}}" alt="Play" class="responsive-img"></h2></a>
            <p>A great place to work is the product of the great<br>
            people who work there. Are you interested in joining us?</p>
          </div>
        </div>
      </header>

      <main class="career-main bookshop-main research-main videos-main">
        <div class="container">
          <div class="row no-mb">
            <div class="bookshop-title">
              <h3>Videos</h3>
              <p>Vision Education Group’s research focus addresses learning across the life span, from the early years and school education to vocational, adult and workplace education and higher education.</p>
            </div>
            @include('user.videoitem')
          </div>
        </div>
      </main>

      <!-- Footer -->
  @include('user.footer')