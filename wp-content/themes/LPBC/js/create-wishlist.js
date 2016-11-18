jQuery(document).ready(function($) {
	$('.creation-wishlist').submit(function(e){
	    	e.preventDefault();
	    	console.log(e);
	    	var name = $(this).children('input:first').val();
	    	var postID = $('.post_id').val();
	    	alert(name);
			$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: ajax_create_wishlist_object.ajaxurl,
	            data: { 
	                'action': 'create_wishlist', //calls wp_ajax_nopriv_ajaxlogin
	                'wishlist_name': name, 
	                'postID': postID
	            },
	            success: function(data){
	            	console.log(data);
	            	if(data.status == 'ok'){
	            		let message = data.action;
	            		$('.basic').html(message + '<i class="fa fa-check" aria-hidden="true" style="color:#eece84;"></i></span>');
	            	} else {
	            		$('.basic').html(message);
	            	}
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
			        console.log(xhr.status);
			        console.log(ajaxOptions);
			        console.log(thrownError);
			      }
        	});
	});
});


