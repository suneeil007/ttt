<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" type="text/css" media="screen" />
<div id="login_container">
<div id="login_form">
<?php /*?><h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>
<?php */?>
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <strong><?php echo lang('login_identity_label', 'identity');?></strong>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <strong><?php echo lang('login_password_label', 'password');?><br/></strong>
    <?php echo form_input($password);?>
  </p>

<?php /*?>  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
<?php */?>

  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<?php /*?><p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p><?php */?>
</div>
</div>