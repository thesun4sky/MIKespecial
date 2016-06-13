////////////////////////////////////////////////////////메뉴 애니메이션

var speed = 500;
var header = 0;

$(window).scroll(function(){
    if($(document).scrollTop() > 0) {
		if(header == 0) {
           header = 1;
            $('#header-inner').stop().animate({ marginTop:'0px' }, 200);
            $('#header').stop().animate({backgroundColor:'rgba(255,255,255,0.5)'}, 200);
        }
    } else {
		if(header == 1) {
           header = 0;
           $('#header-inner').stop().animate({ marginTop: '20px' }, 200);
			$('#header').stop().animate({backgroundColor:'transparent'},200);
        }  
    }
});

$(window).load(function () {

    $('*[data-button]').click(function() {
       $('html, body').animate({
          scrollTop: $('*[data-section="'+$(this).attr('data-button')+'"]').offset().top
       }, speed);
    });
	

    function resize(){
        $('.tab').height(window.innerHeight);
	    $('.tab-headline').each(function(index, element) {
	    $(this).css('margin-left',-$(this).width()/2);
	    $(this).css('margin-top',-$(this).height()/2);	
	    });	
	    }

    $( window ).resize(function() {
    resize();
    });

    resize();

    });
	


////////////////////////////////////////////////////////main 바 애니메이션


$(window).load(function () {

    $('.first-slice').animate({ left: '0px' }, 800, 'swing');
        
});




/////////////////////////////////////////////////login 관련

    $('.login-click').click(function () {
        $('#login-form').show();
        $('#login-cover').show();
    });

    $('.login-exit').click(function () {
        $('#login-form').hide();
        $('#login-cover').hide();
    });
	
	
	////////////////////////////////////////////////////////모바일 사이드바


$(window).load(function () {

    $('.m-menu').click(function () {
        $('.m-side-back').fadeIn();
        $('.m-sidemenu').animate({left:'0'},300);
    });
	$('.m-side-back').click(function () {
        $('.m-side-back').fadeOut();
        $('.m-sidemenu').animate({left:'-230'},300);
    });
	  
	  
});
	
