@extends('admin.layout')

@section('dashboard')
<section class="content-header">
      <h1>
        Add About Our Company
       
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add About Our Company </a></li>
        
      </ol>
    </section>
@stop

@section('addcontent')

            <form   enctype="multipart/form-data" id="editAboutourcompany" data-id="{{$result->id}}" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Introduction*
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
                <textarea class="ckeditor" name="intro" rows="10" cols="80">
                  {{$result->company_introduction}}
                                            
                </textarea>
                   
              
            </div>

          </div>

         

         

            

            

               <div class="form-group">
                  <label for="exampleInputFile">Upload a Image*</label>
                  
                  <input type="file" id="exampleInputFile" name="image">

                  <p class="help-block">Please upload image of dimension 1800*572 </p><br>
                  <img src="{{url($result->image)}}" width="500" height="300">{{$errors->first('image')}}
                </div>



          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>
@stop
