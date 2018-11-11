var hsTop = document.getElementById("h-service").offsetTop;
window.addEventListener('scroll', function(e) {
	wow = new WOW(
  	{
    	animateClass: 'animated',
    	offset:       200,
  	});
	if( $(window).scrollTop() < (hsTop-650) ) {
        $('.wow').removeClass('animated');
        $('.wow').removeAttr('style');
        wow.init();
    }
});