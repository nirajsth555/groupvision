@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	        List  News
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Add News</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
       <div class="row no-print">
        <div class="col-xs-12">
          
          
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Team Member</button>
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
                  	<th>Full Name</th>
                  	<th> Position</th>
                    <th>Description</th>
                    <th>Image</th>
                  	<th>Edit</th>
                  	<th>Delete</th>
                  	<th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">  
                  	<td>{{++$key}}</td>
                  	<td>{{$n->member_name}}
                  	</td>
                    <td>{{$n->postion}}</td>
                  	<td>{!! \Illuminate\Support\Str::words($n->description_of_team_member, 10,'....')  !!}</td>
                    <!-- <td>{!! \Illuminate\Support\Str::words($n->what_we_do, 10,'....')  !!}</td>
                    <td>{!! \Illuminate\Support\Str::words($n->business_perspective, 10,'....')  !!}</td> -->
                    <td><img src="{{url($n->image)}}" width="200px" height="200px"> </td>

                  	<td><a href="{{url('edit-team-member')}}/{{$n->id}}" > <span class="label label-primary">Edit</span></a></td>
                  	<td><a href="" onClick="alert('Are you sure you want to delete?')" class="delete_memb" data-id="{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	<td><a href=""> <span class="label label-success">View</span></a></td>
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
        <h4 class="modal-title">Add Team member</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
         <form   enctype="multipart/form-data" id="addTeam" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Full Name of Team Member*</label>
                 <input type="text" class="form-control"  name="fullname" required="" >
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Position of Team Member*</label>
                 <input type="text" class="form-control"  name="position" required="" >
                 
            </div>

            <div class="form-group">
                  <label for="exampleInputFile">Image of Team Member*</label>
                  <input type="file" id="exampleInputFile" name="image" required="">

                  <p class="help-block">Please upload image of dimension 232*265 </p>
            </div>

            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Desription of Team Member*
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
                <textarea class="ckeditor" name="desription" rows="10" cols="80">
                                            
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