<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" type="text/css" media="screen" />
<div class="banner">
  <div class="logo1">
<!--  <p class="power">Powered by </p>
     <a href="http://blueraysgraphics.com" target="_blank"> <img src="<?php echo base_url();?>assets/images/logo.jpg" />   </a> -->
    
    
    </div>
  
  <div class="admintext">

    <p class="change2">Admin Panel</p>
     
  </div>


</div>

<div id="login_container">
<div id="login_form">
<?php /*?><h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>
<?php */?>
<div id="infoMessage" style="color:#F00; font-size:12px; font-style:italic; line-height:4px;text-align:right; margin:0 30px 10px 0;"><?php echo $message;?></div>



<?php echo form_open("auth/login");?>
  <p>
   
   
  <span>User Name</span><?php echo form_input($identity);?>
  </p>

  <p>
   
    <span class="change">Password</span><?php echo form_input($password);?>
  </p>

<?php /*?>  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
<?php */?>

  <p style="margin-left:180px;"><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<?php /*?><p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p><?php */?>
</div>
<div style="clear:both;"></div>
</div>


<div class="footer1">
<!-- <p class="change3">Copyright &copy  2013. <a href="http://blueraysgraphics.com" target="_blank"><span class="change4">Blue Rays Graphics & Media Pvt. Ltd.</span></a> </p>-->
</div>