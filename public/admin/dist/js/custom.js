//add business
$(document).ready(function(){
	$("#addBusiness").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('description', CKEDITOR.instances['description'].getData());
		
		

		$.ajax({
			url: APP_URL+"/postbusiness",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 // formMessage.html('').removeClass('alert-success').addClass('alert-warning');
					 // formMessage.append($('<ul>'));
					 // var ul = formMessage.find('ul').first();
					 // $.each(data.error,function(k,v){
      //                   ul.append($('<li>').text(v));
      //                });
      //               formMessage.show();
                         toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete a business
$(".delete_business").on('click',function(e){
		e.preventDefault();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-business/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully deleted.', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

//pop up
$('.editbusiness').on('click',function(){
	
   $('#edit_id').val($(this).data('id'));
   $('#edit_title').val($(this).data('title'));
   $('#edit_slogan').val($(this).data('slogan'));
   $('#edit_website').val($(this).data('website'));
   var my = $(this).data('front');
    $("#exampleModal #Image1").attr("src", my);

    var Image = $(this).data('img');
    $("#exampleModal #Image2").attr("src", Image);

    var myI = $(this).data('single');
    $("#exampleModal #Image3").attr("src", myI);
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
  
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModal').modal('show');
});

   
   
   
   

   



   
   
	


//edit business
$(document).ready(function(){
	$("#editBusinessform").submit(function(e){
		alert();
		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		
		

		$.ajax({
			url: APP_URL+"/business-content-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success('You have succesfully edited ', 'Congratulations', {timeOut: 5000})
				}
				else{
					
                   toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//about company add
$(document).ready(function(){
	$("#addAboutourcompany").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('intro', CKEDITOR.instances['intro'].getData());
		

		$.ajax({
			url: APP_URL+"/post-about-our-company",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success('You have succesfully added a content', 'Congratulations', {timeOut: 5000})
				}
				else{
					 
                toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

//end

//about company edit
$(document).ready(function(){
	$("#editAboutourcompany").submit(function(e){
		e.preventDefault();
		var id=$(this).data('id');
		var formdata= new FormData(this);
		formdata.append('intro', CKEDITOR.instances['intro'].getData());
		
		

		$.ajax({
			url: APP_URL+"/about-our-company-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success('You have succesfully edited details of team member', 'Congratulations', {timeOut: 5000})
				}
				else{
					 
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

//stop

//about company delete
$(".delete_about_company").on('click',function(e){
		e.preventDefault();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-about-our-company/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed about company content', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

//team member add
$(document).ready(function(){
	$("#addTeam").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('desription', CKEDITOR.instances['desription'].getData());
		

		$.ajax({
			url: APP_URL+"/post-a-team-member",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

//edit a team member
$(document).ready(function(){
	$("#editTeam").submit(function(e){

		e.preventDefault();
		var id=$(this).data('id');
		var formdata= new FormData(this);
		formdata.append('desription', CKEDITOR.instances['desription'].getData());
		

		$.ajax({
			url: APP_URL+"/edited-team-member/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success('You have succesfully edited details of team member', 'Congratulations', {timeOut: 5000})
				}
				else{
					
      toastr.error
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//end

//delete a team member
// $(document).ready(function(e){
	$(".delete_memb").on('click',function(e){
		e.preventDefault();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-team-member/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed a team member', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
// });
//end

//add a job
$(document).ready(function(){
	$("#addJob").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('job_description', CKEDITOR.instances['job_description'].getData());
		
		$.ajax({
			url: APP_URL+"/new-job-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
				
      toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete a job
$(".deleteajob").on('click',function(e){
		e.preventDefault();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-a-job/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed a JOB details', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});

//end
$('.editajob').on('click',function(){
	
   $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
   
   $('#edit_position').val($(this).data('position'));
   $('#edit_location').val($(this).data('location'));
   $('#edit_department').val($(this).data('department'));
   $('#edit_expirydate').val($(this).data('expiry'));
   $('#edit_salary').val($(this).data('salary'));
   $('#edit_type').val($(this).data('type'));
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModal').modal('show');
});
  

   



   
   
	
   
   
   
   


//edit a job
$(document).ready(function(){
	$("#editajob").submit(function(e){

		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		
		$.ajax({
			url: APP_URL+"/job-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//add a new blog
$(document).ready(function(){
	$("#addAnewblog").submit(function(e){


		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('blog_description', CKEDITOR.instances['blog_description'].getData());
		
		$.ajax({
			url: APP_URL+"/new-blog-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
             
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success('You have succesfully added a new blog', 'Congratulations', {timeOut: 5000})
				}
				else{
					
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete blog
$(".deleteBlog").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-a-blog/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed a blog ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

$('.editblog').on('click',function(){
	
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    var myImageId = $(this).data('thumbnail');
    $("#exampleModal #myImage").attr("src", myImageId);

    var myImage = $(this).data('full');
    $("#exampleModal #Image").attr("src", myImage);
    // $('#edit_thumbnail').val($(this).data('thumbnail'));
  // $('.imagepreview').attr('src', $(this).find('thumbnail').attr('src'));
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModal').modal('show');
});


   



   
   
	
   
   
   
   


//edit a blog
$(document).ready(function(){
	$("#editAblog").submit(function(e){
		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/blog-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success('You have succesfully edited ', 'Congratulations', {timeOut: 5000})
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end


//add slider image
$(document).ready(function(){
	$("#addsliderimage").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('slider_short_description', CKEDITOR.instances['slider_short_description'].getData());
		
		$.ajax({
			url: APP_URL+"/slider-image-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
             
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete slider image
$(".deletesliderimage").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-a-slider-image/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed a blog ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

//edit a slider image
$(document).ready(function(){
	$("#editsliderimage").submit(function(e){

		e.preventDefault();
		var id=$(this).data('id');
		var formdata= new FormData(this);
		formdata.append('slider_short_description', CKEDITOR.instances['slider_short_description'].getData());
		
		$.ajax({
			url: APP_URL+"/slider-image-added/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
				}
				else{
				
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//add what we do
$(document).ready(function(){
	$("#addwhatwedo").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('intro', CKEDITOR.instances['intro'].getData());
		

		$.ajax({
			url: APP_URL+"/what-we-do-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
					
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete whatwedo
$(".deleteWhatwedo").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-what-we-do/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed the content ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

$('.editwhatwedo').on('click',function(){
	$('#editwhatwedo .btn-remove').click();
	$('#editwhatwedo .addedImage').remove();
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $('#mainimg').attr('src',$(this).data('mainimg'));

    var point_img_array = $(this).data('pointimg');

    var point_desc_array = $(this).data('point');
    debugger;
    //first ko pailai tei huncha tei bhaera 1st ko sidai haldeko
    $('#editwhatwedo textarea[name="point[][textarea]"]').val(point_desc_array[0]);
    $('#editwhatwedo input[name="point[][point_image]"]').parent().append($('<img>').attr('src',point_img_array[0]).css('width',200).addClass('addedImage'));
    var count = point_desc_array.length;
    for(i=1;i<count;i++){
    	$('#editwhatwedo .btn-add').click();
    	$($('#editwhatwedo textarea[name="point[][textarea]"]').get().pop()).val(point_desc_array[i]);
    	$($('#editwhatwedo input[name="point[][point_image]"]').get().pop()).parent().append($('<img>').attr('src',point_img_array[i]).css('width',200).addClass('addedImage'));
    }

    
  
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModal').modal('show');
});


   



   
   
	
   
   
   
   



//edit what we do
$(document).ready(function(){
	$("#editwhatwedo").submit(function(e){

		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/what-we-do-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end


//add a event
$(document).ready(function(){
	$("#addevent").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('event_description', CKEDITOR.instances['event_description'].getData());
		

		$.ajax({
			url: APP_URL+"/new-event-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})

				}
				else{
					
                  toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end


//delete event
$(".deleteEvent").on('click',function(e){

		e.preventDefault();
		alert();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-event/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed event ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

$('.editevent').on('click',function(){
	
   $('#edit_id').val($(this).data('id'));
   $('#edit_title').val($(this).data('title'));
   $('#edit_venue').val($(this).data('venue'));
   $('#edit_address').val($(this).data('address'));
   $('#edit_from').val($(this).data('from'));
   $('#edit_to').val($(this).data('to'));

   var mydef = $(this).data('front');
    $("#exampleModal #Image1").attr("src", mydef);

    var my = $(this).data('single');
    $("#exampleModal #Image2").attr("src", my);
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   
   $('#exampleModal').modal('show');
});


   



   
   
	
   
   
   

//edit event
$(document).ready(function(){
	$("#editevent").submit(function(e){

		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/event-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
					 
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

//end


//where we work added
$(document).ready(function(){
	$("#addwherewework").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('intro', CKEDITOR.instances['intro'].getData());
		

		$.ajax({
			url: APP_URL+"/where-we-work-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
				
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end


//delete where we work
$(".deletewherewework").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-where-we-work/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed event ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end
$('.editwherewework').on('click',function(){
	
    $('#edit_id').val($(this).data('id'));
   $('#edit_title').val($(this).data('title'));
   var my = $(this).data('image');
    $("#exampleModal #Image1").attr("src", my);
   
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModal').modal('show');
});


   



   
   
	
   
   
   
   


//editwherewework
$(document).ready(function(){
	$("#editwherewework").submit(function(e){

		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/where-we-work-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//new research add
$(document).ready(function(){
	$("#addnewresearch").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('research_description', CKEDITOR.instances['research_description'].getData());
		

		$.ajax({
			url: APP_URL+"/new-research-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
             
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
				
					toastr.success(data.message)
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete research
$(".deleteresearch").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-research/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed event ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

$('.editresearch').on('click',function(){
	
    $('#edit_id').val($(this).data('id'));
   $('#edit_title').val($(this).data('title'));
   var my = $(this).data('image');
    $("#exampleModal #Image1").attr("src", my);
   
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
  
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModal').modal('show');
});


   



   
   
	
   
   
   
   


//edit research
$(document).ready(function(){
	$("#editresearch").submit(function(e){

		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/research-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message)
				}
				else{
					 
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//add case study
$(document).ready(function(){
	$("#addcasestudy").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('case_description', CKEDITOR.instances['case_description'].getData());
		

		$.ajax({
			url: APP_URL+"/case-study-added",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					
                   toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete case study
$(".deleteCasestudy").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			//
			//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-case-study/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed event ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end

//pop up edit box
$('.edit').on('click',function(){
	
   $('#edit_name').val($(this).data('title'));  //agadi ko form ma dekhaune id paxadi do edit button bata ako id
   $('#edit_id').val($(this).data('id'));
   



   CKEDITOR.instances['edit_description'].setData($(this).data('description'));


   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }	
   
   $('#exampleModalLong').modal('show');
});
//end

//edit case study
$(document).ready(function(){
	$("#editcasestudy").submit(function(e){

		e.preventDefault();
		
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_description', CKEDITOR.instances['edit_description'].getData());
		

		$.ajax({
			url: APP_URL+"/edit-case-study/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//add service
$(document).ready(function(){
	$("#addservice").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('description', CKEDITOR.instances['description'].getData());
		

		$.ajax({
			url: APP_URL+"/post-our-service",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 
                    toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//end

//delete our service
$(".deleteourservice").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			//
			//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-service/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed content ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
//end




$('.editservice').on('click',function(){
	
	//alert();
   $('#edit_name').val($(this).data('title'));
   $('#edit_id').val($(this).data('id'));
   var my = $(this).data('image');
    $("#exampleModalLong #Image1").attr("src", my);
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModalLong').modal('show');
});
  
   
   

// edit our service
$(document).ready(function(){
	$("#editservice").submit(function(e){

		e.preventDefault();
		
		var id=$(this).find('input[id="edit_id"]').val();
		
		
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/edit-service/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					
                       toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

$('.editservice').on('click',function(){
	
	//alert();
   $('#edit_name').val($(this).data('title'));
   $('#edit_id').val($(this).data('id'));
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   $('#exampleModalLong').modal('show');
  
   
   
});

//add news
$(document).ready(function(){
	$("#addnews").submit(function(e){
        //alert();
		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('news_description', CKEDITOR.instances['news_description'].getData());
		

		$.ajax({
			url: APP_URL+"/add-news",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 
                    toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

//delete news
$(".deletenews").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			//
			//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-news/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed content ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});

//pop up edit news box
$('.editnews').on('click',function(){
	
	//alert();
   $('#edit_name').val($(this).data('title'));
   $('#edit_id').val($(this).data('id'));
   $('#edit_source').val($(this).data('source'));

    var my = $(this).data('thumbnail');
    $("#exampleModalLong #Image1").attr("src", my);

     var myimage = $(this).data('single');
    $("#exampleModalLong #Image2").attr("src", myimage);

   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
 
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }

   
   
   $('#exampleModalLong').modal('show');
});

//edit news
$(document).ready(function(){
	$("#editnews").submit(function(e){

		e.preventDefault();
		
		var id=$(this).find('input[id="edit_id"]').val();
		
		
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/edit-news/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
              
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					
                       toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });




 $(document).ready(function(){
    var max_fields=100;
    var x=1;

    $("#add_field_button").on('click',function(e){
        e.preventDefault();
        if(x<max_fields){
            x++;
        $(".form-group1").append('<label for="exampleInputEmail1">Title*</label><input type="text" class="form-control"  name="service_title" ><br><div class="box box-info"><div class="box-header"><h3 class="box-title">Description*<small></small></h3><div class="pull-right box-tools"><button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"title="Collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body pad"><textarea class="form-control ckeditor" id="editor1" name="description" rows="10" cols="80"></textarea></div></div><label for="exampleInputFile"> Images*</label><input type="file" id="exampleInputFile" name="service_image" ><p class="help-block">Example block-level help text here.</p><button type="button" onClick="remove()" class="remove_field"><i class="fa fa-remove" aria-hidden="true"></i>Remove</button><br><br>');    
        }
    });
     

   
    function remove(){
    	alert();
    }

});

 $(document).ready(function(){
	$("#addpartnerfe").submit(function(e){
        //alert();
		e.preventDefault();
		var formdata= new FormData(this);
		
		

		$.ajax({
			url: APP_URL+"/add-call-partner",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 
                    toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

 $(document).ready(function(){
	$("#addstory").submit(function(e){

		e.preventDefault();

		var formdata= new FormData(this);
		formdata.append('intro', CKEDITOR.instances['intro'].getData());
		
		

		$.ajax({
			url: APP_URL+"/add-our-story",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					
                         toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });


$('.editstory').on('click',function(){
	
	
   $('#edit_name').val($(this).data('title'));
   $('#edit_id').val($(this).data('id'));
   var myImage = $(this).data('image');
    $("#exampleModalLong #Image").attr("src", myImage);

   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   
   
   
   $('#exampleModalLong').modal('show');
});

$(document).ready(function(){
	$("#editstory").submit(function(e){

		e.preventDefault();
		//alert();
		 var id=$(this).find('input[id="edit_id"]').val();

		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/edited-our-story/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					//formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					
                       toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });
//  

 $(document).ready(function(){
	$("#addmission").submit(function(e){

		e.preventDefault();

		var formdata= new FormData(this);
		formdata.append('intro', CKEDITOR.instances['intro'].getData());
		
		

		$.ajax({
			url: APP_URL+"/post-mission",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					
                         toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

 $('.editmission').on('click',function(){
	
	
   $('#edit_name').val($(this).data('title'));
   $('#edit_id').val($(this).data('id'));
   var myImage = $(this).data('image');
    $("#exampleModalLong #Image").attr("src", myImage);

   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
   
   
   
   $('#exampleModalLong').modal('show');
});

 $(document).ready(function(){
	$("#editmissiinnibchuh").submit(function(e){


		e.preventDefault();
		//alert();
		 var id=$(this).find('input[id="edit_id"]').val();

		
		//var id=$(this).find('input[data-id="edit_id"]').val();
		//xalert(id);
		
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		

		$.ajax({
			url: APP_URL+"/edit-mission/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					//formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 // formMessage.html('').removeClass('alert-success').addClass('alert-warning');
					
                       toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

 $(".deletepartner").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			//
			//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-partner/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed content ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});


 $(document).ready(function(){
	$("#editpartner").submit(function(e){

		e.preventDefault();
		// var id=$(this).find('input[id="edit_id"]').val();
		var id=$(this).data('id');
		var formdata= new FormData(this);
		
		

		$.ajax({
			url: APP_URL+"/post-partner/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message)
				}
				else{
					
      toastr.erro(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });


 $('.editslider').on('click',function(){
	
	
   $('#edit_title').val($(this).data('title'));
   $('#edit_id').val($(this).data('id'));
   var myImageId = $(this).data('image');
    $("#exampleModal #myImage").attr("src", myImageId);
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('info'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }

   
   
   
   
   
   $('#exampleModal').modal('show');
});


 $(document).ready(function(){
	$("#editsliderimage").submit(function(e){
		//alert();
		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		
		

		$.ajax({
			url: APP_URL+"/slider-image-edited/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success('You have succesfully edited ', 'Congratulations', {timeOut: 5000})
				}
				else{
					
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });


$(document).ready(function(){
	$("#addadmin").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		
		
		

		$.ajax({
			url: APP_URL+"/add-admin",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 
                         toastr.warning(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

 $(".deleteadmin").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			//
			//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-admin/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed content ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});


  $(".upgradetosuper").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			//
			//alert(id);
		 $.ajax({
		 	url:APP_URL+'/change-to-super/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		//$('.item'+data['id']).remove();
		 		toastr.success('Admin power changed to Super ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});
  $(".degradetoadmin").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
			//
			//alert(id);
		 $.ajax({
		 	url:APP_URL+'/change-to-admin/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		//$('.item'+data['id']).remove();
		 		toastr.success('Power degraded to only Admin ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});


$(document).ready(function(){
	$("#addvideo").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('description', CKEDITOR.instances['description'].getData());
		
		

		$.ajax({
			url: APP_URL+"/add-video",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 
                         toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

$(".deletevideo").on('click',function(e){

		e.preventDefault();
		//alert();
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-video/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully removed video ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});

 $('.editvideo').on('click',function(){
	
	
   $('#edit_title').val($(this).data('title'));
   $('#edit_link').val($(this).data('link'));
   $('#edit_runtime').val($(this).data('runtime'));
     $('#edit_image').val($(this).data('image'));
   $('#edit_id').val($(this).data('id'));
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }

   
   
   
   
   
   $('#exampleModal').modal('show');
});

 $(document).ready(function(){
	$("#editvideo").submit(function(e){
		
		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		
		

		$.ajax({
			url: APP_URL+"/edit-video/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success('You have succesfully edited ', 'Congratulations', {timeOut: 5000})
				}
				else{
					 
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

 $(document).ready(function(){
	$("#addbook").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		formdata.append('book_description', CKEDITOR.instances['book_description'].getData());
		
		

		$.ajax({
			url: APP_URL+"/add-book",
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 
                         toastr.error(data.error, {timeOut: 5000})
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });

$(".deletebook").on('click',function(e){

		e.preventDefault();
		
		var id=$(this).data('id');
		//alert(id);
		 $.ajax({
		 	url:APP_URL+'/delete-book/'+id,
		 	method:'GET',
		 	dataTy:'json',
		 	
		 	success:function(data){
		 		//alert(data);
		 		$('.item'+data['id']).remove();
		 		toastr.success('You have succesfully deleted ', 'Congratulation', {timeOut: 5000})
		 	}
		 });
	});

 $('.editbook').on('click',function(){
	
	
   $('#edit_title').val($(this).data('title'));
   $('#edit_price').val($(this).data('venue'));
  
   $('#edit_id').val($(this).data('id'));

   var myImageId = $(this).data('image');
    $("#exampleModal #myImage").attr("src", myImageId);
   
   CKEDITOR.instances['edit_desc'].setData($(this).data('description'));
   
   for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }

   
   
   
   
   
   $('#exampleModal').modal('show');
});

 $(document).ready(function(){
	$("#editbook").submit(function(e){
		
		e.preventDefault();
		var id=$(this).find('input[id="edit_id"]').val();
		var formdata= new FormData(this);
		formdata.append('edit_desc', CKEDITOR.instances['edit_desc'].getData());
		
		

		$.ajax({
			url: APP_URL+"/edit-book/"+id,
			method:'POST',
			data: formdata,
			processData:false,
			contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},
			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					// formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					toastr.success('You have succesfully edited ', 'Congratulations', {timeOut: 5000})
				}
				else{
					
      toastr.error(data.error)
				}
				$("html, body").animate({ scrollTop: 0 });
			}
		});
	});
 });





 $(document).ready(function() {
	var buttonadd = '<span class="col-md-2 to-right"><button class="btn btn-success btn-add" type="button"><span class="fa fa-plus">+</span></button></span>';
    var rowclone = '<div class="rowclonned">'+$(".wh").html()+'</div>';


    $(".wh").html(rowclone).after('<div class="row rowclone"></div>');

	
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        $(".rowclone").append(rowclone);
        

        $(this).removeClass('btn-add').addClass('btn-remove').removeClass('btn-success').addClass('btn-danger').html('<span class="fa fa-minus">Remove</span>');
    }).on('click', '.btn-remove', function(e) {
        $(this).parents('.rowclonned').remove();
    	e.preventDefault();
    	return false;
    });
});