@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	        Videos
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Videos</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Video</button>
      <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
    </div> 
    <div class="box-body">
    	<table id="news-table" class="table table-bordered table-striped">
            <thead>
                <tr>

                	<th style="width: 5px">S.N</th>
                  	<th>Video Title</th>
                  	<th>Video Link</th>
                    
                    <th>Description</th>
                    
                  	<th>Edit</th>
                  	<th>Delete</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">
                  	<td>{{++$key}}</td>
                  	<td>{{$n->video_title}}
                  	</td>
                    <td><?php echo($n->video_link); ?>
                    </td>
                  	
                    
                    <td>{!! \Illuminate\Support\Str::words($n->video_description, 10,'....')  !!} </td>
                    

                  	<td><a href="#" class="editvideo" data-id="{{$n->id}}" data-title="{{$n->video_title}}
" data-link="{{$n->video_link}}" data-description="{{$n->video_description}}" data-runtime="{{$n->video_runtime}}" data-image="{{$n->video_image}}" > <span class="label label-primary">Edit</span></a></td>
                  	<td><a href="" onClick="alert('Are you sure you want to delete?')" class="deletevideo" data-id="{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	
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
        <h4 class="modal-title">Add Video</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
       <form   enctype="multipart/form-data" id="addvideo" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Video Title*</label>
                 <input type="text" class="form-control"  name="video_title" required="">
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Video iframe link*</label>
                 <input type="text" class="form-control"  name="video_link" required="">
                
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Video Runtime*</label>
                 <input type="text" class="form-control"  name="video_runtime" required="" >
                 
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Video Image*</label>
                 <input type="file" class="form-control"  name="video_image" required="" >
                 Please upload image of dimension 330*186
                 
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Description of Video*
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
                <textarea class="ckeditor" name="description" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form   enctype="multipart/form-data" id="editvideo" >
          <input type="hidden" name="id" value="" id="edit_id">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="form-group">
                 <label for="exampleInputEmail1">Video Title*</label>
                 <input type="text" class="form-control"  name="video_title" id="edit_title" required="">
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Video iframe link*</label>
                 <input type="text" class="form-control"  name="video_link" id="edit_link" required="">
                
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Video Runtime*</label>
                 <input type="text" class="form-control"  name="video_runtime" id="edit_runtime" required="" >
                 
                 
            </div>
            <div class="form-group">
                
                 <label for="exampleInputEmail1">Video Image*</label>
                 <input type="file" class="form-control"  name="video_image"   >
                 Please upload image of dimension 330*186
                 
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Description of Video*
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
                <textarea class="ckeditor" name="edit_desc" rows="10" cols="80" id="edit_desc">
                                            
                </textarea>
                   
              
            </div>
          </div>
             




           

         
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </form>
      </div>
      
    </div>
  </div>
</div>