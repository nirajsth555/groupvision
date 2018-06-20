@extends('admin.layout')

@section('dashboard')
<section class="content-header">
      <h1>
        Edit Event and Webinars
       
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Edit Events and Webinars</a></li>
        
      </ol>
    </section>
@stop

@section('addcontent')

            <form   enctype="multipart/form-data" id="editevent" data-id="{{$result->id}}" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Event Title*</label>
                 <input type="text" class="form-control"  name="event_title" value="{{$result->event_title}}">
                 
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
                <textarea class="ckeditor" name="event_description" rows="10" cols="80">
                              {{$result->event_description}}              
                </textarea>
                   
              
            </div>

          </div>
          <div class="form-group">
                 <label for="exampleInputEmail1">Event Address *</label>
                 <input type="text" class="form-control"  name="event_address"  value="{{$result->event_address}}">
                 
            </div>
          <div class="form-group">
                 <label for="exampleInputEmail1">Event Venue*</label>
                 <input type="text" class="form-control"  name="event_venue" value="{{$result->event_venue}}" >
                 
            </div>
            
           <div class="form-group">
                <label>Event date from</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" id="datepicker"  name="event_from" value="{{$result->event_date_from}}" /> 

  
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
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" id="datepicker"  name="event_to" value="{{$result->event_date_to}}" /> 

  
                </div>
                <!-- /.input group -->
              </div>

               <div class="form-group">
                 <label for="exampleInputEmail1">Image*</label>
                 <img src="{{url($result->event_image)}}">
                 <input type="file" class="form-control"  name="event_image" >
                 
            </div>
            

              

         

        

            

            

               



          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>
@stop
