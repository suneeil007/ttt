<div class="msg-box">
	<h3>Testimonials</h3>
</div>
<div class="horzline"></div>
<div style="float:right;">
<span class="crudlinks"><?php echo anchor(base_url().'admin/testimonial/all','View All');?></span>
</div> 
<div class="height_20"></div>
<div>Testimonials sent by <strong><?php echo $testimonialdetail->name; ?></strong></div>
<div>
<?php if(isset($testimonialdetail)):?>
	<p><img src="<?php echo base_url().TESTIMONIALS_DIR.'/'.$testimonialdetail->filename ;?>" height="100" width="130" /></p>
	<p>
		<label style="padding-right:10px;"><strong>Name&nbsp;&nbsp:</strong></label>
		<label><?php echo $testimonialdetail->name; ?></label>
	</p>
	<p>
		<label style="padding-right:10px;"><strong>Comments&nbsp;&nbsp:</strong></label>
		<label><?php echo $testimonialdetail->comments; ?></label>
	</p>
	<p>
		<label style="padding-right:10px;"><strong>Status&nbsp;&nbsp:</strong></label>
		<label><?php if($testimonialdetail->status == 1) echo 'Unpublished'; else echo 'Published';?></label>
	</p>
	<p>
		<label style="padding-right:10px;"><strong>Date&nbsp;&nbsp:</strong></label><?php echo $testimonialdetail->onDate; ?>
	</p>
<?php endif;?>
</div>