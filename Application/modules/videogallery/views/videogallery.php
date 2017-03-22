  <div id="video-gallery">	 
	 <?php 
	 		$j = 0;
	 		if(isset($videoLinks)):		
			foreach($videoLinks as $videolink):	$j++;		
	 ?>
		<div class="videogallery-div">	
		<a href="<?php echo $videolink->url ;  ?>" rel="prettyPhoto" title="">
        <img src="<?php echo $youtubeimages[$videolink->id] ;?>" width="140" height="120"></a>
        <div style="height:5px;"></div>			
			<label><?php echo $videolink->title ;  ?></label><br/>	 		
	    </div>	
     <?php if($j%5==0){?>
			<?php if($videolink->title == '') {?> <div class="CB"></div>  <?php }else {?>
				<div class="ClearBoth-m"></div>

			<?php } }?>
     
	 <?php endforeach ;?>
	 <?php endif;?>     
     <div class="ClearBoth-m"></div>
     <div> <?php echo $this->pagination->create_links(); ?> </div>

    </div>