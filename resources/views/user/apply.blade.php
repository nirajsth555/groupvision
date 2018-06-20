@include('user.header')

      <header class="career-header">
        <div class="container">
          <div class="row no-mb">
            <h2>Careers</h2>
            <p>A great place to work is the product of the great<br>
            people who work there. Are you interested in joining us?</p>
          </div>
        </div>
      </header>

      <main class="career-main">
        <div class="container">
          <div class="row no-mb">
            <div class="apply-career">
              <h4>Find Your Career<br><span>at Vision Education Group</span></h4>
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
              <form action="" method="post" enctype="multipart/form-data"  id="applyjob" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="applied_for" value="{{$result->job_position}}">
                

                <div class="input-element">
                  <label for="">Candidate Name <span>*</span></label>
                  <input type="text" class="browser-default" required name="fullname">
                </div>
                <div class="input-element">
                  <label for="">Gender <span>*</span></label>
                  <select class="browser-default" name="gender">
                    <option disabled selected>- Please Select -</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                  </select>
                </div>
                
               
                <div class="input-element">
                  <label for="">Email <span>*</span></label>
                  <input type="email" class="browser-default" required name="email">
                </div>
                <div class="input-element">
                  <label for="">Phone Number <span>*</span></label>
                  <input type="text" class="browser-default" required name="number">
                </div>
                <div class="input-element full-width">
                  <label for="">Address <span>*</span></label>
                  <input type="text" class="browser-default" required name="address">
                </div>
                
                
                
                <div class="input-element">
                  <label for="">What is your total experience in the field? <span>*</span></label>
                  <input type="text" class="browser-default" required name="experience">
                </div>
                <div class="input-element">
                  <label for="">Expected Salary? <span>*</span></label>
                  <input type="text" class="browser-default" required name="expected_salary">
                </div>
                
                <div class="input-element">
                  <label for="">Upload CV <span>*</span></label>
                  <input type="file" class="browser-default" required name="applicant_resume">
                </div>

                
                <div class="input-element submit-btn full-width">
                  <button type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
@include('user.footer')