@include('user.header')

      <div class="who-main">
      	
      	<div class="container">
      		<div class="row no-mb">
      			<div class="col l3 m12 s12">
      				<div class="whosidebar">
      					<h5>What We Do<i class="fa fa-caret-down right"></i></h5>
      					<ul>
                  @foreach($busines as $b)
      						<li ><a href="{{url('our-services')}}/{{$b->id}}/{{$b->slug}}" class="active">{{$b->service_title}}</a></li>
      						@endforeach
      					</ul>
      				</div>
      			</div>	
      			<div class="col l9 m12 s12">
      				<div class="act-content">
      					<h4>{{$result->service_title}}</h4>
      					<img src="{{url($result->service_image)}}" alt="Image" class="responsive-img">
      					<p><?php echo($result->service_description ); ?></p>

      				</div>
      				
      				
      			</div>	
      		</div>
      	</div>
      </div>

      <!-- Footer -->
  @include('user.footer')