@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	       All Case Study
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>All Case Study</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
      <div class="row no-print">
        <div class="col-xs-12">
          
          
          <!-- <a href="#" class="btn btn-primary pull-left add"  style="margin-right: 5px;" type="button"> -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">  Add Case Study</button>

          
          <!-- </a> -->
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
                  	<th>Image</th>
                    
                  	<th>Edit</th>
                  	<th>Delete</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">  
                  	<td>{{++$key}}</td>
                  	<td>{{$n->case_title}}
                  	</td>
                    
                  	
                   
                    
                    <?php $images = json_decode($n->case_images); ?>
                  
                   
                    <td><img src="{{url($images[0])}}" width="200px" height="200px"><br> </td>
                         
                  	<!-- <td><a href="" id= > <span class="label label-primary">Edit</span></a></div></td> -->

                    <td><a href="#"  class="edit" data-id="{{$n->id}}" data-title="{{$n->case_title}}" data-description="{{$n->case_description}}"   > <span class="label label-danger">Edit</span></a></td>
                  	<td><a href="" onClick="alert('Are you sure you want to delete?')" class="deleteCasestudy" data-id="{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	
                </tr>
                  	@endforeach
               
            </tbody>
           
  		</table>
    </div> 
  </div>
@stop
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
       <!-- form goes here --> <form   enctype="multipart/form-data" id="editcasestudy" data-id="edit_id" multiple>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Title of Case Study*</label>
                 <input type="text" class="form-control"  name="case_title" id="edit_name" required="">
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Details*
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
                <textarea class="ckeditor" name="edit_description" rows="10" cols="80" id="edit_description">
                                           
                </textarea>
                   
              
            </div>

          </div>

          

          

            

            

               <div class="form-group">
                  <label for="exampleInputFile"> Images*</label>
                  <input type="file" id="exampleInputFile" name="case_image[]" multiple="multiple" required="">

                  <p class="help-block">Please upload image of size 535*374.</p>{{$errors->first('image')}}
                </div> </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="hidden" name="id" value="" id="edit_id">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
          </form>

      </div>
      
    </div>
  </div>
</div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
        <form   enctype="multipart/form-data" id="addcasestudy" multiple >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
              
            <div class="form-group">
                 <label for="exampleInputEmail1">Title of Case Study*</label>
                 <input type="text" class="form-control"  name="case_title" required="">
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Details*
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
                <textarea class="form-control ckeditor" name="case_description" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

          </div>

          

          

            

            

               <div class="form-group">
                  <label for="exampleInputFile"> Images*</label>
                  <input type="file" id="exampleInputFile" name="case_image[]" multiple="multiple" required="">

                  <p class="help-block">Please upload image of size 535*374.</p>{{$errors->first('image')}}<br>
                  <img src="" id="Image1" width="300" height="200">
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


