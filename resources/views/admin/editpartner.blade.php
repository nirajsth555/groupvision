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

<form   enctype="multipart/form-data" id="editpartner"  data-id="{{$result->id}}">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-md-12">
<div class="form-message" style="display: none;">
                
                  
</div>
<div class="form-group">
<label for="exampleInputEmail1">Call Partner For:</label>
<select name="business" class="form-control" >
  <option value="" disabled="disabled">Select a business</option>
  @foreach($busy as $r)
  <option value="{{$r->id}}">{{$r->title}}</option>
  @endforeach
</select>
</div>



<div class="form-group">
  <label for="exampleInputEmail1">Partner Type*</label>
  <input type="text" class="form-control"  name="partner" value="{{$result->partner_type}}" >
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Short Description*</label><br>
  <textarea rows="10" cols="80" name="short_description"> {{$result->short_description}}</textarea>
  </div>

  <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                
              </div>


</div>
</form>
@stop
