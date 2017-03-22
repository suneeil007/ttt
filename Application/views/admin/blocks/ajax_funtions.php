<script>
function deleteFile(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/cms/deleteFile/'+ id,
			   success: function(){
						 $("#fRow"+id).fadeOut('slow', function() {$(this).remove();});
				   	}
    			});
	}
	return false; }
function deleteImg(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/cms/deleteImage/'+ id,
			   success: function(){
						 $("#featured-img").fadeOut('slow', function() {$(this).remove();});
				   	}
    			});
	}
	return false; }
function deletePic(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/cms/deleteGallImg/'+ id,
			   success: function(){
						 $("#img"+id).fadeOut('slow', function() {$(this).remove();});
				   	}
    			});
	}
	return false; }
function deleteVid(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{					
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/cms/deleteVideo/'+ id,
			   success: function(){
						 $("#vid"+id).fadeOut('slow', function() {$(this).remove();});
				   	}
    			});
	}
	return false; }
</script>   

<script type="text/javascript">// <![CDATA[
    $(document).ready(function(){ 	      
        $('#menu_type').change(function(){ //any select change on the dropdown with id country trigger this code  
            $("#parent > option").remove(); //first of all clear select items
            var menu_id = $('#menu_type').val();  // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>admin/cms/get_cms_groups/"+menu_id, //here we are calling our user controller and get_cities method with the country_id
                 
                success: function(groups) //we're calling the response json array 'cities'
                {
					var options = '<option value="' + 0 + '">Select</option>';
                    $.each(groups,function(id,title) //here we're doing a foeach loop round each city with id as the key and city as the value
                    {
						options += '<option value="' + id + '">' + title + '</option>';
                    });
					$('#parent').html(options);
                }
                 
            });
             
        });
    });
    // ]]>
</script>

<script type="text/javascript">// <![CDATA[
    $(document).ready(function(){ 

            var menu_id = $('#menu_type').val();  // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>admin/cms/get_cms_groups/"+menu_id, //here we are calling our user controller and get_cities method with the country_id
                 
                success: function(groups) //we're calling the response json array 'cities'
                {
					var options = '<option value="' + 0 + '">Select</option>';
				//	var options = '';
                    $.each(groups,function(id,title) //here we're doing a foeach loop round each city with id as the key and city as the value
                    {
					
					if(id == <?php echo $pages->parent_id ;?>){
						options += '<option value="' + id + '"  selected="selected">' + title + '</option>'; 
					}
					else{
					options += '<option value="' + id + '">' + title + '</option>';
					}
                    });
					$('#parent').html(options);
                }
                 
            });
	});		 
</script>
<script>
    $(document).ready(function(){ 	      	
        $('#parent').change(function(){ 
		$.ajax({
			 type:"POST",
			 url:"<?php echo base_url()?>admin/cms/lastWeight/"+$('#menu_type').val()+"/"+ $('#parent').val(),
			 success:function(msg)
			 {
				$('#weight').attr('value',msg);
			 }

		  });
		});
		
		 $('#menu_type').change(function(){ 
		$.ajax({
			 type:"POST",
			 url:"<?php echo base_url()?>admin/cms/lastWeight/"+$('#menu_type').val()+"/"+ $('#parent').val(),
			 success:function(msg)
			 {
				$('#weight').attr('value',msg);
			 }

		  });
		});
	 });
 </script>        
<script>
function changeType(box)
{
	location.href = "<?php echo base_url(); ?>admin/cms/all/"+box.value+"/"+0 ;
}
</script>
<script type="text/javascript">
function deleteRow(id){	         

	if(confirm("Sure you want to delete ? There is NO undo !"))
	{			
	$('.custom-msg').fadeOut('slow');
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/cms/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
						 location.reload();												
				   	}
    			});
	}
	return false;
}
</script>
<script>
$(document).ready(function () {

    $('.checkall').on('click', function () {
        var $this = $(this),
            // Test to see if it is checked
            checked = $this.prop('checked'),
            //Find all the checkboxes
            cbs = $this.closest('table').children('tbody').find('.checkbox');
        // Check or Uncheck them.
        cbs.prop('checked', checked);
        //toggle the selected class to all the trs
        cbs.closest('tr').toggleClass('selected', checked);
    });
    $('tbody tr').on('click', function () {
        var $this = $(this).toggleClass('selected');
        $this.find('.checkbox').prop('checked', $this.hasClass('selected'));
        if(!$this.hasClass('selected')) {
            $this.closest('table').children('thead').find('.checkall').prop('checked', false); 
        }
    });
	
    $('a.deleteall').on('click', function(e){
        e.preventDefault();

            $trows = $('.checkbox:checkbox:checked');
            sel = !!$trows.length;
			
			var ids = [];
			var a =0 ;			
			 $("input.checkbox:checked").each(function(){
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
			deleteRow(ids[$i]) ;
		}
    });

function deleteRow(id){	         
		$.ajax({	
			   type: "GET",
			   url: '<?= base_url()?>admin/cms/delete/'+ id,
			   success: function(){
						 $(".row"+id).fadeOut('slow', function() {$(this).remove();});
					 	 $('.custom-msg').fadeIn('slow');												
				   	}
    			});
	}  
    
});
</script> 

