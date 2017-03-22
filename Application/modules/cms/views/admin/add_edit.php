<script type='text/javascript'>
$(function() {
	  $('#submit_cms').click(function () {			  	
  		var title = $("#title").val();
		var type = $("#menu_type").val();
		var linktype = $("#content_type").val();
		
	    $("#error").hide();
		$('.custom-msg').hide();							

		if (type == 0) {
		  $("#menu_type").focus();		  
		  $("#menu_type").css({"border": "1px solid red"});
		  $("#error").fadeIn('slow');		  
		  return false;
		}
		
		if (title == "") {
		  $("#title").focus();
		  
  		  $("#title").css({"border": "1px solid red"});
		  
  		  $("#error").fadeIn('slow');
		  return false;
		}
		
		if (linktype == 0) {
 		  $("#title").css({"border": "1px solid green"});
		  $("#content_type").focus();
  		  $("#error").fadeIn('slow');
		  return false;
		}
			$('.loading').fadeIn('slow');			

			$('#frmcms').ajaxForm({
			  success: function() {
				$('.loading').fadeOut('slow');	
				
				if($("#pid").val() != ''){ 
				location.reload();
				}
				else{		
					document.location = '<?php echo base_url();?>admin/cms/all';
				}
				}
			});			  		
      });	  
	});
</script>

<script type='text/javascript'>
    $(function () {
        $("select, input, button").uniform();       
    });
</script>
<script src="<?php echo base_url();?>assets/js/jquery.preimage.js"></script>
<script>

$(document).ready(function(){
	$('#featured_image').preimage();
});

</script>
<style>
.prev_thumb{
	margin: 10px;
	height: 100px;
}
</style>
<?php 	$isEdit = isset($pages) ? true : false;	?>

<div class="msg-box">
<h3>Add/Edit Pages</h3>
<label class="custom-msg" id="allpage"><?php echo custom_message('all_pages'); ?></label>
</div>
<div class="horzline"></div>
	<div class="alignright"><span class="crudlinks"><a href="<?php echo base_url().'admin/cms/all/';?>" id="viewall">View All</a></span></div>
	<div class="createnew"><span class="crudlinks"><a href="<?php echo base_url().'admin/cms/create/';?>" id="create">Create New</a></span></div>
<br/>
<div class="form-wrapper">
<div class="height_20"></div>
<form id="frmcms" method="post" enctype="multipart/form-data" action="">
<br/>
<div class="form-left">
	<label><strong>Menu Type</strong></label><br/>
	<select id="menu_type" name="menu_type" style="width:105px;">
	<option value="0">Select</option>
	<?php foreach($menu_types as $menu_type){ ?>
	 <option value="<?php echo $menu_type->id ;?>" <?php if($isEdit) { if($pages->cms_grouptype_id == $menu_type->id) echo "selected";};?>><?php echo $menu_type->title ;?></option>
	 <?php }?>
	 </select>
	<br/>
	<br/>
	<label><strong>Title</strong></label>
	
		<br/>
	<input type="text" name="title" id="title" value="<?php if($isEdit) echo $pages->title;?>" style="width:1885x;" />
	<br/><br/>
	<label><strong>Content Type</strong></label><br/>
	<select id="content_type" name="content_type" style="width:105px;" <?php if($isEdit) echo ' disabled="disabled"';?>>
		 <option value="0">Select</option>
		 <option value="Content Page" <?php if($isEdit) { if($pages->link_type == 'Content Page') echo "selected";};?>>Content Page</option>
		 <option value="Link" <?php if($isEdit) { if($pages->link_type == 'Link') echo "selected";};?>>Link</option>
		 <option value="File" <?php if($isEdit) { if($pages->link_type == 'File') echo "selected";};?>>File</option>
		 <option value="Image Gallery" <?php if($isEdit) { if($pages->link_type == 'Image Gallery') echo "selected";};?>>Image Gallery</option>
		 <option value="Video Gallery" <?php if($isEdit) { if($pages->link_type == 'Video Gallery') echo "selected";};?>>Video Gallery</option>
	 </select>
	<input type="hidden" name="lt" value="<?php if($isEdit) echo $pages->link_type;?>" /> 
		<br/><br/>
	<div id="contenttype">
	<!-- gallery page starts-->
	 <div id="gallery">
			<div class="gall-width">
			<?php if(isset($galleryimages)): ?>
			<?php $t = 0;?>
			<?php foreach($galleryimages as $images): $t++;		?>
			<div id="img<?=$images->id?>" class="gallery-box">  
			<img src="<?php echo base_url();?>uploads/galleries/<?= $images->image?>" height="110" width="130" />
			<a href="#" style="float:right;" onclick='deletePic(<?=$images->id?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>"/></a><br/>
			<input type="hidden" name="oldCaptionIds[]" value="<?php echo $images->id ; ?>" />
			<input type="text" name="listCaption[]" style="width:110px;" value="<?= $images->caption  ?>" />
<input type="text" name="listCaption[]" style="width:110px;" value="<?= $images->caption  ?>" />
			<div class="CB"></div>
			
			order: <input type="text" name="galSort[]" style="width:50px;" value="<?= $images->weight?>" />
			</div>
					<?php if($t%4==0){?>
			<div style="clear:both;margin-bottom:5px;"></div>
			<? }?>
			<?php endforeach;?>
			<?php  endif;?>
			</div>
			<div class="clear"></div>
			<div id="addimage">
			<p><span class="crudlinks"><a href="#" id="addNewImg" style="width:90px;"><strong>Add Images</strong></a></span></p><br />

				</div>
                    <div class="CB" style="border-top:1px solid #ccc; margin-top:10px;"></div>
					<p>File&nbsp;&nbsp;<input type="file" name="userfile[]" /></p>
					<p style="padding-top:10px;">Caption&nbsp;<input type="text" name="listCaption[]" class="text" />
					</p>


		</div>
	<!-- gallery page ends-->	
	<!-- content page starts-->
	 <div id="contentpage">
		<input type="checkbox" name="short" value="other" id="other" <?php if($isEdit && $pages->shortcontents != '') echo ' checked' ?> />
	<label><strong><?php if($isEdit) echo 'Short contents'; else echo 'Add short contents ?';?></strong></label>
	<br/>
			<div class="slidediv" <?php if($isEdit && $pages->shortcontents != '') echo ' style="display:block;"';?>>	
	<textarea  name="shortcontents" id="shortcontents"><?php if($isEdit) echo $pages->shortcontents;?></textarea>
    <?php echo display_ckeditor($ckeditor); ?>			
	</div>
<br/>

	<label><strong>Main Contents</strong></label>
	<textarea  name="contents" id="contents"><?php if($isEdit) echo $pages->contents;?></textarea>
    <?php echo display_ckeditor($ckeditor_2); ?>
	<br/>
		<br/>	
        	<input type="hidden"  name="isparent" value="0" />
           	<input type="hidden" name="oldisparent" value="1" <?php if($isEdit && $pages->is_parent == 1) echo ' checked' ; ?> />
           	<input type="hidden" name="oldisparent" value="0" <?php if($isEdit && $pages->is_parent == 0) echo ' ' ; ?> />           
<input type="checkbox" class="isparent"  name="isparent"  value="1" <?php if($isEdit && $pages->is_parent == 1) echo ' checked'; ?> /> 
			<label><strong>Make parent ?</strong>&nbsp;&nbsp;[for sub menus]</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
            <input type="hidden"    name="makelist" value="no" />
            <input type="checkbox"  name="makelist"  value="yes" class="makelist" <?php if($isEdit && $pages->is_listpage == 'yes') echo ' checked'; ?> />
			<label><strong>Make list page ?</strong></label>
	
		</div>
	<!-- content page ends-->	
   	<!-- Link page Starts-->
     <div id="linkpage">
    	<label><strong>Page Name / URL </strong></label><br/>
        <input type="text" name="linkpage" value='<?php if($isEdit) echo $pages->contents ; ?>'  id="links" /> <br/><br/>	
	[e.g. 'pages/some link/731' for internal links] <br/> [e.g. 'http://fb.com' or 'http://www.fb.com' for external links]
    </div> 
   	<!-- Link page ends-->	    
    <!-- File page Starts-->
     <div id="filepage">
	 <?php 
	 		if($isEdit && $pages->contents != ''):
	 ?>
	 	<label><?php echo $pages->contents;?></label>
	 <?php echo '<br/><br/>';endif; ?>
    	<label><strong>Upload a File</strong></label><BR/>
        <input type="file" name="file_upload"  id="file" /><BR/>
    </div>
   	<!-- File page ends-->	
     <!-- Video Gallery Starts-->
     <div id="videopage" class="gall-width">
	 
	 <?php 
	 		$j = 0;
	 		if($isEdit && isset($videoLinks)):
		echo 	'<strong>Existing Videos</strong><br/><br/>';
			foreach($videoLinks as $videolink):	$j++;		
	 ?>
		<input type="hidden" name="OldVideoIds[]" value="<?php echo $videolink->id ; ?>" />
		<div class="video-box" id="vid<?=$videolink->id?>">	
		<img src="<?php echo $youtubeimages[$videolink->id] ;?>"  width="190" height="180">	
		<a href="#"  onclick='deleteVid(<?=$videolink->id?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>"/></a>
			<p style="padding:0;margin:0;"> &nbsp;Title&nbsp;<input type="text" name="Oldtitle_vid[]" value="<?php echo $videolink->title ;  ?>" style="width:150px;" /><br/>
			Link &nbsp;<input type="text" name="Oldvid_link[]" value="<?php echo  $videolink->url ; ?>" style="width:150px;"/> 
	 		</p>
	    </div>
	 <?php if($j%3== 0) echo '<div style="clear:both;height:2px;"></div>';?>
	 <?php endforeach ;?>
	 <?php endif;?>
	 <div class="clear"></div>
        <div id="addiVideo">
        <p><span class="crudlinks"><a href="#" id="addNewVid" style="width:75px;"><strong>Add Video</strong></a></span></p>
        <div class="CB"></div>
                <p style="padding-bottom:10px;">Title&nbsp;<input type="text" name="title_vid[]" /></p>
                <p style="padding-bottom:10px;">Link &nbsp;<input type="text" name="vid_link[]" class="text" /></p>
        </div>
    </div>
   <!-- Video Gallery Ends-->
	</div>
</div>
	<div class="form-right"> 
	<div class="newrightFormfield">
    <label><strong>Parent</strong></label>
		<br/>
	<select name="parent" id="parent">
	 <option id="0">Select</option> 
	</select>
    </div>
    <div class="newrightFormfield">
	<label><strong>Weight</strong></label>            
	<input type="text" name="weight" id="weight" value="<?php if($isEdit) echo $pages->weight;else echo 5;?>" style="width:25px;"/>
</div>
<div class="newrightFormfield">
	<label><strong>Publish</strong></label>
	<input type="radio" name="publish" id="publish" value="yes" <?php if($isEdit) { if($pages->publish == 'yes') echo "checked";} else echo "checked";?> />yes
	<input type="radio" name="publish" id="publish" value="no" <?php if($isEdit) { if($pages->publish == 'no') echo "checked";};?>/>no
</div>

<div class="newrightFormfield">
	<label><strong>Featured Image</strong></label>

<?php if($isEdit && $pages->photo != ''){
			?>
			<p id="featured-img"><img  src="<?php echo base_url() ;?>uploads/groups/<?= $pages->photo ?>" height="100" width="150" />							
		<?php 	$id = $this->uri->segment(4); ?>
<a href="#" onclick='deleteImg(<?php echo $id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>"/></a></p>
		<?php	} ?> 
<input type="file" name="featured_image"  id="featured_image"/>
</div>
	<div id="prev_featured_image"></div>	

<!-- Existing content page Files -->
		<ul>
	<?php if($isEdit) : ?>
			<?php if(!empty($groupfiles)) : ?>
	<strong><?php echo 'Existing Files' ; ?></strong>
			<?php foreach($groupfiles as $groupfile) : ?>
			<?php $ext = explode(".", $groupfile->filename); if($ext[1] == 'jpg' || $ext[1] == 'png' || $ext[1] == 'gif'){?>
			<div><img src="<?php echo base_url().GROUP_FILES_DIR.'/'. $groupfile->filename ?>" height="50" width="70" /><a href="#" onclick='deleteFile(<?php echo $groupfile->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>"/></a>
		<input type="hidden" name="oldFileCaptionIds[]" value="<?php echo $groupfile->id ; ?>" />	
			<input type="text" name="fileCaption[]" value="<?php echo $groupfile->caption ;?>"/></div><br/> 
			<?php }else{?>
			<li id="fRow<?=$groupfile->id?>"><?= $groupfile->filename ?>&nbsp;&nbsp;&nbsp;<a href="#" onclick='deleteFile(<?php echo $groupfile->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>"/></a><input type="text" name="fileCaption[]" value="<?php echo $groupfile->caption ;?>"/></li><br/>
			<?php }?>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php endif; ?>
	 </ul>	
<!-- Add content page Files
	<div id="addFiles">
		<p>
		<span class="crudlinks"><a href="#" id="addNewFile" style="width:73px;"><strong>Add Files</strong></a></span>
		</p>
	</div> 
 -->
	<input type="hidden" name="pid" id="pid" value="<?php if($isEdit) echo $pages->id;?>" />
	<div class="CB" style="height:20px;"></div>
	<input type="submit" value="submit" name="submit_cms" id="submit_cms" />  
		<br/>
	<span class="loading"></span>
	<label id="error" style="display:none;color:red;font-size:13px;font-style:italic;padding-top:20px;">Please supply required fields !</label>
		</div>
<div class="CB"></div>		
</form>
</div>