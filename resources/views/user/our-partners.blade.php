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
      						<li><a href="{{url('our-mission-and-value')}}">Our Mission & Values</a></li>
                  <li><a href="{{url('our-story')}}">Our Story</a></li>
                  <li><a href="{{url('partner')}}" class="active">Our Partners</a></li>
      					</ul>
      				</div>
      			</div>	
      			<div class="col l9 m12 s12">
              <div class="act-content">
                <h4>Our Partners</h4>
                <div class="partners-col">
                  @foreach($result as $r)
                  <div class="a-col">
                    <img src="{{url('public/user/images/partner-1.png')}}" alt="Image" class="responsive-img">
                    <h6>Become a<br>{{$r->partner_type}}<br>for<br>{{$r->OrmBusinesspartner->title}}</h6>
                    <p>{{$r->short_description}}</p>
                    <a href="#!" class="bp-btn" data-partner="{{$r->partner_type}}" data-business="{{$r->OrmBusinesspartner->title}}">Become a Partner</a>
                  </div>
                  @endforeach
                  
                  
                </div>
              </div>
      				<div class="act-content why-partner">
      					<h4 class="center-align">Why do Partners choose Vision Education Group?</h4>
      					<p class="center-align">Because no one does Small Business CRM better. The Infusionsoft platform puts all you need in one place to
                get your clients more organized, grow their revenue (your commissions, too), and so much more.</p>
                <img src="{{url('public/user/images/partners.jpg')}}" alt="Image" class="responsive-img">
      				</div>
              <div class="act-content">
                <div class="partner-want">
                  <div class="left-part">
                    <h4>Want to get listed?</h4>
                    <p>Become a Vision agency partner to get exposure
                    to thousands of companies looking for help with their
                    marketing.</p>
                  </div>
                  <div class="right-part">
                    <a href="#!" class="bp-btn">Become a Partner</a>
                  </div>
                </div>
              </div>
      			</div>	
      		</div>
      	</div>
      </div>





      

      <!-- Footer -->
   @include('user.footer')

<div class="pf-modal">
        <div class="partners-form">
          <a href="#!" id="pfmodal-close"><img src="{{url('public/user/images/bpclose.png')}}" alt="Close" class="responsive-img"></a>
          <div class="pf-content">
            <h4 class="center-align">Apply to be a Vision<br>Agency Partner</h4>
            <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <form method="POST" id="beapartner">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <input type="hidden" name="business_name" id="business_name"> 

              <input type="hidden" name="partner_type" id="partner_type">

              <div class="input-element">
                <label for="">First Name <span>*</span></label>
                <input type="text" class="browser-default" name="firstname" required>
              </div>
              <div class="input-element">
                <label for="">Last Name <span>*</span></label>
                <input type="text" class="browser-default" name="lastname" required>
              </div>
              <div class="input-element">
                <label for="">Email <span>*</span></label>
                <input type="email" class="browser-default" name="email" required>
              </div>
              <div class="input-element">
                <label for="">Phone Number <span>*</span></label>
                <input type="text" class="browser-default" name="number" required>
              </div>
             <!--  <div class="input-element">
                <label for="">Agency Name <span>*</span></label>
                <input type="text" class="browser-default" name="agencyname" required>
              </div>
              <div class="input-element">
                <label for="">Agency Website <span>*</span></label>
                <input type="text" class="browser-default" name="agencywebsite" required>
              </div>
              <div class="input-element full-width">
                <label for="" class="long-label">DOES YOUR COMPANY SELL ANY OF THE FOLLOWING SERVICES?<br>
                  - Web Design<br>
                  - Online Marketing<br>
                  - SEO/SEM <br>
                  - Advertising Agency Services <span>*</span></label>
                <select class="browser-default" name="services">
                  <option disabled selected>- Please Select -</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="input-element">
                <label for="">HOW MANY EMPLOYEES WORK THERE? <span>*</span></label>
                <select class="browser-default" name="numberemplyoee">
                  <option disabled selected>- Please Select -</option>
                  <option value="1">1</option>
                  <option value="2">2 to 5</option>
                  <option value="2">6 to 10</option>
                  <option value="2">11 to 25</option>
                  <option value="2">26 to 40</option>
                  <option value="2">41 to 60</option>
                  <option value="2">41 to 100</option>
                  <option value="2">100 to 500</option>
                  <option value="2">501 or more</option>
                </select>
              </div>
              <div class="input-element">
                <label for="">What is your role? <span>*</span></label>
                <select class="browser-default" name="role">
                  <option disabled selected>- Please Select -</option>
                  <option value="1">C-Level/SVP</option>
                  <option value="2">VP/Director</option>
                  <option value="2">Manager</option>
                  <option value="2">Individual Contributor</option>
                  <option value="2">Student/Intern</option>
                </select>
              </div>
              
              <div class="input-element full-width">
                <label for="">Which CRM do you use? <span>*</span></label>
                <select class="browser-default" name="crm">
                  <option disabled selected>- Please Select -</option>
                  <option value="1">Basic Level</option>
                  <option value="2">IUPAC System</option>
                  <option value="2">Nagma Ho</option>
                  <option value="2">Swag CRM</option>
                  <option value="2">Another Option</option>
                  <option value="2">Interpolation</option>
                  <option value="2">Accounting</option>
                  <option value="2">AC/DC CRM</option>
                  <option value="2">Other</option>
                </select>
              </div>
              <div class="input-element full-width">
                <label for="">WHAT IS YOUR AGENCY'S PRIMARY SERVICE OFFERING? <span>*</span></label>
                <select class="browser-default" name="serviceofagency">
                  <option disabled selected>- Please Select -</option>
                  <option value="1">Website Development</option>
                  <option value="2">Android/IOS Development</option>
                  <option value="2">Public Relations</option>
                  <option value="2">Advertising</option>
                  <option value="2">Content Marketing</option>
                  <option value="2">Media Delivery</option>
                  <option value="2">CRM Consultants</option>
                  <option value="2">IT Services</option>
                  <option value="2">Other</option>
                </select>
              </div>
              <div class="input-element full-width">
                <label for="">WHAT IS YOUR AGENCY'S BIGGEST CHALLENGE? <span>*</span></label>
                <select class="browser-default" name="challenge">
                  <option disabled selected>- Please Select -</option>
                  <option value="1">Customers are not satisfied</option>
                  <option value="2">It's hard to find content</option>
                  <option value="2">Availability of suitable payment option</option>
                  <option value="2">Expensive service offerings</option>
                  <option value="2">Unavailability of authentic information</option>
                  <option value="2">Raw materials scarcity</option>
                  <option value="2">Lack of motivation</option>
                  <option value="2">Leadership problems</option>
                  <option value="2">Other</option>
                </select>
              </div> -->
              <div class="input-element submit-btn full-width">
                <button type="submit">Contact Us</button>
              </div>
            </form>
          </div>
        </div>
      </div>










