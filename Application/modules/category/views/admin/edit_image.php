<?php $id = $this->uri->segment(4) ? $this->uri->segment(4) : '' ; ?>
<div class="msg-box">
<h3>Edit featured image</h3>
</div>
<div class="horzline"></div><br/>
<a href="<?php echo base_url('admin/category/all/')?>"><< Back</a>
	<div>
    <span id="featured-image">
		<?php if(isset($image) &&  !empty($image->image)) : ?>
        <h2>Product Category : <strong><?php echo $image->name; ?></strong></h2><br/>
        <img src="<?php echo base_url().CATEGORIES_DIR.'/'.$image->image ;?>" />
        <a  onclick="deleteImage(<?php echo $image->id ; ?>)" style="color:red;cursor:pointer;">Remove</a>
        <?php endif ;?>
    </span>
    <br/><br/>
	  <form action="<?php echo base_url().'admin/category/upload_image/'.$id ;?>" method="post" id="frm_add_image" enctype="multipart/form-data">			
			<div class="add-sub-category-block">
                    <div><input type="file"  name="featured_image" id="featured_image" /></div>
			</div>                
			<br/>
     </form>
    </div>
<script>
function deleteImage(id){	         

	if(confirm("Sure you want to remove ?"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/category/deleteImage/'+ id,
			   success: function(){
						 $("#featured-image").fadeOut('slow', function() {$(this).remove();});
//						 $(".custom-msg").show();
				   	}
    			});
	}
		return false; 
	}
</script>
<script type='text/javascript'>
$(function() {
$('#featured_image').live('change', function()	{ 
	 $("#frm_add_image").ajaxForm({			
			  success: function() {			
				window.location.replace("<?php echo base_url().'admin/category/edit_image/'.$id ;?>") ;
				}
			}).submit();
	});
});	
</script>
<script type='text/javascript'>
    $(function () {
        $("#featured_image").uniform();       
    });
</script> 

