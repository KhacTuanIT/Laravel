////////////////////////////////////////////////
window.onscroll = function() {scrollPage()}; 
////////////////////////////////////////////////


var navbar = document.getElementById("navbar");
var startFunc = navbar.offsetTop + 5;
function scrollPage() {
	if(window.pageYOffset >= startFunc) {
		$(".navbar").css("padding","3px 20px");
		$(".navbar").css("width","100%");
	} else {
		$(".navbar").css("padding","20px 20px");
		$(".navbar").css("width","100%");
	}
}