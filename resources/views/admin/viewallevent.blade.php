@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	       All Events
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Events</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
       <div class="row no-print">
        <div class="col-xs-12">
          
          
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Event</button>
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
                  	<th>Event Name</th>
                  	<th>Event Description</th>
                    <th>Event Venue</th>
                    <th>Event Date From</th>
                    <th>Image</th>
                  	<th>Edit</th>
                  	<th>Delete</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">  
                  	<td>{{++$key}}</td>
                  	<td>{{$n->event_title}}
                  	</td>
                    
                  	<td>{!! \Illuminate\Support\Str::words($n->event_description, 10,'....')  !!}</td>
                    <td>{{$n->event_venue}}
                    </td>
                    <td>{{$n->event_date_from}}
                    </td>
                    <!-- <td>{!! \Illuminate\Support\Str::words($n->what_we_do, 10,'....')  !!}</td>
                    <td>{!! \Illuminate\Support\Str::words($n->business_perspective, 10,'....')  !!}</td> -->
                    <td><img src="{{url($n->event_image)}}" width="200px" height="200px"> </td>

                  	<td><a href="#" class="editevent" data-id="{{$n->id}}" data-title="{{$n->event_title}}" data-description="{{$n->event_description}}" data-venue="{{$n->event_venue}}" data-address="{{$n->event_address}}" data-from="{{$n->event_date_from}}" data-to="{{$n->event_date_to}}"> <span class="label label-primary">Edit</span></a></td>
                  	<td><a href="" onClick="alert('Are you sure you want to delete?')" class="deleteEvent" data-id="{{$n->id}}"> <span class="label label-danger">Delete</span></a></td>
                  	
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
         <form   enctype="multipart/form-data" id="addevent" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Event Title*</label>
                 <input type="text" class="form-control"  name="event_title" required="" >
                 
            </div>
            
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Event Description*
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
                <textarea class="ckeditor" name="event_description" rows="10" cols="80" required="">
                                            
                </textarea>
                   
              
            </div>

          </div>
          <div class="form-group">
                 <label for="exampleInputEmail1">Event Address *</label>
                 <input type="text" class="form-control"  name="event_address" required="">
                 
            </div>
          <div class="form-group">
                 <label for="exampleInputEmail1">Event Venue*</label>
                 <input type="text" class="form-control"  name="event_venue" required="" >
                 
            </div>
            
           <div class="form-group">
                <label>Event date from</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" id="datepicker"  name="event_from" required="" /> 

  
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Event date to</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" id="datepicker"  name="event_to" required="" /> 

  
                </div>
                <!-- /.input group -->
              </div>

               <div class="form-group">
                 <label for="exampleInputEmail1">Preview Image*</label>
                 <input type="file" class="form-control"  name="event_image" required="" >
                 Please upload image of dimension 230*270
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Single Page Image*</label>
                 <input type="file" class="form-control"  name="event_single_image" required="" >
                 Please upload image of dimension 860*358
                 
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
      <form   enctype="multipart/form-data" id="editevent" >
        <input type="hidden" name="id" value="" id="edit_id">

              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Event Title*</label>
                 <input type="text" class="form-control"  name="event_title" id="edit_title" required="" >
                 
            </div>
            
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Event Description*
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
                 <label for="exampleInputEmail1">Event Address *</label>
                 <input type="text" class="form-control"  name="event_address" id="edit_address" required="" >
                 
            </div>
          <div class="form-group">
                 <label for="exampleInputEmail1">Event Venue*</label>
                 <input type="text" class="form-control"  name="event_venue"  id="edit_venue" required="">
                 
            </div>
            
           <div class="form-group">
                <label>Event date from</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" class="datepicker"  name="event_from" id="edit_from" required="" /> 

  
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Event date to</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" class="datepicker"  name="event_to" id="edit_to" required="" /> 

  
                </div>
                <!-- /.input group -->
              </div>

                 <div class="form-group">
                 <label for="exampleInputEmail1">Preview Image*</label>
                 <input type="file" class="form-control"  name="event_image" required="" >
                 Please upload image of dimension 230*270
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Single Page Image*</label>
                 <input type="file" class="form-control"  name="event_single_image" required="" >
                 Please upload image of dimension 860*358
                 
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