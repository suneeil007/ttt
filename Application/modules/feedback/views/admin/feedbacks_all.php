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
			   url: '<?= base_url()?>admin/feedback/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   

<script>
function deleteFeedback(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/feedback/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
		return false; 
	}
</script>

<script type="text/javascript">
$(function(){	
var aSelected = [];	  
	$('#datatables').dataTable({
			"sPaginationType":"full_numbers",
			"aaSorting":[[0, "asc"]],
			"bJQueryUI":true,
			"aoColumnDefs": [ { "bSortable": false, "aTargets": [0 ,6] } ],
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
<h3>Manage Feedbacks</h3>
<label style="display:none;" class="custom-msg">Successfully Deleted !</label>
</div>
<div class="horzline"></div>
	<table class="display" id="datatables">
            <thead>
              <tr>
			    <th width="10"><input style="margin-left:5px;" type="checkbox"  class="checkallf" /></th>
			    <th class="alignleft" style="width:50px;">S.N.</th>
                <th class="alignleft">Name</th>
                <th class="alignleft">Address</th>
                <th class="alignleft" style="width:190px;">Email</th>
                <th class="alignleft" style="width:120px;">Country</th>
                <th class="alignleft" style="width:120px;">Actions</th>
              </tr>
            </thead>
            <?php if(!empty($feedbacks)) : ?>
            <tbody><?php $counter = 0;?>
                <?php foreach($feedbacks as $feedback) : ?>
              <tr class="row<?=$feedback->id?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>><?php $counter++ ;?>
			    <td><input style="margin-right:6px;" type="checkbox" value="<?=$feedback->id?>" class="checkboxf" /></td>
			  	<td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
                <td style="text-align:left;font-size:13px;"><?php echo $feedback->name;?></td>
                <td style="text-align:left;font-size:13px;"><?php echo $feedback->address;?></td>
				<td style="font-size:13px;text-align:left;"><?php echo $feedback->email;?></td>
                <td  style="width:90px;font-size:13px;text-align:left;"><?php echo $feedback->country;?></td>                               				
                <td style="text-align:left;font-size:13px;">	  
				&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url().'admin/feedback/details/'.$feedback->id;?>" style="display:block;float:left;">
				  <img src="<?php echo base_url().'assets/images/open.png' ;?>" title="Details" /> </a>                 
                  <a href="#" onclick='deleteFeedback(<?php echo $feedback->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>" title="Delete" /></a>	            
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
            <?php endif; ?>
          </table>      <br/><span class="crudlinks"><a href="#" title="dtable" id="deleteall">Delete Selected</a></span>
		  <br/>
		       <!--       <div> <?php echo $this->pagination->create_links(); ?> </div> -->