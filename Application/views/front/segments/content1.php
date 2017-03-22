
<div class="line" style="width:100%; height:1px; background:#ddd;"></div>

<div class="wrapper1">

<h1 align="center">Cool Packages</h1>

 <?php if($this->uri->segment(2) =='' && $this->uri->segment(3) == ''){ ?> 
          
       <div class="choice-products">

	<?php if(isset($random_products) && count(isset($random_products))>0){  $i = 0 ; ?>

	 <ul class="ceebox html" style="margin-top:30px; padding:0;">

   		   <?php  foreach($random_products as $p_product){ $i++ ;?>

           <?php $j=1; $k=1; ?>

		   <li id="wrapper2-li">
  
   		                           

                              <div class="article-home">	
									<div class="oneT"><a href="#" rel="prettyPhoto" title="">
									   <img src="<?php echo base_url().PRODUCTS_DIR.'/'.$p_product->image ; ?>" width="366" height="237" ></a></div>
                                          <div class="priceTag">$ <?php echo $p_product-> price ;?></div>  
										   <div style="height:15px;"></div>			
										   <a href="<?php echo base_url().'tour/'.decode_title(strtolower($p_product->name)).'/'.$p_product->id ;?>" class="Wrapper2-a"><?php echo $p_product->name ;?> </a>
										 <div class="Wrapper2-days"><div class="T"><?php echo $p_product->model ;?></div>
                                       

 <a href="#" data-toggle="modal" data-target="#myModal<?php echo $j++; ?>"  style="float:right; display:block; margin-top:-22px;">
      <button type="button" class="btn btn-info">Interested</button>
     </a>
                                      </div>	
							 </div>

          </li>


								



  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $k++; ?>" role="dialog" style="z-index:99999999999999999999999999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Booking Form</h4>
        </div>
       <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url().'admin/booking/add_booking';?>" method="post" id="reset_input"  enctype="multipart/form-data" >

<div class="CB" style="height:10px;"></div>
    
     
      <div class="control-group">
            <label class="control-label" for="input01">Package Name</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="name" disabled value="<?php echo $p_product-> name;?>" required>
              
            </div>
          </div>
   

<div class="CB" style="height:8px;"></div>
   
      <div class="control-group">
            <label class="control-label" for="input01">No. of Persons</label>
            <div class="controls">
              <input type="number" class="input-xlarge" id="input01" name="persons" required>
              
            </div>
          </div>
   
<div class="CB" style="height:8px;"></div>

  <div class="control-group">
            <label class="control-label" for="input01">Email</label>
            <div class="controls">
              <input type="email"  class="input-xlarge" id="email" name="email" required>
              
            </div>
          </div>

<div class="CB" style="height:8px;"></div>

  <div class="control-group">
            <label class="control-label" for="input01">Contact No.</label>
            <div class="controls">
              <input type="tel" class="input-xlarge" name="tel" id="tel" required>
              
            </div>
          </div>

<div class="CB" style="height:8px;"></div>

     <div class="control-group">
            <label class="control-label" for="input01">Country </label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="country" required>
              
            </div>
          </div>

<div class="CB" style="height:8px;"></div>


      <div class="control-group">
            <label class="control-label" for="input01">Arrival Date</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="arrivalDate" required>
              
            </div>
          </div>

<div class="control-group"> 
    <label for="name" class="control-label"> Description </label><br />
    <textarea class="textArea" name="description"  style="margin-bottom:15px;"></textarea> 
  </div>

<input type="submit" name="" id="" value="Submit"   style="padding:3px;cursor:pointer;"/>

<input type="submit" name="add_job" id="add_job" value="Reset" onclick="myFunction()"   style="padding:3px;cursor:pointer;"/>
       
</form>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

		<?php } ?>    
      
	</ul>

	<?php } ?>          			  
	         </div>
                       
                          
	<?php } else{ echo $contents ; }	 ?>		


</div>

<style>
.control-label{float:left; font-family:arial; font-weight:normal; font-size:14px; margin-right:20px; width:140px;}

.input-xlarge{width:300px; height:32px; border:1px solid #eee; border-radius:3px; padding-left:4px;}

.textArea{width:400px; height:130px; border:1px solid #eee; border-radius:3px;}

</style>
<script>
function myFunction() {
    document.getElementById("reset_input").reset();
}
</script>


