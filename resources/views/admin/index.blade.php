@extends('admin.layout')

@section('index')
<div class="row">
       
        <!-- ./col -->
       
        <!-- ./col -->
       
        <!-- ./col -->
        
          <!-- small box -->
          <div class="callout callout-info">
        <h4>Welcome</h4> <h4 style="color:red;font-size:20px;">{{Auth::user()->name}}</h4>
       
      </div>
        </div>
        <!-- ./col -->
      
@stop