$(document).ready(function () {

	$("#button-connect").click(function (){
		$("aside").fadeToggle(".2", "linear");
	});
    
    $("#close-connect").click(function (){
		$("aside").fadeToggle(".2", "linear");
	});
    
});

$(window).load(function(){
    var $container = $('.article_container');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'ease-in-out',
            queue: false
        }
    });
 
    $('.article_filter a').click(function(){
        $('.article_filter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'ease-in-out',
                queue: false
            }
         });
         return false;
    }); 
});