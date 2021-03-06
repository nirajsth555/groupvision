@include('user.header')

      <div class="who-main">
      	
      	<div class="container">
      		<div class="row no-mb">
      			<div class="col l3 m12 s12">
      				<div class="whosidebar">
      					<h5>About Us <i class="fa fa-caret-down right"></i></h5>
      					<ul>
      						<li><a href="{{url('our-company')}}">Our Company</a></li>
      						<li><a href="{{url('our-team')}}">Our Team</a></li>
      						<li><a href="{{url('our-mission-and-value')}}"">Our Mission & Values</a></li>
                  <li><a href="{{url('our-story')}}" class="active">Our Story</a></li>
                  <li><a href="{{url('partner')}}">Our Partners</a></li>
      					</ul>
      				</div>
      			</div>	
      			<div class="col l9 m12 s12">
              @foreach($result as $r)
      				<div class="act-content ostr-content">
      					<h4>Our Story</h4>
                <h5>{{$r->title}}</h5>
      					<p><?php echo($r->description); ?></p>
                <img src="{{url($r->image)}}" alt="Image" class="responsive-img">
      				</div>
              @endforeach
      			</div>	
      		</div>
      	</div>
      </div>

      <!-- Footer -->
@include('user.footer')