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
          
          
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add a New Job</button>
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
                  	<th>Job Title</th>
                  	<th>Position</th>
                    
                    <th>Location</th>
                    <th>Salary</th>
                  	<th>Edit</th>
                  	<th>Delete</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">
                  	<td>{{++$key}}</td>
                  	<td>{{$n->job_title}}
                  	</td>
                  	<td>{{$n->job_position}}</td>
                    
                    <td>{{$n->job_location}} </td>
                    <td>{{$n->job_salary}}</td>

                  	<td><a href="#" class="editajob" data-id="{{$n->id}}" data-title="{{$n->job_title}}" data-description="{{$n->job_description}}" data-position="{{$n->job_position}}" data-location="{{$n->job_location}}" data-salary="{{$n->job_salary}}" data-type="{{$n->job_type}}" data-department="{{$n->job_department}}" data-expiry="{{$n->expiry_date}}"> <span class="label label-primary" >Edit</span></a></td>
                  	<td><a href="" onClick="alert('Are you sure you want to delete?')" class="deleteajob" data-id="{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	
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
        <h4 class="modal-title">Add Business</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
         <form   enctype="multipart/form-data" id="addJob" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Title*</label>
                 <input type="text" class="form-control"  name="job_title" required="" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Position*</label>
                 <input type="text" class="form-control"  name="job_position" required="" >
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Job Description*
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
                <textarea class="ckeditor" name="job_description" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

          </div>
          <div class="form-group">
                 <label for="exampleInputEmail1">Location of Job*</label>
                 <input type="text" class="form-control"  name="job_location" required="">
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Department*</label>
                 <input type="text" class="form-control"  name="job_department" required="" >
                 
            </div>
           <div class="form-group">
                <label>Date of Expiry:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" id="datepicker"  name="expiry_date" required="" /> 

  
                </div>
                <!-- /.input group -->
              </div>
            <div class="form-group">
                  <label>Select type of job</label>
                  <select class="form-control" name="job_type" required="">
                    <option selected="true" disabled="disabled">Select type of Job </option>
                    <option value="1">Full Time</option>
                    <option value="0">Part Time</option>
                    
                  </select>
                </div>

                <div class="form-group">
                 <label for="exampleInputEmail1">Salary*</label>
                 <input type="text" class="form-control"  name="job_salary" required="" >
                 
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
        <form   enctype="multipart/form-data" id="editajob" >
          <input type="hidden" name="id" value="" id="edit_id">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Title*</label>
                 <input type="text" class="form-control"  name="job_title" id="edit_title" required="" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Position*</label>
                 <input type="text" class="form-control"  name="job_position" id="edit_position" required="">
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Job Description*
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
          <div class="form-group">
                 <label for="exampleInputEmail1">Location of Job*</label>
                 <input type="text" class="form-control"  name="job_location" id="edit_location" required="">
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Department*</label>
                 <input type="text" class="form-control"  name="job_department" id="edit_department" required="" >
                 
            </div>
           <div class="form-group">
                <label>Date of Expiry:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" class="datepicker"  name="expiry_date" id="edit_expirydate" required="" /> 

  
                </div>
                <!-- /.input group -->
              </div>
            <div class="form-group">
                  <label>Select type of job</label>
                  <select class="form-control" name="job_type" required="">
                    <option selected="true" disabled="disabled" >Select type of Job </option>
                    <option value="1">Full Time</option>
                    <option value="0">Part Time</option>
                    
                  </select>
                </div>

                <div class="form-group">
                 <label for="exampleInputEmail1">Salary*</label>
                 <input type="text" class="form-control"  name="job_salary" id="edit_salary" required="" >
                 
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