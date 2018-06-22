@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	       Books
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Books</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
       <div class="row no-print">
        <div class="col-xs-12">
          
          
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Book</button>
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
                  	<th>Book Name</th>
                  	<th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                    
                  	<th>Edit</th>
                  	<th>Delete</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">  
                  	<td>{{++$key}}</td>
                  	<td>{{$n->book_title}}
                  	</td>
                     <td><img src="{{url($n->book_image)}}" width="200px" height="200px"> </td>
                     <td>Rs. {{$n->book_price}}
                    </td>
                    
                  	<td>{!! \Illuminate\Support\Str::words($n->book_description, 50,'....')  !!}</td>
                    
                   
                   

                  	<td><a href="#" class="editbook" data-id="{{$n->id}}" data-title="{{$n->book_title}}" data-description="{{$n->book_description}}" data-venue="{{$n->book_price}}" data-image="{{$n->book_image}}"> <span class="label label-primary">Edit</span></a></td>
                  	<td><a href="" onClick="alert('Are you sure you want to delete?')" class="deletebook" data-id="{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	
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
        <h4 class="modal-title">Add Book</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
         <form   enctype="multipart/form-data" id="addbook" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Book Title*</label>
                 <input type="text" class="form-control"  name="book_title" required="" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Book Price*</label>
                 <input type="text" class="form-control"  name="book_price" required="" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1"> Image*</label>
                 <input type="file" class="form-control"  name="book_image" required="" >
                 Please upload image of dimension 329*290
                 
            </div>
            
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Book Description*
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
                <textarea class="ckeditor" name="book_description" rows="10" cols="80" required="">
                                            
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
      <form   enctype="multipart/form-data" id="editbook" >
        <input type="hidden" name="id" value="" id="edit_id">

              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Book Title*</label>
                 <input type="text" class="form-control"  name="book_title" id="edit_title" required="" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Book Price*</label>
                 <input type="text" class="form-control"  name="book_price" id="edit_price" required="" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1"> Image*</label>
                 <input type="file" class="form-control"  name="book_image" >
                 Please upload image of dimension 329*290<br>
                 <img src="" id="myImage" width="300" height="200">
                 
            </div>
            
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Book Description*
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
                <textarea class="ckeditor" name="edit_desc" rows="10" cols="80" id="edit_desc" required="">
                                            
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