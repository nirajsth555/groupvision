@extends('admin.layout')

@section('dashboard')
	<section class="content-header">
	    <h1>
	        Admins
	    </h1>
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>View All Admin</a></li>
	    </ol>
	</section>
@stop

@section('addcontent')

  <div class="box">
    <div class="box-header">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">  Add Admin</button>
      <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
    </div> 
    <div class="box-body">
    	<table id="news-table" class="table table-bordered table-striped">
            <thead>
                <tr>

                	<th style="width: 5px">S.N</th>
                  	<th>Name</th>
                  	<th>Email</th>
                    
                    <th>Power</th>
                    @if(Auth::user()->power==1)

                  	<th>Delete</th>
                  	
                  	<th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($result as $key=>$n)
                <tr class="item{{$n->id}}">
                  	<td>{{++$key}}</td>
                    <td>{{$n->name}}</td>
                    <td>{{$n->email}}</td>
                    @if($n->power==1)
                    <td>Super Admin</td>
                    @else
                    <td>Admin</td>
                    @endif

                  


                  @if(Auth::user()->power==1 && Auth::user()->name==$n->name)
                  <td></td>
                
                @elseif(Auth::user()->power==1)
                  <td><a href="#" class="deleteadmin" data-id="{{$n->id}}"><span class="label label-danger" >Delete</span></a></td>
                   @if($n->power==1)
                  <td><a href="#" class="degradetoadmin" data-id="{{$n->id}}"><span class="label label-danger" >Degrade to Admin</span></a></td>
                  @else
                  <td><a href="#" class="upgradetosuper" data-id="{{$n->id}}"><span class="label label-danger" >Upgrade to Super-Admin</span></a></td>
                  @endif
                  @endif
                  	
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
        <h4 class="modal-title">Add Admin</h4>
      </div>
      <div class="modal-body">
        <!-- form goes here -->
       <form   enctype="multipart/form-data" id="addadmin" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Full Name*</label>
                 <input type="text" class="form-control"  name="name" required="">
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Email*</label>
                 <input type="email" class="form-control"  name="email" required="" >
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Password*</label>
                 <input type="password" class="form-control"  name="password" required="">
                 
            </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Confirm Password*</label>
                 <input type="password" class="form-control"  name="confirmpassword" required="">
                 
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Choos type of admin:</label>
              <select name="power" class="form-control" >
              <option value="" disabled selected>Choose power</option>
              <option value="1">Super Admin</option>
              <option value="0">Admin</option>
              
              
             
             </select>
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

