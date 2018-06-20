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

            <form   enctype="multipart/form-data" id="addAnewblog" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Blog Title*</label>
                 <input type="text" class="form-control"  name="blog_title" >
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Image*</label>
                 <input type="file" class="form-control"  name="blog_image" >
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Description of Blog*
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
                <textarea class="ckeditor" name="blog_description" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

          </div>
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>
@stop
          
           
           
            

              

         

        

            

            

               



          


           
