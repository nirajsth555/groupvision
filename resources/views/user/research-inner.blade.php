@include('user.header')

      <header class="career-header rinner-header">
        <div class="container">
          <div class="row no-mb">
            <h2>Research</h2>
            <p>A great place to work is the product of the great<br>
            people who work there. Are you interested in joining us?</p>
          </div>
        </div>
      </header>

      <main class="career-main bookshop-main rinner-main">
        <div class="container">
          <div class="row no-mb">
            <div class="bookshop-title">
              <h3>{{$result->research_title}}</h3>
              <p><?php echo($result->research_description); ?></p>
              
            </div>
            
          </div>
        </div>
      </main>

      <!-- Footer -->
@include('user.footer')