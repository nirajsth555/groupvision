@extends('admin.layout')

@section('dashboard')
<section class="content-header">
      <h1>
        Add Where We Work
       
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Where We Work</a></li>
        
      </ol>
    </section>
@stop

@section('addcontent')

            <form   enctype="multipart/form-data" id="editwherewework" data-id="{{$result->id}}" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Title*</label>
                 <input type="text" class="form-control"  name="title" value="{{$result->title}}" >
                 
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
                              {{$result->whatwedo_intro}}              
                </textarea>
                   
              
            </div>

          </div>

          


            

            

               <div class="form-group">
                <img src="{{url($result->image)}}"><br>
                  <label for="exampleInputFile">Upload a Image*</label>

                  <input type="file" id="exampleInputFile" name="image">

                  <p class="help-block">Example block-level help text here.</p>{{$errors->first('image')}}
                </div>



          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>
@stop
