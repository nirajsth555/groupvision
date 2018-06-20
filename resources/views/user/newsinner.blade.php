@include('user.header')

      
      

      <main class="career-main">
        <div class="container small-container">
          <div class="row no-mb">
            <div class="blog-inner">
              <!-- <h6 class="small-title">Blogs</h6> -->
              <h1 class="main-title">{{$result->title}}</h1>
              <span class="date">{{$result->created_at->format('M d ,Y')}}</span><?php $id='social'; $slug='161567';?>
              <!-- <h2 class="subtitle">See how gathering data right in the classroom can be used to do.</h2> -->
              <div class="main-post">
                <div class="left-part">
                  <!-- <img src="images/author-1.png" alt="Author" class="responsive-img">
                  <h6 class="author-name">Amit Thakuri</h6> -->
                  <div class="share-icons">
                      <div class="fb-share-button" data-href="https://www.setopati.com/<?php echo $id;?>/<?php echo $slug;?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.quackfoot.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                    <a href="https://www.faceook.com/sharer/sharer.php?u={{urlencode(Request::fullUrl())}}" target="_blank"&gt; class="facebook-icon"><i class="fa fa-facebook"></i> Share</a>
                    <a href="#!" class="twitter-icon"><i class="fa fa-twitter"></i> Tweet</a>
                    <a href="#!" class="google-icon"><i class="fa fa-google"></i> Share</a>
                    <a href="#!" class="linkedin-icon"><i class="fa fa-linkedin"></i> Share</a>
                    <a href="#!" class="at-icon"><i class="fa fa-envelope"></i> Email</a>
                  </div>
                </div>
                <div class="right-part">
                  <div class="act-text">
                    <img src="{{url($result->single_page_image)}}" alt="Image" class="responsive-img">
                    <p><?php echo($result->fullnews); ?></p>

                  </div>
                  <div class="next-up clearfix">
                   @if($n)
                    <div class="left-part">
                      <h5>Next Up <i class="fa fa-angle-right"></i></h5>
                      <a href="{{url('single-news')}}/{{$n->id}}/{{$n->slug}}"><h4 class="news-title">{{$n->title}}</h4></a>
                      <p>{!! str_limit(strip_tags($n->fullnews), $limit = 300, $end = '...') !!} .</p>
                    </div>
                    <a href="{{url('single-news')}}/{{$n->id}}/{{$n->slug}}"><img src="{{url($n->image)}}" alt="Image" class="responsive-img right-part"></a>
                    @else
                    <div class="left-part">
                      <a href="#"><h5>Next Up <i class="fa fa-angle-right"></i></h5></a>
                      <a href="{{url('single-news')}}/{{$p->id}}/{{$p->slug}}"><h4 class="news-title">{{$p->title}}</h4></a>
                      <p>{!! str_limit(strip_tags($p->fullnews), $limit = 300, $end = '...') !!} .</p>
                    </div>
                    <a href="{{url('single-news')}}/{{$p->id}}/{{$p->slug}}"><img src="{{url($p->image)}}" alt="Image" class="responsive-img right-part"></a>
                    @endif
                    
                  </div>
                  <div class="comment-sec">
                    <h5>Leave a Reply</h5>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
                    <form method="POST" id="newscomment">
                      <input type="hidden" name="newstitle" value="{{$result->title}}">
                      <div class="input-element full-width">
                        <label for="">Comment <span>*</span></label>
                        <textarea class="browser-default" required name="comment"></textarea>
                      </div>
                      <div class="input-element">
                        <label for="">Name <span>*</span></label>
                        <input type="text" class="browser-default" name="fullname" required>
                      </div>
                      <div class="input-element">
                        <label for="">Email <span>*</span></label>
                        <input type="email" class="browser-default" name="email" required>
                      </div>
                      <!-- <div class="captcha full-width"></div> -->
                      <div class="input-element submit-btn full-width">
                        <button type="submit">Post Comment</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
  @include('user.footer')