$(function(){
	var scrollPosition;
	$("#modal-01").on("click", function() {
		scrollPosition = $(window).scrollTop();
		$('body').addClass('fixed').css({'top': -scrollPosition});
	});
	$(".modalCloser").on("click", function() {
		$('body').removeClass('fixed').css({'top': 0});
		window.scrollTo( 0 , scrollPosition );
	});
});
