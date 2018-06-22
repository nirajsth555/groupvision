@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	        Our Story
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Our story</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
       <div class="row no-print">
        <div class="col-xs-12">
          
          
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">  Add Story</button>
        </div>
      </div>
      <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
    </div> 
    <div class="box-body">
    	<table id="news-table" class="table table-bordered table-striped">
            <thead>
                <tr>

                	<th style="width: 5px">S.N</th>
                  	<th>Title</th>
                  	<th>Description</th>
                    
                    <th>Image</th>
                  	<th>Edit</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">
                  	<td>{{++$key}}</td>
                  	<td>{{$n->title}}
                  	</td>
                  	<td>{!! \Illuminate\Support\Str::words($n->description,50,'....')  !!}</td>
                    <!-- <td>{!! \Illuminate\Support\Str::words($n->what_we_do, 10,'....')  !!}</td>
                    <td>{!! \Illuminate\Support\Str::words($n->business_perspective, 10,'....')  !!}</td> -->
                    <td><img src="{{url($n->image)}}" width="200px" height="200px"> </td>

                  	
                     <td><a href="#"  class="editstory" data-id="{{$n->id}}" data-title="{{$n->title}}" data-description="{{$n->description}}" data-image="{{$n->image}}"   > <span class="label label-danger">Edit</span></a></td>
                  	
                  
                </tr>
                  	@endforeach
               
            </tbody>
           
  		</table>
    </div> 
  </div>
@stop

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Story</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
       <form   enctype="multipart/form-data" id="addstory" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Title*</label>
                 <input type="text" class="form-control"  name="title" required="" >
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Description*
                <small></small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
               
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad"> 
                <textarea class="ckeditor" name="intro" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

          </div>


          
           

            

            

               <div class="form-group">
                  <label for="exampleInputFile">Upload a Image*</label>
                  <input type="file" id="exampleInputFile" name="image" required="">

                  <p class="help-block">Please upload image of dimension 808*800</p>{{$errors->first('image')}}
                </div>



          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>




           

         
          </div>
          </form>
      </div>
      <div class="modal-footer">
              </div>
    </div>

  </div>
</div>



<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form   enctype="multipart/form-data" id="editstory" data-id="edit_id"  >
        <input type="hidden" name="id" value="" id="edit_id">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Title*</label>
                 <input type="text" class="form-control"  name="title" id="edit_name" required=""  >
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Description*
                <small></small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
               
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad"> 
                <textarea class="ckeditor" name="edit_desc" rows="10" cols="80" id="edit_desc" >
                                            
                </textarea>
                   
              
            </div>

          </div>


          
           

            

            

               <div class="form-group">
                  <label for="exampleInputFile">Upload a Image*</label>
                  <input type="file" id="exampleInputFile" name="image" >

                  <p class="help-block">Example block-level help text here.</p>{{$errors->first('image')}}<br>
                  <img src="" id="Image" width="300" height="200">
                </div>



          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>




           

         
          </div>
          </form>
          </div>
      <div class="modal-footer">
        
      </div>
    </div>

      </div>
      
    </div>
  </div>
</div>