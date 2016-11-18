jQuery(document).ready(function($) {
	$('#fav').on('click', function(e){
		e.preventDefault();
		var postID = $('.post_id').val();
		var link = $(this);
			$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: ajax_fav_object.ajaxurl,
	            data: { 
	                'action': 'manage_fav', //calls wp_ajax_nopriv_ajaxlogin
	                'postID': postID
	            },
	            success: function(data){
	            	console.log(data);
	            	if(data.status == 'ok'){
	            		let message = data.action;
	            		$('.basic').html(message + '<i class="fa fa-check" aria-hidden="true" style="color:#eece84;"></i></span>');
	            		location.href = link.attr('href');
	            		if(data.action == 'Supprimer') {
	            			console.log(link.html());
	            			link.html('Ajouter aux favoris');
	            		} 
	            		if(data.action == 'Ajouter'){
	            			console.log(link.html());
	            			link.html('Retirer des favoris');
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