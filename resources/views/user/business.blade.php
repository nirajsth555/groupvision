@include('user.header')

      <div class="who-main">
      	
      	<div class="container">
      		<div class="row no-mb">
      			<div class="col l3 m12 s12">
      				<div class="whosidebar">
      					<h5>Our Business <i class="fa fa-caret-down right"></i></h5>
      					<ul>
                  @foreach($busines as $b)
      						<li ><a href="{{url('our-business')}}/{{$b->id}}/{{$b->slug}}" >{{$b->title}}</a></li>
      						@endforeach
      					</ul>
      				</div>
      			</div>	
      			<div class="col l9 m12 s12">
      				<div class="act-content">
      					<h4>{{$result->title}}</h4>
      					<img src="{{url($result->single_page_image)}}" alt="Image" class="responsive-img">
      					<p>{!!$result->business_intro !!}</p>
      				</div>
      				
      			</div>	
      		</div>
      	</div>
      </div>

      <!-- Footer -->
  @include('user.footer')