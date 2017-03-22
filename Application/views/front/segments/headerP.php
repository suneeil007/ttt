<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="x-ua-compatible" content="IE=8">
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="YES" />
<link rel="apple-touch-icon" href="http://www.taan.org.np/assets/images/favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta property='og:title' content='<?php if(isset($title)) echo $title ;?>'/>
    <meta property='og:description' content="Easiest way to find job, careers, candidates or job-seekers, post unlimited vacancy, send direct job offers, job request on free of cost.">
    <meta property='og:url' content='http://<?php echo($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>'/>
	<meta property='og:site_name' content=''/>
	<meta property='og:type' content='article'/>
    <meta property="og:image" content="<?php echo base_url();?>assets/front/images/hiremeee_logo.jpg" />
<link rel="icon" type="image/png" href="images/android-icon-36x36.png">
<title><?php if(isset($product_detail)) echo $product_detail->name ;?></title>

<?php $this->load->view('front/segments/scripts'); ?>
<style>
.header-fixed{z-index:99999999999999999999 !important;}
</style>
</head>
<body>


<div class="header">

<div class="top-header">
<div class="container">

<div class="row">
<div class="col-md-5 col-sm-5" style="height:30px;">

<p class="nepal-flag">Nepal Hope for Best</p>

</div>

<div class="col-md-7 col-sm-7" style="height:30px;">
<ul class="social-wrap text-right">
    <li><a href="" class="fb" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <li><a href="" class="tw" target="_blank"><i class="fa fa-twitter"></i></a></li>
<!--<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>-->

<div class="clearfix"></div>
</ul>

</div>



</div>


</div>
</div><!--top header end-->


<div class="container" style="width:1170px;">
<div class="row">
<div class="col-md-4 col-sm-4   logo" style="height:103px; margin-top:12px;">
<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>assets/front/images/logo.png" alt="taan-logo" height="90" /></a>
</div><!--row end-->


<div class="contactInfo">

</div><!--end of contactInfo-->

<!--
<div class="topMenu">
<ul>
<?php echo $this->dynamic_menu->build_menu('1'); ?>
</ul>
</div>/end of topmenu-->
</div><!--logo end-->


</div><!--container end-->
</div><!--header end-->

<div class="header-fixed">
<div class="menu-wrap top-nav">
<div class="container">
<div class="row">

<div class="col-md-9 col-sm-12">

<div class="Test" style="width:29%; float:left;">

<ul class="menu">
<li><a href="<?php echo base_url().'pages/'.decode_title($home->title).'/'.$home->id;?>">Home</a>






</li>


<li>

<ul>
  <li><a href="<?php echo base_url().'pages/'.decode_title($intro->title).'/'.$intro->id;?>">Himalaya Hub Introduction</a></li>
  <li><a href="<?php echo base_url().'pages/'.decode_title($team->title).'/'.$team->id;?>">Our Team</a></li>
  <li><a href="<?php echo base_url().'pages/'.decode_title($legal->title).'/'.$legal->id;?>">Legal Documents and Affiliation</a></li>
  <li><a href="<?php echo base_url().'pages/'.decode_title($whyUs->title).'/'.$whyUs->id;?>">Why us?</a></li> 
</ul>

</li>


<li><a href="<?php echo base_url().'pages/'.decode_title($guide->title).'/'.$guide->id;?>">Trekking Guide</a></li>

<li><a href="<?php echo base_url().'tour/'.('blog')?>">Blog</a></li>
</ul>


</div>






<?php echo $this->categories->build__category_menu(); ?> 




</div>

</div><!--col end-->

</div><!--row end-->
</div><!--container end-->
</div>
</div>


