<?php $parent_id  = isset($parent_id) ? $parent_id :0   ;   ?>
<?php $parent_cat = $this->uri->segment(4) ? $this->uri->segment(4) : $parent_id; ?>
<div class="msg-box">
<h3>Manage Categories</h3>
<label style="display:none;" class="custom-msg">Successfully Deleted !</label>
</div>
<div class="horzline"></div><br/>
	<div>		
	  <form action="<?php echo base_url().'admin/category/add_edit_Category' ;?>" method="post" id="frm_add_category" enctype="multipart/form-data">
			<div class="add-sub-category-block">
				<div><strong>Parent Category</strong></div>
				<div>
					<select name="category" id="category" onchange="changeType(this);" >
					<option value="0" selected>-- none --</option>
						<?php if(isset($categories)){?>
							<?php foreach($categories as $category){?>
	<option value="<?php echo $category->id ; ?>" <?php if($parent_cat == $category->id) echo ' selected'; ?>><?php echo $category->name ; ?></option>						
						<?php }}?>						
					</select>
				</div>
			</div>
			<div class="add-sub-category-block">
				<div><strong>Category Name</strong></div>
				<div><input type="text"  name="name" id="name" /></div>
			</div>
			<div class="add-sub-category-block">
				<div><strong>Description</strong></div>
				<div><textarea  name="description" id="description"></textarea></div>
			</div>			
			<div class="add-sub-category-block">
					<div><strong>Order</strong></div>
					<div><input type="text"  name="order" id="order"  style="width:30px;"/></div>
				</div>
			<div class="add-sub-category-block" style="margin-right:0px;">
                    <div><strong>Image</strong></div>
                    <div><input type="file"  name="cat_image" id="cat_image" /></div>
			</div>                
			<br/>
			<input type="submit" name="add_category" id="add_category" value="Add Category"  style="padding:3px;cursor:pointer;"/>
			</form>
    </div><h1></h1>
	<br/><br/><br/>	
	<h2><strong>Existing Categories</strong></h2><br/>
<table class="display" id="datatables">
            <thead>
              <tr>
			    <th width="10"><input style="margin-left:5px;" type="checkbox"  class="checkallf" /></th>
			    <th class="alignleft" style="width:50px;">S.N.</th>
                <th class="alignleft">Name</th>
                <th class="alignleft">Description</th>
                <th class="alignleft" >order</th>											
                <th class="alignleft" style="width:180px;">Actions</th>
              </tr>
            </thead>           
            <tbody id="addCategory">			
			 <?php if(!empty($subcategories)) : ?><?php $counter = 0;?>
                <?php foreach($subcategories as $category) : ?>
	       
              <tr class="row<?=$category->id?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>>
			  <form id="frm_edit_category<?=$category->id?>" action="<?php echo base_url().'admin/category/add_edit_Category' ;?>" method="post">
			  <?php $counter++ ;?>
			    <td><input style="margin-right:6px;" type="checkbox" value="<?=$category->id?>" class="checkboxf" /></td>
			  	<td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
                <td style="text-align:left;font-size:13px;"><input type="text" value="<?php echo $category->name;?>" 
				name="oldname<?=$category->id?>" id="oldname<?=$category->id?>" /></td>
                <td style="text-align:left;font-size:13px;">
				<textarea  name="olddescription<?=$category->id?>" id="olddescription<?=$category->id?>" cols="40" rows="3"><?php echo $category->description;?></textarea></td>
				 <td style="text-align:left;font-size:13px;">
		<input type="text" value="<?php echo $category->order;?>" name="oldOrder<?=$category->id?>" id="oldOrder<?=$category->id?>" style="width:30px;" />
	</td><input type="hidden" value="<?php echo $category->id;?>" name="oldcat_id" id="oldcat_id"/>
	<input type="hidden" value="<?php echo $category->parent_id;?>" name="oldparent_id" id="oldparent_id"/>				
                <td style="text-align:left;font-size:13px;">	  
				 <span class="crudlinks">
<a href="#" title="update" id="<?php echo $category->id;?>"  style="margin-left:10px;float:left;" class="mylink" >Update</a></span>                          
                   <span class="crudlinks"><a href="#" onclick='deleteCategory(<?php echo $category->id ;?>)' style="float:left;" title="Delete">
						Delete
				  </a>
                  <br/><br/>
                  <a href="<?php echo base_url().'admin/category/edit_image/'.$category->id ;?>" style="margin-left:10px;">
                  Edit featured image</a>
                  </span>					  
                </td>		
			</form>				
              </tr>			   
              <?php endforeach;?>
			  <?php endif; ?>			  
            </tbody>           
          </table>
          <br/>
		  <span class="crudlinks"><a href="#"  id="deleteall">Delete Selected</a></span>
		  <br/><br/><br/><br/> 
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
			   url: '<?= base_url()?>admin/category/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   
<script>
function deleteCategory(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/category/delete/'+ id,
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
			"aoColumnDefs": [ { "bSortable": false, "aTargets": [0,2,3,4,5] } ],
		});
		
		$("#datatables tr").not(':first').hover(
  function () {
    $(this).css("background","#E6E6E6");
  }, 
  function () {
    $(this).css("background","");
  		}); 
 });
</script>
<script type='text/javascript'>
$(function() {
	  $('#add_category').click(function () {			  	
  		var title = $("#name").val();
		
		if (title == "") {
		  $("#name").focus();		  
  		  $("#name").css({"border": "1px solid red"});
		 
		  return false;
		}		
			$('#frm_add_category').ajaxForm({
			  success: function() {			
					location.reload();			
				}
			});			  		
      });	  
	});
</script>
<script type='text/javascript'>
    $(function () {
        $("#add_category").uniform();       
    });
</script> 
<script>
function changeType(box){
	location.href = "<?php echo base_url(); ?>admin/category/all/" + box.value ;
}
</script> 
<script type='text/javascript'>
$(function($){
    $(".mylink").click(function() {
     	var ID = $(this).attr('id');					
		$("#frm_edit_category"+ID).submit() ;
	 });				
  });
</script>
