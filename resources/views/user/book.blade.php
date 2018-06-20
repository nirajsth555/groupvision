@include('user.header')

      <header class="career-header book-header">
        <div class="container">
          <div class="row no-mb">
            <!-- <h2>Careers</h2>
            <p>A great place to work is the product of the great<br>
            people who work there. Are you interested in joining us?</p> -->
          </div>
        </div>
      </header>

      <main class="career-main">
        <div class="container small-container">
          <div class="row no-mb">
            <div class="book-main" id="book1">
              <a href="#!"><img src="{{url($result->book_image)}}" alt="Image" class="responsive-img"></a>
              <div class="book-desc">
                <h4 class="book-title">{{$result->book_title}}</h4>
                <div class="rev-price">
                  <div class="yotpo bottomLine"
                    data-appkey="c8etE7njfzCFlAMkEIuWQ1IWOW8fFeXmO7UvfJ3e"
                    data-domain="vgroup321.bitballoon.com"
                    data-product-id="book1"
                    data-product-models="Something here"
                    data-name="Student Special - Career Guide Duo"
                    data-url="http://vgroup321.bitballoon.com/book.html"
                    data-image-url="http://vgroup321.bitballoon.com/images/book-main.png"
                    data-description="product description"
                    data-bread-crumbs="Books">
                  </div>
                  <h5 class="price">Price Rs. {{$result->book_price}}/-</h5>
                </div>
                <div class="act-desc">
                 
                  <div class="para-collection">
                    <?php echo($result->book_description) ?>
                  </div>
                </div>
                <div class="yotpo yotpo-main-widget" id="yotpoWidget" 
                  data-product-id="book1"
                  data-price="450"
                  data-currency="Rs."
                  data-name="Student Special - Career Guide Duo"
                  data-url="http://vgroup321.bitballoon.com/book.html"
                  data-image-url="http://vgroup321.bitballoon.com/images/book-main.png"
                  data-description="Product description">
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
@include('user.footer')