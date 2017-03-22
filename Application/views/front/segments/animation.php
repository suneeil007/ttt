<div id="homepage-slider" class="flexslider">

  <ul class="slides">
                  
                  
			<?php if(isset($animation_images)) :
				  foreach($animation_images as $a_img) :
			?>
				 
			   <li>
		
					 <a href="#">
					   <img src="<?php echo base_url().GALLERIES_DIR.'/'.$a_img->image ?>" alt="Khopra Lek, Myagdi" title=""  />
					 </a>
						
					<div class="flex-caption container">
					<div class="width-container">
					<div class="slider-container">
					<div class="caption-text"><?php echo $a_img->caption ;?></div>
					<div class="caption-highlight"><p></p></div>
					</div><!-- close .slider-container -->
					</div><!-- close .width-container -->
					</div><!-- close .flex-caption -->
				
	   
				 </li>

			<?php endforeach ;?>
            <?php endif ;?>

 </ul>

</div><!--flexslider end-->