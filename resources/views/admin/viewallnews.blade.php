@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	       All News
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>All News</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
      <div class="row no-print">
        <div class="col-xs-12">
          
          
          <!-- <a href="#" class="btn btn-primary pull-left add"  style="margin-right: 5px;" type="button"> -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">  Add News</button>

          
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
                  	<th>Description</th>
                    <th>Source</th>
                    
                  	<th>Edit</th>
                  	<th>Delete</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">  
                  	<td>{{++$key}}</td>
                  	<td>{{$n->title}}
                  	</td>
                    <td>{!! \Illuminate\Support\Str::words($n->fullnews, 30,'....')  !!}
                    </td>
                    @if($n->news_source==1)
                    <td>Press Release
                    </td>
                    @else
                    <td>Vision News</td>
                    @endif


                    
                  	
                   
                    
                    
                         
                  	<!-- <td><a href="" id= > <span class="label label-primary">Edit</span></a></div></td> -->
                    <td><a href="#"  class="editnews" data-id="{{$n->id}}" data-title="{{$n->title}}" data-description="{{$n->fullnews}}" data-source="{{$n->news_source}}"  > <span class="label label-danger">Edit</span></a></td>
                  	<td><a href="" onClick="alert('Are you sure you want to delete?')" class="deletenews" data-id="{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	
                </tr>
                  	@endforeach
               
            </tbody>
           
  		</table>
    </div> 
  </div>
@stop

<!-- add news -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add News</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
        <form   enctype="multipart/form-data" id="addnews" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">

             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Title*</label>
                 <input type="text" class="form-control"  name="news_title" required="" >
                 
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
                <textarea class="form-control ckeditor" name="news_description" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

          </div>

          

          

            

            

               <div class="form-group">
                  <label for="exampleInputFile">Thumbnail Image*</label>
                  <input type="file" id="exampleInputFile" name="news_image"  required="">

                  <p class="help-block">Please upload image of dimensions 508*339</p>
                </div>

                 <div class="form-group">
                  <label for="exampleInputFile">Single Page Image*</label>
                  <input type="file" id="exampleInputFile" name="news_single_image" required="" >

                  <p class="help-block">Please upload image of dimensions 860*358</p>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Select Category</label>
                  <select name="news_source" class="form-control" required="">
                    <option selected="true" disabled="disabled">Select a category</option>
                    <option value="1">Press Release</option>
                    <option value="0">Vision news</option>
                  </select>

                  
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


<!-- edit news -->
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
       <!-- form goes here --> <form   enctype="multipart/form-data" id="editnews" data-id="edit_id" multiple>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Title*</label>
                 <input type="text" class="form-control"  name="news_title" id="edit_name" required="" >
                 
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
                <textarea class="form-control ckeditor" name="edit_desc" rows="10" cols="80" id="edit_desc">
                                            
                </textarea>
                   
              
            </div>

          </div>

          

          

            

            

               <div class="form-group">
                  <label for="exampleInputFile">Thumbnail Image*</label>
                  <input type="file" id="exampleInputFile" name="news_image" required="" >

                  <p class="help-block">Please upload image of dimensions 508*339</p>
                </div>

                 <div class="form-group">
                  <label for="exampleInputFile">Single Page Image*</label>
                  <input type="file" id="exampleInputFile" name="news_single_image" required="">

                  <p class="help-block">Please upload image of dimensions 860*358</p>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Select Category</label>
                  <select name="news_source" class="form-control" id="edit_source" required="">

                    <option value="1">Press Release</option>
                    <option value="0">Vision news</option>
                  </select>

                  
                </div>



                 </div>
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