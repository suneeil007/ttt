<script type='text/javascript'>
    $(function () {
        $("select, input, button").uniform();       
    });
</script>

<div class="msg-box">
<h3>Create User</h3>
</div>
<div class="horzline"></div>
<?php /*?><h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p><?php */?>
<div id="infoMessage"><?php echo $message;?></div>
<div style="float:right;"><span class="crudlinks"><?php echo anchor("admin/users/", 'All users') ;?></span></div>
<?php echo form_open("admin/users/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'first_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>
