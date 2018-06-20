@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	        Partner
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Partner</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
       <div class="row no-print">
        <div class="col-xs-12">
          
          
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">  Call for Partner</button>
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
                  	<th>Partner Type</th>
                    <th>Business Name</th>
                  	
                  	<th>Edit</th>
                  	<th>Delete</th>
                  	
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">
                  	<td>{{++$key}}</td>
                  	<td>{{$n->partner_type}}
                  	</td>
                    <td>{{$n->OrmBusinesspartner->title}}
                    </td>
                  	
                   

                  	<td><a href="{{url('edit-partner')}}/{{$n->id}}"> <span class="label label-primary">Edit</span></a></td>
                  	<td><a href="#" onClick="alert('Are you sure you want to delete?')" class="deletepartner" data-id="{{$n->id}}"> <span class="label label-danger" ">Delete</span></a></td>
                  	
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
<form   enctype="multipart/form-data" id="addpartnerfe"  >
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-md-12">
<div class="form-message" style="display: none;">
                
                  
</div>
<div class="form-group">
<label for="exampleInputEmail1">Call Partner For:</label>
<select name="business" class="form-control" required="" >
  <option value="" disabled selected>Choose a business</option>
  @foreach($busy as $r)
  <option value="{{$r->id}}">{{$r->title}}</option>
  @endforeach
</select>
</div>



<div class="form-group">
  <label for="exampleInputEmail1">Partner Type*</label>
  <input type="text" class="form-control"  name="partner" required="">
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Short Description*</label><br>
  <textarea rows="10" cols="80" name="short_description" required=""></textarea>
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