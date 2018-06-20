@include('user.header')

      <header class="career-header contact-header">
        <div class="container">
          <div class="row no-mb">
            <h2>Contact Us</h2>
            <p>A great place to work is the product of the great<br>
            people who work there. Are you interested in joining us?</p>
          </div>
        </div>
      </header>

      <main class="career-main contact-main">
        <div class="container">
          <div class="row no-mb">
            <div class="contact-div">
              <div class="map-div" id="mapVision"></div>
              <h4>Contact Us</h4>
              <p>
                If you would like to know more about Vision Education Group, contact us.<br>
                If you have an opinion about the Vision Education Grou ideas, tell us.<br>
                If you have a story about Vision Education Grouschooling, let us know.
              </p>

              <div class="acb">
                <h5>Address:</h5>
                <p>
                  D&C Building<br>
                  New Baneshower,<br>
                  Kathmandu
                </p>
              </div>

              <div class="acb">
                <h5>Postal address:</h5>
                <p>
                  Vision Education Group<br>
                  PO Box 544<br>
                  New Baneshower<br>
                  46200
                </p>
              </div>

              <div class="acb">
                <p>
                  For general enquiries call: (+977-01) 9590 5341<br>
                  Or simply use the contact form below.
                </p>
              </div>

              <form action="" enctype="multipart/form-data" id="contact_us">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
                <div class="input-element">
                  <label for="">First Name <span>*</span></label>
                  <input type="text" class="browser-default"  name="first_name"  >
                </div>
                <div class="input-element">
                  <label for="">Last Name <span>*</span></label>
                  <input type="text" class="browser-default" name="last_name" >
                </div>
                <div class="input-element">
                  <label for="">Email <span>*</span></label>
                  <input type="email" class="browser-default" name="email" >
                </div>
                <div class="input-element">
                  <label for="">Phone Number <span>*</span></label>
                  <input type="text" class="browser-default" name="number" >
                </div>
                <!-- <div class="input-element full-width">
                  <label for="">Address <span>*</span></label>
                  <input type="text" class="browser-default" required>
                </div> -->
                <!-- <div class="input-element">
                  <label for="">District <span>*</span></label>
                  <select class="browser-default">
                    <option disabled selected>- Please Select -</option>
                    <option value="1">Kathmandu</option>
                    <option value="1">Bhaktapur</option>
                    <option value="1">Lalitpur</option>
                    <option value="1">Kaski</option>
                    <option value="1">Chitwan</option>
                    <option value="1">Dhading</option>
                    <option value="1">Chitwan</option>
                    <option value="1">Gorkha</option>
                  </select>
                </div> -->
                <!-- <div class="input-element">
                  <label for="">City <span>*</span></label>
                  <select class="browser-default">
                    <option disabled selected>- Please Select -</option>
                    <option value="1">Kathmandu</option>
                    <option value="1">Pokhara</option>
                    <option value="1">Damauli</option>
                    <option value="1">Narayangadh</option>
                    <option value="1">Dhadingbeshi</option>
                    <option value="1">Butwal</option>
                    <option value="1">Hetauda</option>
                    <option value="1">Bhairahawa</option>
                  </select>
                </div> -->
                <!-- <div class="input-element full-width">
                  <label for="">Our School or Organization <span>*</span></label>
                  <select class="browser-default">
                    <option disabled selected>- Please Select -</option>
                    <option value="1">Vision Education Group, Main Office</option>
                    <option value="1">Nepal Education Times</option>
                    <option value="1">Center for Abroad Studies</option>
                    <option value="1">Little-Steps Pre-School & Daycare</option>
                    <option value="1">Nepal Careers Services</option>
                    <option value="1">NUCAS</option>
                    <option value="1">Vidhyalaya of Nepal</option>
                  </select>
                </div> -->
                <div class="input-element full-width">
                  <label for="">Message <span>*</span></label>
                  <textarea class="browser-default" name="message" required></textarea>
                </div>
                <div class="submit-btn input-element full-width">
                  <button type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
  @include('user.footer')