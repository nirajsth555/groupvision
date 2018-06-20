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
           @include('user.carreritem')
          </div>
        </div>
      </main>

      
@include('user.footer')