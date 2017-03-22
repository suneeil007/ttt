
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/bootstrap.min.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/style.css"/>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/flex.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/flex-event.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/live.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/added.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/responsive.css"/>

<script src="<?php echo base_url();?>assets/front/js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.innerfade.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/handlebars.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/stickyMenu.js"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.

        $('.header-fixed').scrollToFixed();


        });

</script>



<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/menu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.flexslider.js"></script>



<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $('#homepage-slider').flexslider({
			animation: "fade",              //String: Select your animation type, "fade" or "slide"
			slideshow: true,                //Boolean: Animate slider automatically
			slideshowSpeed: 8500,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationDuration: 250,         //Integer: Set the speed of animations, in milliseconds
			directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
			controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			pauseOnHover: true            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
	    });
	});
	</script>
    
    

    
<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $('#event-containers').flexslider({
			animation: "slide",              //String: Select your animation type, "fade" or "slide"
			slideshow: true,                //Boolean: Animate slider automatically
			slideshowSpeed: 8500,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationDuration: 250,         //Integer: Set the speed of animations, in milliseconds
			directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
			controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			pauseOnHover: true            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
	    });
	});
	</script>    
    
  
 <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.vticker.js"></script>
<script type="text/javascript">
$(function(){
	$('#news-container').vTicker({ 
		speed: 500,
		pause: 3000,
		animation: 'fade',
		mousePause: true,
		showItems: 7
	});
});
</script>  


 


<script type="text/javascript">
$('.article-content:last').css({"border-bottom":"none"});
$('.news-package:last').css({"border-bottom":"none"});

</script>



<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.fancybox.pack.js"></script>

<script>
    $(document).ready(function() {
        $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
        $('.fancybox').fancybox();
    });
</script>


