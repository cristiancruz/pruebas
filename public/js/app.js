
$(document).ready(function(){
	
	setTimeout(function() {$(".mensajesAll").fadeOut(1500);},5000);

	$('.move-menu').click(function(){
             $('#page-wrapper').toggleClass('move');
            $('.navbar-default .sidebar').toggleClass('ocultar');
           
	});

	
});