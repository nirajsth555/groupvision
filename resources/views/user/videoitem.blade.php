<div class="act-videos">
  @foreach($obj as $result)
              <div class="a-video">
                <a href="{{url('single-video')}}/{{$result->id}}/{{$result->slug}}" class="vc">
                  <img src="{{url($result->video_image)}}" alt="Video Name" class="responsive-img">
                  <span class="time">{{$result->video_runtime}}</span>
                </a>
                <div class="bottom-part">
                  <a href="{{url('single-video')}}/{{$result->id}}/{{$result->slug}}"><h6>{{$result->video_title}}</h6></a>
                  <span class="views">{{$result->views}} Views</span>
                  <p>{!! \Illuminate\Support\Str::words($result->video_description, 30,'....')  !!}.</p>
                </div>
              </div>

              @endforeach
             
              
            </div>



            <div class="more-videos center-align">
              {{$obj->links()}}
            </div>