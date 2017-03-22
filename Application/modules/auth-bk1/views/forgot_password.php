<h4 class="multi_head"><strong>Forgot password</strong></h4>
<div class="er-message"><?php echo $message;?></div>
<?php echo form_open("forgot_password");?>

      <label style="font-size:12px; color:#0083d7;"><strong>Email/login ID</strong></label>
      <input type="text" name="email" id="email" />
    <?php echo form_submit('submit', 'Submit', 'class="log-me-in", style="float:none;"');?>
<?php echo form_close();?>