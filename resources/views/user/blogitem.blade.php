<div class="small-blogs">
@foreach($obj as $o)
<div class="a-blog">
                <a href="{{url('single-blog')}}/{{$o->id}}">
                  <img src="{{url($o->blog_image)}}" alt="Image" class="responsive-img">
                </a>
                <div class="bottom-part">
                  <a href="{{url('single-blog')}}/{{$o->id}}"><h5>{{$o->blog_title}}</h5></a>
                  <!-- <p>{{strip_tags(htmlspecialchars_decode($o->blog_description))}}</p> -->
                  <p>{!! str_limit(strip_tags($o->blog_description), $limit = 100, $end = '...') !!} </p><a href="{{url('single-blog')}}/{{$o->id}}">View</a>
                </div>
              </div>
              @endforeach
            </div>
<div class="more-button center-align">
  
  {{$obj->links()}}
  
        
</div>