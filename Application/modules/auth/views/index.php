<script type="text/javascript">
$(function(){	
var aSelected = [];	  
	$('#datatables').dataTable({
			"sPaginationType":"full_numbers",
			"aaSorting":[[0, "asc"]],
			"bJQueryUI":true,
			"aoColumnDefs": [ { "bSortable": false, "aTargets": [0 ,5, 7] } ],
		});
		
		$("#datatables tr").not(':first').hover(
  function () {
    $(this).css("background","#E6E6E6");
  }, 
  function () {
    $(this).css("background","");
  }
); 

 /* Click event handler */
    $('#datatables tbody tr').live('click', function () {
        var id = this.id;
        var index = jQuery.inArray(id, aSelected);
         
        if ( index === -1 ) {
            aSelected.push( id );
        } else {
            aSelected.splice( index, 1 );
        }
         
        $(this).toggleClass('row_selected');
    } );

 });
</script>

<script>
$(document).ready(function () {
    $('.checkallf').on('click', function () {
        var $this = $(this),
            // Test to see if it is checked
            checked = $this.prop('checked'),
            //Find all the checkboxes
            cbs = $this.closest('table').children('tbody').find('.checkboxf');
        // Check or Uncheck them.
        cbs.prop('checked', checked);
        //toggle the selected class to all the trs
        cbs.closest('tr').toggleClass('selected', checked);
    });
 
    $('a#deleteall').on('click', function(e){
        e.preventDefault();

            $trows = $('.checkboxf:checkbox:checked');
            sel = !!$trows.length;
			
			var ids = [];
			var a =0 ;			
			 $("input.checkboxf:checked").each(function(){
				ids[a]=$(this).val();
				a++;
        		})
	
        if(!sel){
            alert('No rows selected');
            return false;
        }
        var c = confirm('Are you sure you want to delete the slected rows?');
        if(!c) { return false; }
		
		for($i=0 ;$i<$trows.length;$i++ ){
			deleteF(ids[$i]) ;
		}
    });
	

function deleteF(id){	         
	
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/users/delete_user/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   

<script>
function deleteUser(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/users/delete_user/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
		return false; 
	}
</script>
<div class="msg-box">
<h3>Manage Users</h3><label class="custom-msg" style="display:none;float:right;">Delete Successful !</label>
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
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
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