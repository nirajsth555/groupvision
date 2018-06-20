<div class="act-bookshop">
              <h3>Our Books</h3>
              <div class="bookshop-blocks">
                @foreach($obj as $result)
                <a href="{{url('single-book')}}/{{$result->id}}/{{$result->slug}}" class="a-bb">
                  <img src="{{url($result->book_image)}}" alt="Image" class="responsive-img">
                  <div class="bottom-part">
                    <h5>{{$result->book_title}}</h5>
                    <h6>{!! str_limit(strip_tags($result->book_description), $limit = 100, $end = '...') !!}</h6>
                  </div>
                </a>
                @endforeach
                
              </div>
            </div>

             <div class="more-videos center-align">
              {{$obj->links()}}
            </div>

