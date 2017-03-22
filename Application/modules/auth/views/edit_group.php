<script type='text/javascript'>
    $(function () {
        $("select, input, button").uniform();       
    });
</script>
<div class="msg-box">
<h3><?php echo lang('edit_group_heading');?></h3>
</div>
<div class="horzline"></div>
<p><?php echo lang('edit_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>
<div style="float:right;"><span class="crudlinks"><?php echo anchor("admin/users/", 'All users') ;?></span></div>
<?php echo form_open(current_url());?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description);?>
      </p>

      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'));?></p>

<?php echo form_close();?>