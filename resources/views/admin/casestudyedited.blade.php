 <form   enctype="multipart/form-data" id="" multiple>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Title of Case Study*</label>
                 <input type="text" class="form-control"  name="case_title" >
                 
            </div>
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Full Details*
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
                <textarea class="ckeditor" name="case_description" rows="10" cols="80">
                                            
                </textarea>
                   
              
            </div>

          </div>

          

          

            

            

               <div class="form-group">
                  <label for="exampleInputFile"> Images*</label>
                  <input type="file" id="exampleInputFile" name="case_image[]" multiple="multiple">

                  <p class="help-block">Example block-level help text here.</p>{{$errors->first('image')}}
                </div>



          


           
             <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
              </div>




           

         
          </div>
          </form>