<?php if(isset($breadcrumb)) echo $breadcrumb ; ?>
	   <div style="font-size:13px;font-style:italic;float:left;">
			Posted on : <?php echo $data_cms->onDate;?>
		</div>
  <!--      <div style="float:right;"><a href="#">Next</a></div>
        <div style="float:right;margin-right:20px;"><a href="">Previous</a></div> -->
    <div style="clear:both;"></div>
 <div>
 <?php if(!empty($data_cms->photo)):?>

            <img src="<?php echo base_url().GROUPS_DIR.'/'.$data_cms->photo ;?>" style="border:5px solid #fff;width:200px; float:left;padding:0 5px 5px 0;"/> 		

		  <?php endif;?>
<?php echo $data_cms->contents ;?>

    <div style="clear:both;"></div>
			</div>   
<br/>
<a href="<?php echo base_url().'pages/'.urldecode(url_title($data_cms->title)).'/'.$data_cms->parent_id; ?>" style="float:right;" class="viewall">+View all</a>