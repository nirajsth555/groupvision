<div class="small-blogs">
@foreach($obj as $o)
<div class="a-blog">
                <a href="{{url('single-news')}}/{{$o->id}}/{{$o->slug}}">
                  <img src="{{url($o->image)}}" alt="Image" class="responsive-img">
                </a>
                <div class="bottom-part">
                  <a href="{{url('single-news')}}/{{$o->id}}/{{$o->slug}}"><h5>{{$o->title}}</h5></a>
                  
                  <p>{!! str_limit(strip_tags($o->fullnews), $limit = 100, $end = '...') !!} </p><a href="">View</a>
                </div>
              </div>
              @endforeach
            </div>
<!-- <div class="more-button center-align"> -->
  <div class="blog-pagination">
  {{$obj->links()}}
  
</div>              