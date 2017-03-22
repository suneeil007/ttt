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
			   url: '<?= base_url()?>admin/postjob/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   

<script>
function deleteJob(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/postjob/delete/'+ id,
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
<h3>Manage Posted Job</h3>
<label style="display:none;" class="custom-msg">Successfully Deleted !</label>
</div>

<div class="horzline"></div>
	<table class="display" id="datatables">
       <thead>
              <tr>
			    <th width="10"><input style="margin-left:5px;" type="checkbox"  class="checkallf" /></th>
			    <th class="alignleft" style="width:50px;">S.N.</th>
                <th class="alignleft">Job Title</th>
                <th class="alignleft">Country</th>
                <th class="alignleft" style="width:190px;">Categories</th>
                <th class="alignleft" style="width:120px;">Required No.</th>
                <th class="alignleft" style="width:120px;">Actions</th>
              </tr>
            </thead>
            
            <tbody><?php $counter = 0;?>
                <?php foreach($job_data as $job) : ?>
              <tr class="row<?=$job->id?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>><?php $counter++ ;?>
                  <td><input style="margin-right:6px;" type="checkbox" value="<?=$job->id?>" class="checkboxf" /></td>
                  <td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $job->job_title;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $job->country;?></td>
                  <td style="font-size:13px;text-align:left;"><?php echo $job->job_category;?></td>
                  <td  style="width:90px;font-size:13px;text-align:left;"><?php echo $job->num_vacancies;?></td>                               				
                  <td style="text-align:left;font-size:13px;">	  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url().'admin/postjob/details/'.$job->id;?>" style="display:block;float:left;">
				  <img src="<?php echo base_url().'assets/images/open.png' ;?>" title="Details" /> </a>                 
                  <a href="#" onclick='deleteJob(<?php echo $job->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>" title="Delete" /></a>	            
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
            
          </table>      
          <br/>
              <span class="crudlinks"><a href="#" title="dtable" id="deleteall">Delete Selected</a></span>
	
              <span class="crudlinks">
               <a href="#" title="update" id="#"  style="margin-left:10px;float:left;" class="mylink" >Update</a></span> 
		       <!--       <div> <?php echo $this->pagination->create_links(); ?> </div> -->



<div class="rightBox" style="border:1px solid blue;  padding:20px; margin-top:30px;">

<form class="form-horizontal" action="<?php echo base_url().'admin/postjob/add_edit_job' ;?>" method="post" id="reset_input"  enctype="multipart/form-data" ><br />


<h2 class="postJosted">Job Details</h2>

<br/>
    
     
      <div class="control-group">
            <label class="control-label" for="input01">Job title</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="jobtitle" required>
              
            </div>
          </div>
   
<br/>

  <div class="control-group">
               <label class="control-label" for="select01">Select Country</label>
            <div class="controls">
              <select id="select01" name="country">
          <!--      <option style="color:#06F;">Select Country</option>-->
                <option>Korea</option>
                <option>Dubai</option>
                <option>Qatar</option>
                <option>Malaysia</option>
                <option>Korea</option>
                <option>Dubai</option>
                <option>Qatar</option>
              </select>
            </div>
          </div>

<br/>

  <div class="control-group">
               <label class="control-label" for="select01">Select Categories</label>
            <div class="controls">
              <select id="select01" name="categories">
          <!--      <option style="color:#06F;">Select Country</option>-->
                <option>Administration</option>
                <option>Education</option>
                <option>Hospital</option>
                <option>Construction</option>
                <option>Information Technology</option>
                <option>Hotels/Resturants</option>
                <option>Managerial</option>
              </select>
            </div>
          </div>

<br/>
     <div class="control-group">
            <label class="control-label" for="input01" required>Required No.</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="number">
              
            </div>
          </div>

<br/>


      <div class="control-group">
            <label class="control-label" for="input01" required>Sallary</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="salary">
              
            </div>
          </div>

<br/>


<div class="form-group"> 
    <label for="name" class="onlyTextrea">Job Description [Duties, responsibilities, etc.]</label><br />
    <textarea class="textArea" name="description"  style="margin-bottom:15px;"></textarea> 
  </div>

<p class="onlyTextrea"> *Posted jobs are expired after 3 months from now</p><br/>



<input type="submit" name="add_job" id="add_job" value="Add Job"   style="padding:3px;cursor:pointer;"/>

<input type="submit" name="add_job" id="add_job" value="Reset" onclick="myFunction()"   style="padding:3px;cursor:pointer;"/>
       
</form>  

</div>

<script>
function myFunction() {
    document.getElementById("reset_input").reset();
}
</script>