<style>
.postJosted{ font-family:Georgia, "Times New Roman", Times, serif; font-size:24px; color:#000; font-weight:bold; border-bottom:1px solid #ddd; line-height:30px;}
.control-label{  padding:5px 8px 6px 0px;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px; color:#000; }
.input-xlarge{ width:300px; height:25px; border:1px solid #ddd;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px; color:#000;padding:5px;}
.textArea{ width:950px; height:220px; border:1px solid #ddd;font-family:Georgia, "Times New Roman", Times, serif; font-size:12px; color:#000;padding:5px;}


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
			   url: '<?= base_url()?>admin/blog/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   

<script>
function deleteBlog(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/blog/delete/'+ id,
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
			"aoColumnDefs": [ { "bSortable": false, "aTargets": [0] } ],
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
<h3>Manage Blog</h3>
<label style="display:none;" class="custom-msg">Successfully Deleted !</label>
</div>

<div class="horzline"></div>
	<table class="display" id="datatables">
       <thead>
              <tr>
			    <th width="10"><input style="margin-left:5px;" type="checkbox"  class="checkallf" /></th>
			    <th class="alignleft" style="width:50px;">S.N.</th>
                <th class="alignleft">Title</th>
                <th class="alignleft">Featured Image</th>
                <th class="alignleft">Date</th>
                <th class="alignleft">Description</th>
                <th class="alignleft" style="width:120px;">Actions</th>
              </tr>
            </thead>
            
            <tbody><?php $counter = 0;?>
                <?php foreach($blog_data as $blog) : ?>
              <tr class="row<?=$blog->id?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>><?php $counter++ ;?>
                  <td><input style="margin-right:6px;" type="checkbox" value="<?=$blog->id?>" class="checkboxf" /></td>
                  <td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $blog->title;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $blog->image;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $blog->date;?></td>
                  <td style="text-align:left;font-size:13px;"><?php echo $blog->description;?></td>           
                 <td style="text-align:left;font-size:13px;">	  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                              
                  <a href="#" onclick='deleteBlog(<?php echo $blog->id ;?>)'><img src="<?php echo base_url().'assets/images/delete.png'; ?>" title="Delete" /></a>	       
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
            
          </table>      
          <br/>
              <span class="crudlinks"><a href="#" title="dtable" id="deleteall">Delete Selected</a></span>
	
              
          



<div class="rightBox" style="border:1px solid #ddd;  padding:20px; margin-top:30px;">

<form class="form-horizontal" action="<?php echo base_url().'admin/blog/add_edit_blog' ;?>" method="post" id="reset_input"  enctype="multipart/form-data" ><br />


<h2 class="postJosted">Post Blog</h2>

<br/>
    
     
      <div class="control-group">
            <label class="control-label" for="input01">Blog title</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="title" required>
              
            </div>
          </div>
   
<br/>
      <div class="control-group">
            <label class="control-label" for="input01">Featured Image</label>
            <div class="controls">
              <input type="file"  id="image" name="image"/>
              
            </div>
          </div>
   
<br/>
      <div class="control-group">
            <label class="control-label" for="input01">Date</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="isfesf" name="date" required>
              
            </div>
          </div>
   
<br/>

<div class="form-group"> 
    <label for="name" class="onlyTextrea">Blog Description </label><br />
    <textarea class="textArea" name="description"  style="margin-bottom:15px;"></textarea> 
  </div>





<input type="submit" name="add_blog" id="add_blog" value="Add Blog"   style="padding:3px;cursor:pointer;"/>

<input type="submit" name="add_blog" id="add_blog" value="Reset" onclick="myFunction()"   style="padding:3px;cursor:pointer;"/>
       
</form>  

</div>

<script>
function myFunction() {
    document.getElementById("reset_input").reset();
}
</script>