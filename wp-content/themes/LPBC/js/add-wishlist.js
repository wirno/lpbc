jQuery(document).ready(function($) {
	$('#addtowishlist').click(function(e){
	    	e.preventDefault();
	    	console.log(e);
	    	var link = $(this);
	    	var num = $(this).attr('data-num_wishlist');
	    	var postID = $('.post_id').val();
	    	var name = $(this).parent().parent().children('.left').html();	    	
			$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: ajax_add_wishlist_object.ajaxurl,
	            data: { 
	                'action': 'add_wishlist', //calls wp_ajax_nopriv_ajaxlogin
	                'wishlist_num': num,
	                'postID': postID,
	                'name': name 
	            },
	            success: function(data){
	            	console.log(data);
	            	if(data.status == 'ok'){
	            		let message = data.action;
	            		$('.basic').html(message + '<i class="fa fa-check" aria-hidden="true" style="color:#eece84;"></i></span>');
	            		location.href = link.attr('href');
	            		if(data.action == 'Supprimer') {
	            			link.html('Ajouter');
	            		} 
	            		if(data.action == 'Ajouter'){
	            			link.html('Retirer');
	            		}
	            	} else {
	            		$('.basic').html('Une erreur est survenue');
	            		location.href = link.attr('href');
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


