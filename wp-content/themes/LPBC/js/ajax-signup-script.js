jQuery(document).ready(function($) {
	$('#registerusers').submit(function(e){
	    	e.preventDefault();
	    	console.log(e);
	    	var username = $(this).children('.group:nth-child(1)').children('input:first').val();
	    	var email = $(this).children('.group:nth-child(2)').children('input:first').val();
	    	var mdp = $(this).children('.group:nth-child(3)').children('input:first').val();
	    	var mdp_conf = $(this).children('.group:nth-child(4)').children('input:first').val();
	    	var security = $(this).children('#security').val();

			$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: ajax_signup_object.ajaxurl,
	            data: { 
	                'action': 'signup', //calls wp_ajax_nopriv_ajaxlogin
	                'username': username, 
	                'email': email,
	                'password': mdp,
	                'password_conf': mdp_conf, 
	                'security': security
	            },
	            success: function(data){
	            	console.log(data);
	                if (data.loggedin == true){
	                    document.location.href = ajax_signup_object.redirecturl;
	                }
	            }
        	});
	});
});


