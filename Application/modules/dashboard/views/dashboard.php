<script>
$(function() {
	$("#view").hover(
      function () {
        $('#viewul').slideDown('slow');
      });
	  
	  $("#view").mouseleave(function () {
        $('#viewul').slideUp('slow');
    });
   });
</script>
<div class="msg-box" style="height:80px;">
		<div class="logo"> </div>		
</div>
<div class="horzline"></div>
 <div style="float: right;">            
            Hi &nbsp;&nbsp;<?php 
            echo '<strong>'.$res->first_name.'</strong>' ;
			echo '<br/>';
			echo 'Last login  &nbsp;&nbsp;:&nbsp;&nbsp;'.'<label style="font-size:11px;font-style:italic; color: red;">'.unix_to_human($res->last_login).'</label>' ;
            ?>		
   </div>
<h4>Welcome to Content Management System !</h4>
<h2 style="text-decoration:underline;">Dashboard</h2>
 <div class="homelinks-container">
    <div class="homelinks"><a href="<?php echo base_url().'admin/cms/create' ; ?>"><img src="<?php echo base_url().'assets/images/add.png'; ?>"/></a><br/><label>Add New Page</label></div>
    <div class="homelinks" id="view"><a href="<?php  echo base_url().'admin/cms/all' ; ?>" style="display:block;">
	<img src="<?php echo base_url().'assets/images/viewall.png'; ?>" />
	<!--<ul style="display:none;" id="viewul">
			<li><a href="<?php echo base_url().'admin/cms/all/1/0' ; ?>">View Header Links</a> </li>
			<li><a href="<?php echo base_url().'admin/cms/all/2/0' ; ?>">View CMS Links</a> </li>
	</ul> -->
	</a><br/><label>Browse Pages</label></div>
    <div class="homelinks"><a href="<?php echo base_url().'admin/category/all' ; ?>"><img src="<?php echo base_url().'assets/images/feedback.png'; ?>" /></a><br/><label>Add Categories</label></div>
	<div class="homelinks"><a href="<?php echo base_url().'admin/product/all' ; ?>"><img src="<?php echo base_url().'assets/images/users.png'; ?>" /></a><br/><label>Add Packages</label></div>     
	<div class="homelinks"><a href="<?php echo base_url().'admin/users/change_password' ; ?>"><img src="<?php echo base_url().'assets/images/password.png'; ?>" /></a><br/><label>Change password</label></div>
</div> 
