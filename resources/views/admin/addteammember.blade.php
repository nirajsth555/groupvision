@extends('admin.layout')

@section('dashboard')
<section class="content-header">
      <h1>
        Add Team Member
       
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Team Member</a></li>
        
      </ol>
    </section>
@stop

@section('addcontent')

            <form   enctype="multipart/form-data" id="addTeam" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Full Name of Team Member*</label>
                 <input type="text" class="form-control"  name="fullname" >
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Position of Team Member*</label>
                 <input type="text" class="form-control"  name="position" >
                 
            </div>

            <div class="form-group">
                  <label for="exampleInputFile">Image of Team Member*</label>
                  <input type="file" id="exampleInputFile" name="image">

                  <p class="help-block">Example block-level help text here.</p>
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
              </div>




           

         
          </div>
          </form>
@stop
