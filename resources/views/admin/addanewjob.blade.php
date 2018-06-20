@extends('admin.layout')

@section('dashboard')
<section class="content-header">
      <h1>
        Add News
       
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add News</a></li>
        
      </ol>
    </section>
@stop

@section('addcontent')

            <form   enctype="multipart/form-data" id="addJob" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Title*</label>
                 <input type="text" class="form-control"  name="job_title" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Position*</label>
                 <input type="text" class="form-control"  name="job_position" >
                 
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
                 <input type="text" class="form-control"  name="job_location" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Job Department*</label>
                 <input type="text" class="form-control"  name="job_department" >
                 
            </div>
           <div class="form-group">
                <label>Date of Expiry:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                  <input type="date" data-date-inline-picker="false" data-date-popover='{"inline": true}' class="form-control pull-right" id="datepicker"  name="expiry_date" /> 

  
                </div>
                <!-- /.input group -->
              </div>
            <div class="form-group">
                  <label>Select type of job</label>
                  <select class="form-control" name="job_type">
                    <option selected="true" disabled="disabled">Select type of Job </option>
                    <option value="1">Full Time</option>
                    <option value="0">Part Time</option>
                    
                  </select>
                </div>

                <div class="form-group">
                 <label for="exampleInputEmail1">Salary*</label>
                 <input type="text" class="form-control"  name="job_salary" >
                 
            </div>

         

        

            

            

               



          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>
@stop
