@include('user.header')

     <!--  <div class="who-main">
      	
      	<div class="container">
      		<div class="row no-mb">
      			<div class="col l3 m12 s12">
      				<div class="whosidebar">
      					<h5>What We Do<i class="fa fa-caret-down right"></i></h5>
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
      					<img src="{{url($result->image)}}" alt="Image" class="responsive-img">
      					<p><?php echo($result->introduction); ?></p>

      				</div>
                              <div class="act-team">
                <div class="a-member">
                  <div class="mdetails">
                    <div class="left-details left">
                      <img src="images/mem-1.jpg" alt="Image" class="responsive-img">
                      <h4 class="mname">Ram Bahadur, Director</h4>
                    </div>
                    
                    <div class="det-para">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatibus, voluptas  mpora  empora
                      xercitationem neque asperiores recusandae error, enim culpa iure ullam odio provident reprehe repre
                      nderit fuga. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                      <p>Odio quia tenetur itaque provident reprehenderit fuga. Lorem ipsum dolor  ng elit. Quas volupt Quas 
                      atibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit.  mpora exercitationem neque as volup
                      periores recusandae error, enim culpa iure ullam odio provident reprehenderit fuga. Lorem ipsu ipsuip
                      m dolor sit amet, consectetur adipisicing elit.</p> 

                      <p>Quas voluptatibus. Odio quia tenetur itaque provident reprehenderit fuga. Lorem ips um dolor sitolor 
                      amet, consectetur adipisici ng elit. Quas voluptatibus.</p>
                    </div>
                  </div>
                </div>
          </div>
      				
      			</div>	
      		</div>
      	</div>

            
      </div> -->

      <div class="who-main">
            
            <div class="container">
                  <div class="row no-mb">
                        <div class="col l3 m12 s12">
                              <div class="whosidebar">
                                    <h5>What We Do<i class="fa fa-caret-down right"></i></h5>
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
                                    <img src="{{url($result->image)}}" alt="Image" class="responsive-img">
                                    <p><?php echo($result->introduction); ?></p>

                              </div>
            <div class="act-team">
              <?php $images = json_decode($result->point_image);?>
              <?php $descri = json_decode($result->point_description); ?>
              
                <?php for ($i=0; $i <count($images) ; $i++) { 
                  # code...
                 ?>
                


              
               
                     
                <div class="a-member">
                  <div class="mdetails">
                    <div class="left-details left">
                       
                      <img src="{{url($images[$i])}}" alt="Image" class="responsive-img" >
                     
                      
                    </div>
                    
                    <div class="det-para">
                        
                      

                      <p><?php echo $descri[$i]; ?></p> 
                     


                      
                    </div>
                  </div>
                </div>
              
             
               
                <?php }?>
               
            
              </div>
                        </div>      
                  </div>
            </div>
      </div>

      <!-- Footer -->
  @include('user.footer')