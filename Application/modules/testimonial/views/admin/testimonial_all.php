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
			   url: '<?= base_url()?>admin/testimonial/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   

<script>
function deletetestimonial(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/testimonial/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
		return false; 
	}
</script>

<script>
function updatestatus(id){	         				
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/testimonial/change_status/'+ id,
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
			"aoColumnDefs": [ { "bSortable": false, "aTargets": [0 ,3,4] } ],
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
<div class="msg-box">
<h3>Manage Testimonials</h3>
<label style="display:none;" class="custom-msg">Successfully Deleted !</label>
</div>
<div class="horzline"></div>
	<table class="display" id="datatables">
            <thead>
              <tr>
			    <th style="width:20px;"><input style="margin-left:8px; padding-left:0" type="checkbox"  class="checkallf" /></th>
			    <th class="alignleft" style="width:40px;">S.N.</th>
                <th class="alignleft">Name</th>
                <th class="alignleft">Email</th>
                <th class="alignleft">Photo</th>
<!--                <th style="width:50px;">Order</th>-->
                <th class="alignleft">Status</th>
				<th class="alignleft">Date</th>
                <th class="alignleft" style="width:100px;">Actions</th>
              </tr>
            </thead>
            <?php if(!empty($testimonials)) : ?>
            <tbody><?php $counter = 0;?>
                <?php foreach($testimonials as $testimonial) : ?>
              <tr class="row<?=$testimonial->id?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>><?php $counter++ ;?>
			    <td><input style="margin-right:6px;" type="checkbox" value="<?=$testimonial->id?>" class="checkboxf" /></td>
			  	<td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
                <td style="text-align:left;font-size:13px;"><?php echo $testimonial->name;?></td>
                <td style="text-align:left;font-size:13px;"><?php echo $testimonial->email;?></td>
                <td class="pages-text"><img src="<?php echo base_url().TESTIMONIALS_DIR.'/'.$testimonial->filename ;?>" height="70" width="100" /></td>
				<!--<td style="font-size:13px;"><?php echo $testimonial->order;?></td>-->
                <td style="width:90px;font-size:13px;">
				<a href="#" onclick='updatestatus(<?php echo $testimonial->id ;?>)' id="update_status"><?php if($testimonial->status == 1) echo 'Unpublish'; else echo 'Publish';?></a></td>
                <td style="width:90px;font-size:13px;"><?php echo $testimonial->onDate;?></td>                               				
                <td>	  
                  <a href="<?php echo base_url().'admin/testimonial/details/'.$testimonial->id;?>" style="display:block;float:left;">
				  <img src="<?php echo base_url().'assets/images/open.png' ;?>" title="Details"/> </a>                 
                  <a href="#" onclick='deletetestimonial(<?php echo $testimonial->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>" title="Delete"/></a>	            
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
            <?php endif; ?>
          </table> 
    <br/><span class="crudlinks"><a href="#" title="dtable" id="deleteall">Delete Selected</a></span>
<div class="CB"></div>