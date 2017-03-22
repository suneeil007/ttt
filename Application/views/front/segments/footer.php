<div class="footer">

<div class="container" style="padding-bottom:20px;">
<div class="row">



<div class="col-md-8">

<div class="side-icon-wrapper">


 
<div class="youtubeBox">

<h3 style="text-align:left;">Clinet Reviews</h3>

  <?php if(isset($testiFront) && count($testiFront)>0) { ?>
		<?php foreach($testiFront as $blog) { ?>
<div>

<img class="img-circle1" src="<?php echo base_url().TESTIMONIALS_DIR.'/'.$blog->filename ;?>">



<h4 style="text-align:left; margin-top:40px;"><b><?php echo $blog->name; ?> says..</b> </h4>

<p class="review"><?php echo $blog->comments; ?>
</p>
</div>
<?php  } ?>

<?php  } ?>

<div class="CB"></div>

<a href="<?php echo base_url().'pages/'.decode_title($test->title).'/'.$test->id;?>" class="btn btn-default"  style="width:100px; float:right; color:#666;">View all</a>

</div><!--/youtubeBox-->



</div><!--side icon wrapper-->




</div>





<div class="col-md-4" style="float:right !important;">

<!--            <a class="twitter-timeline"  href="https://twitter.com/Taan_News" data-widget-id="540352607575748608">Tweets by @Taan_News</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->
<a class="twitter-timeline"
  data-widget-id="600720083413962752"
  href="https://twitter.com/TwitterDev"
  width="320"
  height="300" style="float:right;">
Tweets by @TwitterDev
</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>






</div>

</div><!--row end-->

</div><!--contener footer end-->

<div class="footer-bottom" style="height:auto; background:#f5f5f5;">
<div class="container" style="padding:20px 0 50px 0;">
<div class="row">

<div class="col-md-4 discover1">

<h3 style="text-align:left; color:#037bc8;">Blog Updates</h3>

<ul>


  <?php if(isset($blogFront) && count($blogFront)>0) { ?>
		<?php foreach($blogFront as $blog1) { ?>

<li>
<div class="thumb" style="float:left; padding-right:20px;">
<a title="Amazing Places" href="#">
<img class="attachment-widget-thumb wp-post-image" width="95" height="95" alt="1" src="<?php echo base_url().BLOG_DIR.'/'.$blog1->image ;?>">
</a>
</div>
<div class="description009">
<h5 class="title">
<a title="Amazing Places" href="<?php echo base_url().'cms/blog_details/'.$blog1->id;?>"> <?php echo $blog1->title; ?></a>
</h5>
<p><?php echo word_limiter ($blog1->description, 17) ?></p>
<span class="date"><?php echo $blog1->date; ?></span>
</div>
</li>
<div class="CB" style="clear:both; height:20px;"></div>
<? } ?>

<? } ?>



<!--<li>
<div class="thumb" style="float:left; padding-right:20px;">
<a title="Amazing Places" href="#">
<img class="attachment-widget-thumb wp-post-image" width="95" height="95" alt="1" src="<?php echo base_url()?>assets/front/images/news.png">
</a>
</div>
<div class="description009">
<h5 class="title">
<a title="Amazing Places" href="http://www.soaptheme.net/wordpress/travelo/amazing-places/">Nepal seems safe for trekker</a>
</h5>
<p>Purus ac congue arcu cursus ut vitae pulvinar massaidp. Lorem</p>
<span class="date">November 11, 2014</span>
</div>
</li>-->



</ul>


</div>

<div class="col-md-3 discover">

<h3 style="text-align:left; color:#037bc8;">Quick Contact</h3>

 <form role="" style="margin-top:8px; padding:0;" action"">
<div class="form-group">
    <label for="email">Name:</label>
    <input type="email" class="form-control-F" id="email">
  </div>
<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control-F" id="email">
  </div>
  <div class="form-group">
    <label for="email">Phone:</label>
    <input type="email" class="form-control-F" id="email">
  </div>
 <div class="form-group">
    <label for="comment">Description:</label>
  <textarea class="form-control-FD" rows="4" id="comment"></textarea>
  </div>


  <button type="submit" id ="adsf" class="btn btn-default" style="width:218px; margin-left:83px;">Submit</button>


</form>



</div>


<div class="col-md-2 discover" style="width:11%;">

<h3 style="text-align:left; color:#037bc8;">Discover</h3>

<ul>
<li><a href="<?php echo base_url().'pages/'.decode_title($aboutNepal->title).'/'.$aboutNepal->id;?>" />About Nepal</a></li>


<li><a href="<?php echo base_url().'pages/'.decode_title($travellingInfo->title).'/'.$travellingInfo->id;?>" />Travelling Info</a></li>


<li><a href="<?php echo base_url().'pages/'.decode_title($safety->title).'/'.$safety->id;?>" />Safety</a></li>


<li><a href="" />Trekking Guide</a></li>


<li><a href="<?php echo base_url()?>tour/blog" />Blog</a></li>


<li><a href="<?php echo base_url().'pages/'.urldecode(url_title($travelling_gallery->title)).'/'. $travelling_gallery->id;?>" />Travelling Gallery</a></li>


</ul>


</div>


<div class="col-md-2 discover" style="width:13%;" >

<h3 style="text-align:left; color:#037bc8;">Contact Info</h3>

<p class="PCON">We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>

<p>Vaishali Marg,Thamel
Kathmandu, Nepal
01-4700401

info@himalayahub.com
</p>


</div>






</div><!--row end-->
</div><!--container end-->

</div>


<div class="footer-bottom" style="height:35px; background:#DDDDDD;">
<div class="container ">
<div class="row">

<div class="col-md-8 col-sm-8" style="height:20px;">

<p class="PCON1">&copy; Himalaya Hub Pvt. ltd. <?php echo date("Y") ?> All right reserved.</p>

<p class="PCON2">Powered by  : :  Karuna Technology</p>

</div><!--copyright end-->


<div class="col-md-5 col-sm-5 ">
  




</div>





<div class="col-md-3 col-sm-3 design-wrap">



</div><!--copyright end-->

</div><!--row end-->
</div><!--container end-->

</div><!--footer bottom-->



</div><!--footer end-->

<a href="#top"></a>


<style>

.discover {margin-left:56px;}
.discover ul{margin:0; padding:0;}

.discover ul li{ list-style:none; line-height:30px; font-size:14px; }

.discover ul li a{color:#000; text-decoration:none; padding-left:16px;}

.discover ul li a:hover{color:#3492C8;}

.discover ul li::before {
    color: #2c3e50;
    content: "";
    font-family: FontAwesome;
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
    left: 0;
    position: absolute;
    text-decoration: inherit;
    
}
.date{float:left; font-size:11px !important; line-height:1px;}


.discover1 ul{margin:0; padding:0;}

.discover1 ul li{ list-style:none; line-height:30px; font-size:14px; }

.discover1 ul li a{ font-size:16px; }

.discover1 ul li p{ font-size:14px; line-height:16px;}

.discover1 li .description span.date {
    display: block;
    font-size: 0.9133em;
    margin-top: 5px;
}
.discover1  li .date {
    color: #9e9e9e;
}
label{font-size:12px; font-weight:normal; float:left; width:84px; margin-top:4px;}

.form-group{margin-bottom:8px;}

#twitter-widget-0{float:right !important;}


.img-circle1 { width:120px !important; height: 120px; border-radius: 150px; -webkit-border-radius: 150px; -moz-border-radius: 150px; float:left; margin:5px 40px 10px 5px;}

.PCON{font-size:11px; }
.PCON1{color:#000; width:360px; float:left; font-size:12px; display:block;}

.PCON2{color:#000; width:360px; float:left; font-size:12px; display:block; text-align:right;}

 .form-control-F {
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 30px;
    margin-bottom:5px;
    width: 216px;
}

 .form-control-FD {
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 60px;
    width: 216px;
}


</style>


<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('9172-587-10-1700');/*]]>*/</script><noscript><a href="https://www.olark.com/site/9172-587-10-1700/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->

    
</body>
</html>