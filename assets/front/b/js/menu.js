var ww;
$(document).ready(function() {
	$(".menu li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
		};
	})
	ww = document.body.clientWidth;
	$(".toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(".menu").slideToggle(800);
	});
	adjustMenu();
})

$(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 768) {
		$(".toggleMenu").css("display", "inline-block");
		if (!$(".toggleMenu").hasClass("active")) {
			$(".menu").hide();
		} else {
			$(".menu").show();
		}
		$(".menu li").unbind('mouseenter mouseleave');
		$(".menu li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 768) {
		$(".toggleMenu").css("display", "none");
		$(".menu").show();
		$(".menu li").removeClass("hover");
		$(".menu li a").unbind('click');
		$(".menu li").unbind('mouseenter').bind('mouseenter', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).toggleClass('hover');
		});
		
		$(".menu li").unbind('mouseleave').bind('mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).removeClass('hover');
		});
	}
}


    $(".menu li").on('mouseenter mouseleave', function (e) {

        var elm = $('ul:first', this);
        var off = elm .offset();
        var l = off.left;
        var w = elm.width();
        var docH = $(".container").height();
        var docW = $(".container").width();

        var isEntirelyVisible = (l+ w <= docW);
                 
        if ( ! isEntirelyVisible ) {
            $(this).addClass('edge');
        } else {
            $(this).removeClass('edge');
        }
    });
