<script>
function updatestatus(id){	         				
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/cms/change_status/'+ id,
			   success: function(){
			   location.reload();
				   	}
    			});
	
	}
</script>

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
<script type='text/javascript'>
    $(function () {
        $("#menu_type").uniform();       
    });
</script> 
<div class="msg-box">
<h3>Manage Contents</h3>
<label class="custom-msg" id="allpage"><?php echo custom_message('all_pages'); ?></label>
</div>
<div class="horzline"></div>
<div style="float:right;">
<span class="crudlinks"><?php echo anchor(base_url().'admin/cms/create','Create New','id="create"');?></span>
</div> 
<div class="height_20"></div>
<label><strong>Menu Type</strong></label><br/>
	<select id="menu_type" name="menu_type" onchange="changeType(this);" style="width:200px;">
	<option value="0">Select</option>
	<?php foreach($menu_types as $menu_type){ ?>
	 <option value="<?php echo $menu_type->id ;?>" <?php if($mtype == $menu_type->id) echo " selected";?>><?php echo $menu_type->title ;?></option>
	 <?php }?>
	 </select>
<div class="height_20"></div>
     <?php 
	if(isset($up_Rows)){
?>			<div class="backlink">
<span class="crudlinks"><a href="<?php echo base_url().'admin/cms/all/'.$up_Rows->cms_grouptype_id.'/'.$up_Rows->parent_id;?>">UP</a></span>
</div>
	<?php	}?>
<?php 
?>
<?php if ($pid == 0){
				if($group_name !='') {
					echo "Showing groups of type " . '<strong>'.$group_name.'</strong>';
				}
			}
			else{
				echo "Sub groups of " .'<strong>'. $up_Rows->title.'</strong>' . " of type " .'<strong>'. $group_name.'</strong>';
			}
?> 

            <div class="height_10"></div>
          <table id="datatables" class="display">
            <thead>
              <tr>
			    <th width="10"><input style="margin-left:12px;" type="checkbox"  class="checkall" /></th>
			    <th class="alignleft">S.N.</th>
                <th class="alignleft">Title</th>
                <th class="alignleft">Link Type</th>
                <th style="width:50px;">Weight</th>
                <th>Publish ?</th>
                <th class="alignleft">Date</th>
                <th class="alignleft" style="width:100px;">Actions</th>
              </tr>
            </thead>
            <?php if(!empty($pages)) : ?>
            <tbody><?php $counter = 0;?>
                <?php foreach($pages as $page) : ?>
              <tr class="row<?=$page->id?>"><?php $counter++ ;?>
			    <td><input style="margin-right:6px;" type="checkbox" value="<?=$page->id?>" class="checkbox" /></td>
			  	<td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
                <td style="text-align:left;font-size:13px;"><?php echo $page->title;?></td>
                <td style="text-align:left;font-size:13px;"><?php echo $page->link_type;?></td>
				<td style="font-size:13px;"><?php echo $page->weight;?></td>
                <td style="width:90px;font-size:13px;"><a href="#" onclick='updatestatus(<?php echo $page->id ;?>)' style="color:gray;text-decoration:none;" onMouseOver="this.style.color='black'"   onMouseOut="this.style.color='gray'"><?php echo $page->publish;?></a></td>                
                <td style="text-align:left;width:90px;font-size:13px;"><?php echo $page->onDate;?></td>                				
                <td style="text-align:left;font-size:13px;">	  
				<?php if($pRows[$page->id] >0):?>
                  <a href="<?php echo base_url().'admin/cms/all/'.$page->cms_grouptype_id.'/'.$page->id;?>"><img src="<?php echo base_url().'assets/images/open.png'; ?>"  title="Open[<?php echo $pRows[$page->id].' sub pages'?>]" class="opengroup"/></a>
				  <?php endif;?>
                  <?php if($pRows[$page->id] == 0):?>                 
                  <a href="#" onclick='deleteRow(<?php echo $page->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>" title="Delete" class="deletegroup"/></a>
	            <?php endif; ?>				 
				                  <a href="<?php echo base_url().'admin/cms/update/'.$page->id;?>" >
				  <img src="<?php echo base_url().'assets/images/edit.png';?>" title="Edit" class="editgroup"/> </a>

                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
            <?php endif; ?>
          </table>      <br/><a href="#" class="deleteall" title="dtable">Delete Selected</a>