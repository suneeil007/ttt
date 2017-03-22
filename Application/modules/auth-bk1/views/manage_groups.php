<div class="msg-box">
<h3>Manage Groups</h3><label class="custom-msg" style="display:none;float:right;">Delete Successful !</label>
</div>
<div class="horzline"></div>
<?php /*?><h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p><?php */?>

<div id="infoMessage"><?php echo $message;?></div>
<table id="datatables" class="display">
	<thead>
	<tr>
    <th width="10"><input style="margin-left:16px;" type="checkbox"  class="checkallf" /></th>
		<th>S.N.</th>
		<th>Name</th>
		<th>Description</th>
		<th>Actions</th>
	</tr>
	</thead>
	<?php $counter=0; ?>
	<?php foreach ($users as $user): $counter++ ;?>
		<tr class="row<?php echo $user->id ;?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>>
        	<td><input style="margin-right:6px;" type="checkbox" value="<?=$user->id?>" class="checkboxf" /></td>
			<td><?php echo $counter ;?></td>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("admin/users/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("admin/users/deactivate/".$user->id, lang('index_active_link')) : anchor("admin/users/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td>
			<a href="<?php echo base_url().'admin/users/edit_user/'.$user->id; ?>"><img src="<?php echo base_url().'assets/images/edit.png'; ?>" title="Edit" style="margin-right:15px;" /></a>
			<a href="#" onclick='deleteUser(<?php echo $user->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>" title="Delete" /></a>
            </td>
		</tr>
	<?php endforeach;?>
</table>      <br/>
<p><span class="crudlinks" style="float:left;margin-right:20px;"><a href="#" title="dtable" id="deleteall" style="width:85px;">Delete Selected</a></span>

    <span class="crudlinks" style="float:left;"> <?php echo anchor('admin/users/create_user', lang('index_create_user_link'), array('class'=>'widthanchornew'))?></span> 
    <span class="crudlinks" style="float:left;"> <?php echo anchor('admin/users/create_group', lang('index_create_group_link'), array('class'=>'widthanchorgroup'))?></span>
</p>