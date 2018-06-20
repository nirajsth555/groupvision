 <div class="career-blocks">
                @foreach($obj as $r)
              <div class="a-cb">
                <div class="left-cb">
                  <h5>{{$r->job_position}}</h5>
                  <p>{{strip_tags(htmlspecialchars_decode($r->job_description))}}</p>
                </div>
                <div class="right-cb">
                  <div class="a-rcb">
                    <span>Location: {{$r->  job_location}}</span>
                    
                  </div>
                  <div class="a-rcb">
                    <span>Department:{{$r->job_department}}</span>
                    @if($r->job_type==1)
                    <span>Full Time</span>
                    @else
                    <span>Part  Time</span>
                    @endif
                    <span>Expiry Date:{{$r->expiry_date}}</span> 
                  </div>
                  <div class="a-rcb">
                    <a href="{{url('apply-job')}}/{{$r->id}}"><img src="{{url('public/user/images/apply-pen.png')}}" alt="Apply" class="responsive-img"> Apply Now</a>
                  </div>
                </div>
              </div>
                @endforeach
             
             
              
              
            </div>


  <div class="blog-pagination">
  {{$obj->links()}}
  
</div> 