@include('user.header')

      <div class="who-main">
      	
      	<div class="container">
      		<div class="row no-mb">
      			<div class="col l3 m12 s12">
      				<div class="whosidebar">
      					<h5>About Us <i class="fa fa-caret-down right"></i></h5>
                <ul>
                  <li><a href="{{url('our-company')}}">Our Company</a></li>
                  <li><a href="{{url('our-team')}}" class="active">Our Team</a></li>
                  <li><a href="{{url('our-mission-and-value')}}">Our Mission & Values</a></li>
                  <li><a href="{{url('our-story')}}">Our Story</a></li>
                  <li><a href="{{url('partner')}}">Our Partners</a></li>
                </ul>
      				</div>
      			</div>	
      			<div class="col l9 m12 s12">
      				<div class="act-content">
      					<h4>Our Leadership Team</h4>
      					<img src="{{url('public/user/images/wwa-1.jpg')}}" alt="Image" class="responsive-img">
      					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatibus, voluptas quae voluptatem te
								mpora exercitationem neque asperiores recusandae error, enim culpa iure ullam odio quia tenetur itaque
								provident reprehenderit fuga. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatibus.
								</p>
      				</div>
              <div class="act-team">
              @foreach($result as $team)
               
                     
                <div class="a-member">
                  <div class="mdetails">
                    <div class="left-details left">
                      <img src="{{url($team->image)}}" alt="Image" class="responsive-img" >
                      <h4 class="mname">{{$team->member_name}},{{$team->postion}}</h4>
                    </div>
                    
                    <div class="det-para">

                      <p>{{strip_tags(htmlspecialchars_decode($team->description_of_team_member))}}</p> 


                      
                    </div>
                  </div>
                </div>
                       
             
               
                
               
              @endforeach
              </div>
      			</div>	
      		</div>
      	</div>
      </div>

      <!-- Footer -->
@include('user.footer')