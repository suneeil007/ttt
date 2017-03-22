<style>
.postJosted{ font-family:Georgia, "Times New Roman", Times, serif; font-size:24px; color:#06F; font-weight:bold; border-bottom:1px solid #06F; line-height:30px;}
.control-label{ border:1px solid #06F; padding:1px 8px 6px 8px;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px; color:#06F; }
.input-xlarge{ width:300px; height:25px; border:1px solid #06F;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px; color:#06F;padding-left:5px;}
option{ width:279px; height:23px; border:1px solid #06F;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px;}
.textArea{ width:450px; height:120px; border:1px solid #06F;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px; color:#06F;padding-left:5px;}
.onlyTextrea{color:#06F;}
select{ border:1px solid #06F;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px;color:#06F;}
</style>


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
			   url: '<?= base_url()?>admin/booking/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   

<script>
function deleteBooking(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/booking/delete/'+ id,
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
<h3>View Booking</h3>
<label style="display:none;" class="custom-msg">Successfully Deleted !</label>
</div>

<div class="horzline"></div>
	<table class="display" id="datatables">
       <thead>
              <tr>
			    <th width="10"><input style="margin-left:5px;" type="checkbox"  class="checkallf" /></th>
			    <th class="alignleft" style="width:50px;">S.N.</th>
                <th class="alignleft">Name</th>
                <th class="alignleft">Email</th>
                <th class="alignleft" style="width:190px;">Contact</th>
                <th class="alignleft" style="width:120px;">Country</th>
                <th class="alignleft" style="width:120px;">Description</th>   
                <th class="alignleft" style="width:120px;">Actions</th>
              </tr>
            </thead>
            
            <tbody><?php $counter = 0;?>
                <?php foreach($booking_data as $booking) : ?>
              <tr class="row<?=$booking->id?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>><?php $counter++ ;?>
                  <td><input style="margin-right:6px;" type="checkbox" value="<?=$booking->id?>" class="checkboxf" /></td>
                  <td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $booking->name;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $booking->email;?></td>
                  <td style="font-size:13px;text-align:left;"><?php echo $booking->contact;?></td>
                  <td  style="width:90px;font-size:13px;text-align:left;"><?php echo $booking->country;?></td>   
                  <td  style="width:90px;font-size:13px;text-align:left;"><?php echo $booking->description;?></td>                                				
                  <td style="text-align:left;font-size:13px;">	  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url().'admin/booking/details/'.$booking->id;?>" style="display:block;float:left;">
				  <img src="<?php echo base_url().'assets/images/open.png' ;?>" title="Details" /> </a>                 
                  <a href="#" onclick='deleteBooking(<?php echo $booking->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>" title="Delete" /></a>	            
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
            
          </table>      
          <br/>
              <span class="crudlinks"><a href="#" title="dtable" id="deleteall">Delete Selected</a></span>
	
         <!--       <span class="crudlinks">
               <a href="#" title="update" id="#"  style="margin-left:10px;float:left;" class="mylink" >Update</a></span> 
		            <div> <?php echo $this->pagination->create_links(); ?> </div> -->





<script>
function myFunction() {
    document.getElementById("reset_input").reset();
}
</script>