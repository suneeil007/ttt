<div class="msg-box">
</div>
<div class="horzline"></div>
<div style="float:right;">
<span class="crudlinks"><?php echo anchor(base_url().'admin/feedback/all','View All');?></span>
</div> 
<div class="height_20"></div>
<div>Feedback sent by <strong><?php echo $feedetail->name; ?></strong></div>
<div>
<?php if(isset($feedetail)):?>
	<p>
		<label style="padding-right:10px;"><strong>Name&nbsp;&nbsp:</strong></label><?php echo $feedetail->name; ?>
	</p>
	<p>
		<label style="padding-right:10px;"><strong>Address&nbsp;&nbsp:</strong></label><?php echo $feedetail->address; ?>
	</p>
	<p>
		<label style="padding-right:10px;"><strong>Email&nbsp;&nbsp:</strong></label><?php echo $feedetail->email; ?>
	</p>
	<p>
		<label style="padding-right:10px;"><strong>Country&nbsp;&nbsp:</strong></label><?php echo $feedetail->country; ?>
	</p>
	<p>
		<label style="padding-right:10px;"><strong>Comment&nbsp;&nbsp:</strong></label><?php echo $feedetail->comment; ?>
	</p>    
	<p>
		<label style="padding-right:10px;"><strong>Date&nbsp;&nbsp:</strong></label><?php echo $feedetail->onDate; ?>
	</p>
<?php endif;?>
</div>