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

            <form   enctype="multipart/form-data" id="editBusinessform" data-id="{{$result->id}}" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Name of Business*</label>
                 <input type="text" class="form-control"  name="title" value="{{$result->title}}" >
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Slogan*</label>
                 <input type="text" class="form-control"  name="slogan" value="{{$result->slogan}}">
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Business Website*</label>
                 <input type="text" class="form-control"  name="website" value="{{$result->business_website}}">
                 
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
                                            {{$result->business_intro}}
                </textarea>
                   
              
            </div>

          </div>

          <div class="form-group">
            <img src="{{url($result->front_image)}}" width="500px" height="300px"><br>
                  <label for="exampleInputFile">Upload a Front Image*</label>
                  <input type="file" id="exampleInputFile" name="front_image">

                  <p class="help-block">Example block-level help text here.</p>
                </div>

                <div class="form-group">
                  <img src="{{url($result->single_page_image)}}" width="500px" height="300px"><br>
                  <label for="exampleInputFile">Upload a Single Page Image</label>
                  <input id="exampleInputFile" type="file" name="single_image">

                  <p class="help-block">Example block-level help text here.</p>
                </div>

         

          

            

            

              


          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>
@stop
