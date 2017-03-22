<script src="<?php echo base_url();?>assets/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>		
<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
	$("#image-gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:5000, autoplay_slideshow: true});	
	
		$(".galleryone:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:5000, autoplay_slideshow: true});	

	
	$(".videogallery-div: a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});			
		});
	</script>	
<link rel="stylesheet" href="<?php echo base_url();?>assets/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
   
    
<?php if(isset($breadcrumb)) echo $breadcrumb ; ?>
 <div id="image-gallery">
			<?php if(count($galleryimages)>0): ?>
			<?php $t = 0;?>
			<?php foreach($galleryimages as $images): $t++;	?>
			<div id="img<?=$images->id?>" class="img_single"  <?php  if($t%5==0) echo ' style="margin-right:0;"' ?>>  
				<a href="<?php echo base_url().GALLERIES_DIR.'/'.$images->image ;?>" rel="prettyPhoto[gallery]" title="">
                <img src="<?php echo base_url().GALLERIES_DIR.'/'.$images->image ;?>"/></a>			
			<br/>			
			<!--	<div style="margin-top:5px;font-size:10px;line-height:10px;"><label><?php echo  $images->caption ; ?></label></div> -->
			</div>
				<?php if($t%5==0){?>
			
            <div class="CB"></div>

			<?php }?>
			<?php endforeach;?>
			<?php  endif;?>
            <div> <?php echo $this->pagination->create_links(); ?> </div>
 </div>
    
    

<style>
.img_single{
    height: 117px;
    margin-right: 5px !important;
    width: 156px; float:left; border:1px solid red; padding:2px;
}


.img_single img {
    height: 110px;
    margin-right: 5px !important;
    width: 150px; float:left;
}

#image-gallery{padding:25px; border:1px solid red; overflow:hidden;}

</style>