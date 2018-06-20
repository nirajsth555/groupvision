@include('user.header')

      <header class="career-header research-header">
        <div class="container">
          <div class="row no-mb">
            <h2>Research</h2>
            <p>A great place to work is the product of the great<br>
            people who work there. Are you interested in joining us?</p>
          </div>
        </div>
      </header>

      <main class="career-main bookshop-main research-main">
        <div class="container">
          <div class="row no-mb">
            <div class="bookshop-title">
              <h3>AREAS OF RESEARCH</h3>
              <p>Vision Education Group’s research focus addresses learning across the life span, from the early years and school education to vocational, adult and workplace education and higher education.</p>
            </div>
            <div class="act-research">
              @foreach($result as $r)
              <div class="a-block">
                <img src="{{url($r->research_image)}}" alt="Image" class="responsive-img" width="330px" height="150px">
                <div class="bottom-part">
                  <h5>{{$r-> research_title}}</h5>
                  <!-- <p>{!! \Illuminate\Support\Str::words($r->research_description, 20,'....')  !!}</p> -->
                  <p><?php echo(\Illuminate\Support\Str::words($r->research_description,20,'...'));?></p>
                  <div class="rmore-btn">
                    <a href="{{url('single-research')}}/{{$r->id}}/{{$r->slug}}">Read More</a>
                  </div>
                </div>
              </div>
              @endforeach
             
             
             
             
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
@include('user.footer')