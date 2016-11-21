jQuery(document).ready(function($) {
	$('.connection-form').submit(function(e){
	    	e.preventDefault();
	    	console.log(e);
	    	var login = $(this).children('.group:nth-child(1)').children('input:first').val();
	    	var mdp = $(this).children('.group:nth-child(2)').children('input:first').val();
	    	var security = $(this).children('#security').val();
	    	
			$.ajax({
	            type: 'POST',
	            dataType: 'json',
	            url: ajax_login_object.ajaxurl,
	            data: { 
	                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
	                'username': login, 
	                'password': mdp, 
	                'security': security
	            },
	            success: function(data){
	                if (data.loggedin == true){
	                    document.location.href = ajax_login_object.redirecturl;
	                }
	            }
        	});
	});
});


