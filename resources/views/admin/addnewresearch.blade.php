@extends('admin.layout')

@section('dashboard')
<section class="content-header">
      <h1>
        Add New Research
       
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Research</a></li>
        
      </ol>
    </section>
@stop

@section('addcontent')

            <form   enctype="multipart/form-data" id="addnewresearch" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Research Title*</label>
                 <input type="text" class="form-control"  name="research_title" >
                 
            </div>
            
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Research Studies*
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
                <textarea class="ckeditor" name="research_description" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

          </div>
          <div class="form-group">
                 <label for="exampleInputEmail1">Research Preview Image*</label>
                 <input type="file" class="form-control"  name="research_image" >
                 
            </div>
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>
@stop
          
           
           
            

              

         

        

            

            

               



          


           
