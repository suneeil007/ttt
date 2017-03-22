<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.form.js"></script> 
<script>
$(function() {
	  $('#add_booking').click(function () {			  	
	  var name    = $("#name").val() ;
  	  var address = $("#address").val() ;
	  
	  $('#validate').fadeOut('slow');	
	  if(name ==""){
	    $("#name").focus();
	  	$('#validate').fadeIn('slow');	
				  return false;
	  }
	  
		$('.loading').fadeIn('slow');			
		$('#booking_input').ajaxForm({
			  success: function() {
				$('.loading').fadeOut('slow');	
				$('#validate').fadeOut('slow');	
			  	$('#suc').show();				
				$('#add_booking').attr('disabled','true');
				}
			});			  		
      });	  
	}); 
</script>  
<?php echo $this->load->view('front/segments/headerP')?>

<div class="wrapper1" style="margin-top:10px;">

<div class="leftContent">

<div class="banner-text">
<div class="text-holder">
<div class="text-frame">
<strong class="title">Popular Packages</strong>
<div class="CB" style="height:10px;"></div>
		<ul>
 <?php if(isset($popular_products) && count($popular_products)>0) { ?>
		<?php foreach($popular_products as $blog) { ?>

		<li><a href="<?php echo base_url().'tour/'.decode_title(strtolower($blog->name)).'/'.$blog->id ;?>"><?php echo $blog->name; ?></a></li>
<? } ?>

<? } ?>

		</ul>



</div></div></div>
</div><!--/end of leftContent-->


<div class="contentRight" style="overflow:hidden;">

	<h3 style="border-bottom:1px solid #037BD5; padding-bottom:20px;">

	 <span style=" float:left; padding-right:20px;"> <?php if(isset($product_detail))echo $product_detail->name ;?> </span>

     
	 <span style="background:#ddd; padding:5px 5px; font-size:18px;"> <?php if(isset($product_detail))echo $product_detail->model ;?> </span>

      <?php // echo var_dump($product_detail); ?> 
	</h3>
	
	<div class="trailBox" style="width:100%; padding:5px; border:1px solid #037BD5; overflow:hidden; position:relative;">
	   <img src="<?php echo base_url().PRODUCTS_DIR .'/'.$product_detail->image ;?>" width="900" height="311"/>

    <div class="priceTag" style="width:100px; height:50px; font-size:18px; font-weight:bold; position:absolute; bottom:50px; right:0px !important; line-height:50px;">$ <?php echo $product_detail->price;?></div> 

	</div><!--/end of trailBox-->
	
	<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
	
	<div id="fb-root"></div>
	
	<div class="CB" style="height:25px;"></div>
	
	<div class="trailBox">
	
	<div class="container1">
	 <!-- <h2>Dynamic Tabs</h2>-->
  <ul class="nav nav-tabs" style="background:#f5f5f5;">
		 <li class="active"><a data-toggle="tab" href="#home">Overview</a></li>
		   <li><a data-toggle="tab" href="#menu1">Itinenary</a></li>
		      <li><a data-toggle="tab" href="#menu2">Date & Price</a></li>
		   <li><a data-toggle="tab" href="#menu3">Details</a></li>
     <a href="#" data-toggle="modal" data-target="#myModal"  style="float:right; display:block; margin:6px 7px 0 0;">
      <button type="button" class="btn btn-info">Book this trip</button>
     </a>
  </ul>

  <div class="tab-content">

  <div id="home" class="tab-pane fade in active">
      
      <p style="overflow:hidden; text-align:justify; width:100%; float:left; margin-top:-10px; ">
        <div class="trip-overview" style="border:1px solid transparent;">
<table class="table responsive" width="100%;">
<tbody>
<tr>
<td width="20%">
<i class="fa fa-clock-o"></i>
<span class="desctiption-title "> Duration:</span>
</td>
<td width="30%"><?php echo $product_detail->model; ?></td>
<td width="20%">
<i class="fa fa-barcode"></i>
<span class="desctiption-title"> Trip Code:</span>
</td>
<td width="30%"><?php echo $product_detail->trip_code; ?></td>
</tr>
<tr>
<td>
<i class="fa fa-hand-o-right"></i>
<span class="desctiption-title"> Primary activity:</span>
</td>
<td><?php echo $product_detail->p_activity; ?></td>
<td>
<i class="fa fa-hand-o-right"></i>
<span class="desctiption-title"> Secondary activity:</span>
</td>
<td><?php echo $product_detail->s_activity; ?></td>
</tr>
<tr>
<td>
<i class="fa fa-group"></i>
<span class="desctiption-title"> Group size:</span>
</td>
<td><?php echo $product_detail->Group_size; ?> </td>
<td>
<i class="fa fa-check-circle-o"></i>
<span class="desctiption-title"> Max-Altitude:</span>
</td>
<td> <?php echo $product_detail->max_altitude; ?> </td>
</tr>
<tr>
<td>
<i class="fa fa-globe"></i>
<span class="desctiption-title"> Country:</span>
</td>
<td><?php echo $product_detail->country; ?></td>
<td>
<i class="fa fa-road"></i>
<span class="desctiption-title"> Transportation:</span>
</td>
<td><?php echo $product_detail->transportation; ?></td>
</tr>
<tr>
<td>
<i class="fa fa-plane"></i>
<span class="desctiption-title"> Arrival on:</span>
</td>
<td><?php echo $product_detail->arrrival_on; ?></td>
<td>
<i class="fa fa-plane"></i>
<span class="desctiption-title"> Departure from:</span>
</td>
<td><?php echo $product_detail->departure_from; ?></td>
</tr>
<tr class="border-bottom"> </tr>
<tr>
<td>
<i class="fa fa-cutlery"></i>
<span class="desctiption-title"> Meals:</span>
</td>
<td colspan="3"> <?php echo $product_detail->meals; ?></td>
</tr>
<tr>
<td>
<i class="fa fa-check-circle-o"></i>
<span class="desctiption-title"> Accomodation:</span>
</td>
<td colspan="3"> <?php echo $product_detail->accomodation; ?></td>
</tr>
</tbody>
</table>

<?php if(isset($product_detail))echo $product_detail->description ;?> 

</div>
      </p>
    </div>

  <div id="menu1" class="tab-pane fade">
      <p style="overflow:hidden; text-align:justify; width:100%; float:left; margin-top:-10px; ">
          <?php if(isset($product_detail))echo $product_detail->description3 ;?> 
        </p> 
    </div>

  <div id="menu2" class="tab-pane fade">
  <p style="overflow:hidden; text-align:justify; width:100%; float:left; margin-top:-10px; ">
          <?php if(isset($product_detail))echo $product_detail->description4 ;?>
         </p>  
    </div>

  <div id="menu3" class="tab-pane fade">
     <p style="overflow:hidden; text-align:justify; width:100%; float:left; margin-top:-10px; ">
		  <?php if(isset($product_detail))echo $product_detail->description5 ;?>
		</p>
  </div>

  

</div>



</div><!--/end of trailBox-->

</div><!--/end of contentRight-->

<div class="CB" style="height:30px;"></div>
</div>

</div>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="z-index:99999999999999999999999999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Booking Form</h4>
        </div>
       <div class="modal-body">
        <form class="form-horizontal" id="booking_input"  action="<?php echo base_url().'admin/booking/add_booking';?>" method="post">

       <div class="CB" style="height:8px;"></div>
    
      <div class="control-group">
            <label class="control-label" for="input01">Package Name</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="name" value="<?php echo $product_detail->name?>">
              
            </div>
          </div>
   

<div class="CB" style="height:8px;"></div>
   
      <div class="control-group">
            <label class="control-label" for="input01">No. of Persons</label>
            <div class="controls">
              <input type="number" class="input-xlarge" id="input01" name="persons">
              
            </div>
          </div>
   
<div class="CB" style="height:8px;"></div>

  <div class="control-group">
            <label class="control-label" for="input01">Email</label>
            <div class="controls">
              <input type="email"  class="input-xlarge" id="email" name="email">
              
            </div>
          </div>

<div class="CB" style="height:8px;"></div>

  <div class="control-group">
            <label class="control-label" for="input01">Contact No.</label>
            <div class="controls">
              <input type="tel"  class="input-xlarge"  name="tel" id="tel">
              
            </div>
          </div>

<div class="CB" style="height:8px;"></div>

     <div class="control-group">
            <label class="control-label" for="input01">Country </label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="country">
              
            </div>
          </div>

<div class="CB" style="height:8px;"></div>


      <div class="control-group">
            <label class="control-label" for="input01">Arrival Date</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="arrivalDate">
              
            </div>
          </div>




<div class="control-group"> 
    <label for="name" class="control-label"> Description </label><br />
    <textarea class="textArea" name="description"  style="margin:-14px 0 15px; 0"></textarea> 
  </div>

<input type="submit" name="" value="Submit" id="add_booking"    style="padding:3px;cursor:pointer;"/>

<input type="submit" name="add_job" id="add_job" value="Reset" onclick="myFunction()"   style="padding:3px;cursor:pointer;"/>

<span style="display:none;color:green;font-style:italic;" id="suc">Thank you for your testimonial ! </span><label id="validate" style="display:none;font-style:italic;font-size:12px;color:red;margin-left:20px;">Please supply required fields! </label>

       
</form>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

	
<?php echo $this->load->view('front/segments/footer')?>



<script>

function myFunction() {
    document.getElementById("reset_input").reset();
}
</script>

<style>
.banner-text .title::before {
    border-left: 9px solid transparent;
    border-top: 9px solid #5a2802;
    bottom: -9px;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    width: 0;}

.banner-text .title::after {
    border-bottom: 25px solid transparent;
    border-right: 21px solid #fff;
    border-top: 23px solid transparent;
    content: "";
    height: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: 0;
}
.banner-text .title {
    background: #e44141 none repeat scroll 0 0;
    color: #fff;
    display: inline-block;
    font: 17px/21px "Comic Sans MS",cursive;
    margin: 0 0 0 -9px;
    padding: 10px 71px 18px 43px;
    position: relative;
    margin-top:20px;
}
.banner-text .text-frame {

}

.PackWrap{ width:auto; height:10px; margin-top:5px; padding:0 4px; margin-top:20px;}

.PopINner1{font: 14px/29px "Comic Sans MS" !important; float:left; width:70%;}

.PopINner2{font: 11px/5px "Comic Sans MS",cursive; float:right; width:30%; text-align:right;}

.POPINNER{width:auto; overflow:hidden;}

.POPINNER ul li{list-style:square inside !important;}

.POPINNER ul{margin:0; padding:0;}

.control-label{float:left; font-family:arial; font-weight:normal; font-size:14px; margin-right:20px; width:140px;}

.input-xlarge{width:300px; height:32px; border:1px solid #eee; border-radius:3px; padding-left:4px;}

.textArea{width:400px; height:130px; border:1px solid #eee; border-radius:3px;}

.trailBox{box-shadow:none;}

.desctiption-title{font-size:14px;}

td{font-size:12px;}

i{padding-right:8px;}
</style>


