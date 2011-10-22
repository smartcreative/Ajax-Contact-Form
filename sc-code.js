jQuery(document).ready(function($){
	$('#sc-contactform').submit(function(){
		var action = $(this).attr('action');
		$("#message").slideUp(750,function() {
			$('#message').hide();
			$('#sc-submit')
				.after('<img src="ajax-loader.gif" class="loader" />')
				.attr('disabled','disabled');
			$.post(action, $("#sc-contactform").serialize(),
				function(data){
					document.getElementById('message').innerHTML = data;
					$('#message').slideDown('slow');
					$('#sc-contactform img.loader').fadeOut('slow',function(){$(this).remove()});
					$('#sc-contactform #sc-submit').removeAttr('disabled'); 
					if(data.match('success') != null) $('#sc-contactform').slideUp('slow');
				}
			);
		});
		return false;
	});
});