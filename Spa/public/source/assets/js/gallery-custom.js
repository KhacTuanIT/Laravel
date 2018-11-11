$(document).ready(function(){

    $(".btn-gallery").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "*")
        {
            //$('.filter').removeClass('hidden');
            $('.grid-item').show('1000');
        }
        else
        {
            $(".grid-item").not('.'+value).hide('3000');
            $('.grid-item').filter('.'+value).show('3000');
        }
	    
	    if ($(".btn-gallery").removeClass("current")) {
			$(this).removeClass("current");
		}
		$(this).addClass("current");
    });

});