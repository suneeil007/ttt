<style>
.verification-success p{
	color:red;
	font-size:14px;
	text-align:left;	
}
.name-lbl{margin-bottom:5px;}
.JobAlerts_text{width:100%; text-align:left; font-size:14px; color:#F2F2F2; font-family:Verdana, Geneva, sans-serif; background:#09F; padding:5px 10px }
</style>
<div class="CB" style="height:14px;"></div>
<p  class="JobAlerts_text">Reset Password</p>
<div class="verification-success" style="padding-top:0px;margin:20px 0 200px 0;">
<div class="leftContent">
<div class="er-message"><?php echo $message;?></div>
<?php echo form_open(base_url('reset_password/' . $code));?>
	<div>
    	<div  class="name-lbl"><label for="new_password"><strong>New password</strong></label></div>
		<div><?php echo form_input($new_password);?></div>
    </div>    
        <div class="CB" style="height:25px;"></div>
	<div>	
    	<div class="name-lbl"><label for="confirm_password"><strong>Confirm new password</strong></label></div>
		<div><?php echo form_input($new_password_confirm);?></div>
    </div>
	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>
    <div class="CB" style="height:15px;"></div>
	<div class="resetpass"><?php echo form_submit('submit', 'Submit');?></div>
<?php echo form_close();?>
</div>
</div>