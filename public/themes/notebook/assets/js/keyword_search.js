$(document).ready(function() {

	$("input[id^='check-'").each(function(){
		var field = $(this).attr('id').split('-')[1];
		$(this).click(function(){
			$("#keyword-"+field).toggle('fast');
		})
	});

});