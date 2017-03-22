<?php if(isset($breadcrumb)) echo $breadcrumb ; ?>
<div style="padding-left:20px;">
		<?php if(!empty($listpages)) : ?>
		<?php echo $data_cms->contents ;?>
			<div class="CB"></div>
		<?php foreach($listpages as $listpage) : ?>
		<div><?php if(!empty($listpage->photo)):?>
            <div style="float:left;padding:0 5px 5px 0;">
            <img src="<?php echo base_url().GROUPS_DIR.'/'.$listpage->photo ;?>" style="border:5px solid #fff;width:120px;"/> 		
        	</div>
		  <?php endif;?>
			<div>
			<strong><?php echo $listpage->title;  ?></strong><br/>
			<?php echo $listpage->shortcontents;  ?>
			<div class="CB"></div>
		</div> 
		</div>
		<div class="CB"></div>

	<div style="float:right;padding-right:20px;"><a href="<?php echo base_url().'pages/'.urldecode(url_title($listpage->title)).'/'.$listpage->id?>" class="viewall">+ More</a></div>

		<div class="CB"></div>
			<?php endforeach; ?>
			<?php endif; ?>
			               <div class="ClearBoth-m"></div>
            <div> <?php echo $this->pagination->create_links(); ?> </div>

   </div>
