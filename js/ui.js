$(document).ready(function(){
	$(".overlay").css("height", $( document ).height());
	$(".sidebar").css("height", $( document ).height());
	// $(".sidebar").css("height",window.innerHeight);
	var setWidth = $(window).width() - $(".sidebar").width();
	$(".search-results").css("width",setWidth);
	$(".slideOut").css("height", $( document ).height());
});
