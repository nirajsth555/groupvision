@include('user.header')

      <div class="who-main">
      	
      	<div class="container">
      		<div class="row no-mb">
      			<div class="col l3 m12 s12">
      				<div class="whosidebar">
      					<h5>About Us <i class="fa fa-caret-down right"></i></h5>
                <ul>
                  <li><a href="{{url('our-company')}}" class="active">Our Company</a></li>
                  <li><a href="{{url('our-team')}}">Our Team</a></li>
                  <li><a href="{{url('our-mission-and-value')}}">Our Mission & Values</a></li>
                  <li><a href="{{url('our-story')}}">Our Story</a></li>
                  <li><a href="{{url('partner')}}">Our Partners</a></li>
                </ul>
      				</div>
      			</div>	
            @foreach($result as $r)
      			<div class="col l9 m12 s12">
      				<div class="act-content">
      					<h4>Who are we?</h4>
      					<img src="{{url($r->image)}}" alt="Image" class="responsive-img">
      					<p>{!! $r->company_introduction !!}</p>
      				</div>
      				
      			</div>	
            @endforeach
      		</div>
      	</div>
      </div>

   @include('user.footer')