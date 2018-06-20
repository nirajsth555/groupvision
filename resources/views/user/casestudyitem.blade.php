<!-- <div class="row no-mb">
  @foreach($obj as $result)
            <div class="bookshop-title">
              <h3>{{$result->case_title}}</h3>

              <p>{{strip_tags(htmlspecialchars_decode($result->case_description))}}</p>
              <?php $images = json_decode($result->case_images); ?>
              <div class="bookshop-header last-carousel owl-carousel">
                @foreach($images as $image)
                <div class="item"><img src="images/cs-1.jpg" alt="Image" class="responsive-img"></div>
                @endforeach
                
              </div>
            </div>
            @endforeach
          </div>
<div class="blog-pagination">
  {{$obj->links()}}
  
</div>  -->


<div class="row no-mb">
  @foreach($obj as $result)
            <div class="bookshop-title">
              <h3>{{$result->case_title}}</h3>
              <!-- <p>{{strip_tags(htmlspecialchars_decode($result->case_description))}}</p> -->
              <?php echo ($result->case_description); ?>             

                
              <div class="bookshop-header last-carousel owl-carousel">
                <?php $images = json_decode($result->case_images); ?>
                @foreach($images as $image)
                
                <div class="item"><img src="{{url($image)}}" alt="Image" class="responsive-img"></div>
               
              @endforeach
              </div>

              
            </div>
            @endforeach
            
          </div>




  <div class="blog-pagination">
  {{$obj->links()}}
  
</div> 
  
