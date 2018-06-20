
jQuery(document).ready(function(){
	jQuery("#contact_us").submit(function(e){

		e.preventDefault();

		jQuery.ajax({
			
			method:'POST',
			data: $("#contact_us").serialize(),

			url: APP_URL+"/send_message",
			 
			processData:false,
			// contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},

			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
				}
				else{
					 formMessage.html('').removeClass('alert-success').addClass('alert-warning');
					 formMessage.append($('<ul>'));
					 var ul = formMessage.find('ul').first();
					 $.each(data.error,function(k,v){
                        ul.append($('<li>').text(v));
                     });
                    formMessage.show();
				}
			},
			error: function(a,b,c){
				debugger;
			}
		});
	});
 });

//apply job
$(document).ready(function(){
	$("#applyjob").submit(function(e){

		e.preventDefault();
		var formdata= new FormData(this);
		jQuery.ajax({
			
			method:'POST',
			data: formdata,

			url: APP_URL+"/job-applied",
			 
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
					formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
					//toastr.success(data.message, {timeOut: 5000})
				}
				else{
					 formMessage.html('').removeClass('alert-success').addClass('alert-warning');
					 formMessage.append($('<ul>'));
					 var ul = formMessage.find('ul').first();
					 $.each(data.error,function(k,v){
                        ul.append($('<li>').text(v));
                     });
                    formMessage.show();
				}
			},
			error: function(a,b,c){
			}
		});
	});
 });




 $('.bp-btn').on('click',function(){
	alert();
   $('#business_name').val($(this).data('business'));
   $('#partner_type').val($(this).data('partner'));
  
	
   
   
   
});


 jQuery(document).ready(function(){
	jQuery("#beapartner").submit(function(e){

		e.preventDefault();

		jQuery.ajax({
			
			method:'POST',
			data: $("#beapartner").serialize(),

			url: APP_URL+"/partner-applied",
			 
			processData:false,
			// contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},

			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
				}
				else{
					 formMessage.html('').removeClass('alert-success').addClass('alert-warning');
					 formMessage.append($('<ul>'));
					 var ul = formMessage.find('ul').first();
					 $.each(data.error,function(k,v){
                        ul.append($('<li>').text(v));
                     });
                    formMessage.show();
				}
			},
			error: function(a,b,c){
				debugger;
			}
		});
	});
 });


  jQuery(document).ready(function(){
	jQuery("#newscomment").submit(function(e){

		e.preventDefault();

		jQuery.ajax({
			
			method:'POST',
			data: $("#newscomment").serialize(),

			url: APP_URL+"/comment",
			 
			processData:false,
			// contentType:false,
			headers:{
               // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //'X-CSRF-TOKEN': X_CSRF_TOKEN 
			},

			success: function(data){
				var formMessage= $('.form-message');
				if($.isEmptyObject(data.error)){
					formMessage.removeClass('alert-warning').addClass('alert-success').text(data.message).show();
				}
				else{
					 formMessage.html('').removeClass('alert-success').addClass('alert-warning');
					 formMessage.append($('<ul>'));
					 var ul = formMessage.find('ul').first();
					 $.each(data.error,function(k,v){
                        ul.append($('<li>').text(v));
                     });
                    formMessage.show();
				}
			},
			error: function(a,b,c){
				debugger;
			}
		});
	});



	$('#search').on('keyup',function(){
        //As the user types his search keyword, send request to the server to fetch news matching this keyword
        $value = $(this).val();
        //Send request only if there the keyword is not empty 
        if ($value.length > 1){
            $.ajax({
 
             type : 'get',
 
             url : APP_URL+'/search',
 
             data:{'search':$value},
 
             success:function(data){
				debugger;
                //Reset the list of news to blank
                $('.search-results').html('');
                //If search is succesfull
                if (data){
                	debugger;
                    //For each news items create an li with link and append in to search-results ul in news.blade.php under search box
                    $.each(data,function(key,value){
                        var link = $('<a>').attr('href',value.url).text(value.title);
                        var li = $('<li>').append(link);
                        $('.search-results').append(li);
                    });
                }else{
                    //If no results are found reset the list to blank
                    var li = $('<li>').text('No results found').append(link);
                    $('.search-results').append(li);
                }
  
             },
             error: function(error){
             	debugger;
             }
 
            });
        }else{
            //If keyword is empty reset list to blank
            $('.search-results').html('');
        }
    });



 });





