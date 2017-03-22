<?php $sub_cat 			= $this->uri->segment(5) ? $this->uri->segment(5) : -1 ; ?>
<div class="msg-box">
<h3>Manage Direct-Packages</h3>
<label style="display:none;" class="custom-msg">Successfully Deleted !</label>
</div>
<div class="horzline"></div>
<div style="float:right;"><span class="crudlinks"><a href="<?php echo base_url().'admin/product/all' ;?>">Add New Package</a></span></div>
<h1>Add Package</h1><br/>
	<div>		
	  <form action="<?php echo base_url().'admin/product/add_edit_product' ;?>" method="post" id="frm_product" enctype="multipart/form-data">
			<div class="element-block">
				<div class="title_lbl"><strong>Category</strong></div>
					<select name="category" id="category" onchange="changeSub(this.value, 0);">
                    <option value="-1">-- none --</option>	
						<?php if(isset($categories)){?>
							<?php foreach($categories as $category){?>
	<option value="<?php echo $category->id ; ?>" <?php if($this->uri->segment(4) == $category->id) echo ' selected';?>><?php echo $category->name ; ?></option>						
						<?php }}?>						
					</select>				
			</div><br/><br/>
            <div class="element-block">
            	<div class="title_lbl"><strong>Sub Category</strong></div>	
                    <select name="sub_category" id="sub_category" onchange="changeSub(<?php echo $this->uri->segment(4); ?>, this.value);">						
                        <option value="-1">-- none --</option>												
                    </select>
              </div><br/><br/>
			<div class="element-block">
				<div class="title_lbl"><strong>Package Name</strong></div>
				<input type="text"  name="name" id="name" value="<?php if(isset($product_row) && count($product_row)>0) echo $product_row->name ; ?>" />
			</div><br/><br/> 

            <div class="element-block">
				<div class="title_lbl"><strong>Time span</strong></div>
				<input type="text"  name="model" id="model" value="<?php if(isset($product_row) && count($product_row)>0) echo $product_row->model ; ?>" />
			</div><br/><br/>     
            <div class="element-block">
				<div class="title_lbl"><strong>Price</strong></div>
            <select name="currency">
              <option value="NRs" <?php if(isset($product_row) && count($product_row)>0 && $product_row->currency == 'NRs') echo ' selected' ; ?>>NRs</option>
              <option value="INRs" <?php if(isset($product_row) && count($product_row)>0 && $product_row->currency == 'INRs') echo ' selected' ; ?>>INRs</option>
              <option value="USD" <?php if(isset($product_row) && count($product_row)>0 && $product_row->currency == 'USD') echo ' selected' ; ?>>USD</option>
            </select>
				<input type="text"  name="price" id="price" value="<?php if(isset($product_row) && count($product_row)>0) echo $product_row->price ; ?>" />
				<input type="checkbox" id="price_publish" name="price_publish" style="margin-left:10px;" <?php if(isset($product_row) && count($product_row)>0 && $product_row->hide_price == 'yes') echo ' checked' ; ?>/><label style="margin-left:5px;">Hide ?</label>
			</div><br/><br/>
			<div class="element-block">
				<div class="title_lbl"><strong>Description</strong></div>
				<div style="float:left;"><textarea  name="description" id="description"><?php if(isset($product_row) && count($product_row)>0) echo $product_row->description ; ?>
                </textarea>
				<?php echo display_ckeditor($ckeditor); ?>
				</div>
			</div>

         <div class="CB" style="height:30px;"></div>
             
           <div class="element-block" style="margin-top:-220px;">
				<div class="title_lbl"><strong>Itinary</strong></div>
				<div style="float:left;"><textarea  name="description3" id="description3"><?php if(isset($product_row) && count($product_row)>0) echo $product_row->description3 ; ?>
                </textarea>
				<?php echo display_ckeditor($ckeditor_3); ?>
				</div>
			</div>

   <div class="CB" style="height:30px;"></div>

           <div class="element-block">
				<div class="title_lbl"><strong>Date and Price</strong></div>
				<div style="float:left;"><textarea  name="description4" id="description4"><?php if(isset($product_row) && count($product_row)>0) echo $product_row->description4 ; ?>
                </textarea>
				<?php echo display_ckeditor($ckeditor_4); ?>
				</div>
			</div>

   <div class="CB" style="height:30px;"></div>

           <div class="element-block">
				<div class="title_lbl"><strong>Details</strong></div>
				<div style="float:left;"><textarea  name="description5" id="description5"><?php if(isset($product_row) && count($product_row)>0) echo $product_row->description5 ; ?>
                </textarea>
				<?php echo display_ckeditor($ckeditor_5); ?>
				</div>
			</div>

   <div class="CB" style="height:30px;"></div>

			<div class="element-block">
			
				<div class="title_lbl"><strong>Featured Image</strong></div>
 
<?php if(isset($product_row) && count($product_row)>0 && !empty($product_row->image)){?>
	<div style="float:left;" id="row<?php echo $product_row->id ;?>">
		<img src="<?php echo base_url().PRODUCTS_DIR.'/'.$product_row->image ;?>" width="80" />    
    <a href="#" onclick='deleteImage(<?php echo $product_row->id ;?>)' title="Remove" id="rem">[X]</a> 
    </div>  
    <?php }?>
			<input type="file" name="product_image" id="product_image" />					
	</div>
            <div class="CB" style="height:30px;"></div>
            <input type="hidden" name="p_id" value="<?php if(isset($product_row) && count($product_row)>0) echo  $product_row->id ;?>" />
			<input type="submit" name="add_product" id="add_product" value="Add Package"/>
			</form>
    </div>
	<br/><br/>
	<table class="display" id="datatables">
            <thead>
              <tr>
			    <th width="10"><input style="margin-left:5px;" type="checkbox"  class="checkallf" /></th>

			    <th class="alignleft" style="width:50px;">S.N.</th>
                <th class="alignleft">Name</th>
                <th class="alignleft">Time span</th>

                <th class="alignleft">Price</th>				
                <th class="alignleft" >Image</th>	
															
                <th class="alignleft" >Hide Price ?</th>																					
                <th class="alignleft" style="width:180px;">Actions</th>
              </tr>
            </thead>           
            <tbody id="addCategory">			
			 <?php if(!empty($products)) : ?><?php $counter = 0;?>
                <?php foreach($products as $product) : ?>
              <tr class="row<?=$product->id?>" <?php if($counter%2 == 0)echo ' id="tble-row-even"' ; else echo ' id="tble-row-odd"' ;?>><?php $counter++ ;?>
			    <td><input style="margin-right:6px;" type="checkbox" value="<?=$product->id?>" class="checkboxf" /></td>

			  	<td style="width:10px;font-size:13px;"><?php echo $counter ;?></td>
				<td style="text-align:left;font-size:13px;"><?php echo $product->name;?></td>
				<td style="text-align:left;font-size:13px;"><?php echo $product->model;?></td>
				<td style="text-align:left;font-size:13px;"><?php echo $product->currency.' '.$product->price;?></td>
				<td style="font-size:13px;text-align:left;width:130px;">
						<?php if($product->image !=''){?>
			<img src="<?php echo base_url().PRODUCTS_DIR.'/'.$product->image; ?>" height="60" width="100" class="cat_pic"/>
							<?php }?>
							</td>
				
				<td style="text-align:left;font-size:13px;"><a href="#" onclick='price_status(<?php echo $product->id ;?>)'><?php echo $product->hide_price;?></a></td> 				 
                <td style="text-align:left;font-size:13px;">	  
				 <span class="crudlinks">
				 <?php if(isset($parentcategory[$product->id]) && $parentcategory[$product->id]->parent_id != 0){?>
<a href="<?php echo base_url().'admin/product/all/'.$parentcategory[$product->id]->parent_id .'/'.$product->cat_id .'/'.$product->id ;?>" title="save" style="margin-left:10px;float:left;">Edit</a> <?php }else{?>
<a href="<?php echo base_url().'admin/product/all/'.$product->cat_id.'/'.$parentcategory[$product->id]->parent_id  .'/'.$product->id ;?>" title="save" style="margin-left:10px;float:left;">Edit</a>
<?php }?>
</span>      
<span class="crudlinks"><a href="#" onclick='deleteProduct(<?php echo $product->id ;?>)' style="float:left;" title="Delete" class="row<?php echo $product->id ;?>">
						Delete
				  </a></span>
				 
                </td>				
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
			   url: '<?= base_url()?>admin/product/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 $(".custom-msg").show();
				   	}
    			});
	}
	
});
</script>   

<script>
function deleteProduct(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/product/delete/'+ id,
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
function price_status(id){	         				
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/product/price_status/'+ id,
			   success: function(){
			   location.reload();
				   	}
    			});
	}
</script>

<script>
function deleteVeriety(id){	         
	if(confirm("Sure you want to delete ? There is NO undo !"))	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/product/delete_veriety/'+ id,
			   success: function(){
					 $("#img"+id).fadeOut('slow', function() {$(this).remove();});
				   	}
    			});
	}
		return false; 
	}
</script>

<script>
function deleteColor(id){	         
	if(confirm("Sure you want to delete ? There is NO undo !"))	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/product/delete_color/'+ id,
			   success: function(){
					 $("#imgC"+id).fadeOut('slow', function() {$(this).remove();});
				   	}
    			});
	}
		return false; 
	}
</script>

<script>
function deleteImage(id){	         
	if(confirm("Sure you want to delete ? There is NO undo !"))	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/product/deleteImage/'+ id,
			   success: function(){
					 $("#row"+id).fadeOut('slow', function() {$(this).remove();});
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
			"aoColumnDefs": [ { "bSortable": false, "aTargets": [0,5,7] } ],
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
	  $('#add_product').click(function () {			  	
  		var title 		= $("#name").val();
		var category    = $("#category").val();
		
		if (category == "-1") {
		  $("#category").focus();	
		  alert("Please select category");	  
		  return false;
		}	
		
		
		if (title == "") {
		  $("#name").focus();		  
		  alert("Please insert product name");	  		  
		  return false;
		}
		
			$('#frm_product').ajaxForm({
			  success: function() {			
					location.reload();			
				}
			});			  		
      });	  
	});
</script>
<script type='text/javascript'>
    $(function () {
        $("#add_product").uniform();       
    });
</script> 

<script>
function changeSub(parent, sub_cat){
	location.href = "<?php echo base_url(); ?>admin/product/all/" + parent +'/'+ sub_cat;	 	
	}
</script>

<script type="text/javascript">// <![CDATA[
    $(document).ready(function(){ 
        $('#category').change(function(){ //any select change on the dropdown with id country trigger this code  

            $("#sub_category > option").remove(); //first of all clear select items
            var menu_id = $('#category').val();  // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>admin/product/get_sub_categories/"+ menu_id,                  
                success: function(groups) 
                {
					var options = '<option value="-1">-- none --</option>';
                    $.each(groups,function(id,name) 
                    {					
						options += '<option value="' + id + '">' + name + '</option>';
                    });
					$('#sub_category').html(options);
                }
                 
            });
             
        });
    });
    // ]]>
</script>
<script type="text/javascript">// <![CDATA[
    $(document).ready(function(){ 
            var menu_id = $('#category').val();  
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>admin/product/get_sub_categories/"+menu_id, 
                success: function(groups) 
                {	
					var options = '<option value="-1">-- none --</option>';
					
                    $.each(groups,function(id,title) {					
						if(id == <?php echo $sub_cat ;?>){
							options += '<option value="' + id + '"  selected="selected">' + title + '</option>'; 
						}else{						
							options += '<option value="' + id + '">' + title + '</option>';
						}
					 });
					$('#sub_category').html(options);
                }
                 
            });
	});		 
</script>
<script type='text/javascript'>
$(function() {
$("input:checkbox").click(function() {
    if ($(this).is(":checked")) {
        var group = "input:checkbox[name='" + $(this).attr("name") + "']";
        $(group).prop("checked", false);
        $(this).prop("checked", true);
    } else {
        $(this).prop("checked", false);
     }
   });
 });
 </script>