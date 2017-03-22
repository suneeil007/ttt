
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.form.js"></script> 

<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
$(function() {
	  $('#add_test').click(function () {			  	
	  var name    = $("#name").val() ;
  	  var address = $("#address").val() ;
	  
	  $('#validate').fadeOut('slow');	
	  if(name ==""){
	    $("#name").focus();
	  	$('#validate').fadeIn('slow');	
				  return false;
	  }
	  
		$('.loading').fadeIn('slow');			
		$('#frmtestimonial').ajaxForm({
			  success: function() {
				$('.loading').fadeOut('slow');	
				$('#validate').fadeOut('slow');	
			  	$('#suc').show();				
				$('#add_test').attr('disabled','true');
				}
			});			  		
      });	  
	}); 
</script>  

<script type="text/javascript">
	$(document).ready(function () {	
		$('#nav li').hover(
			function () {
				//show its submenu
				$('ul', this).slideDown(100);
	
			}, 
			function () {
				//hide its submenu
				$('ul', this).slideUp(100);			
			}
		);
		
	});
	</script>

<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>

<style>
div.uploader{width:285px !important;}
div.uploader span.filename{width:198px !important;}
.img-circle { width:140px; height: 140px; border-radius: 150px; -webkit-border-radius: 150px; -moz-border-radius: 150px; float:left; margin:20px 0 0 5px;}
.TD{width:82%;  height:150px; float:right; display:block; border-left:15px solid #eee; margin-top:15px; padding:20px;}
.Client{width:30%; float:left; margin-top:-12px;}
.says{width:100%; float:left; font-size:13px;}
li{list-style:none;}
div.button span{height:30px;}

#panel, #flip {
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
    width:79%; float:right;
}

#panel {
    padding: 10px;
    display: none;
}

strong{line-height:35px; float:left; width:200px;}

form{padding:0 0 0 35px;}

.uploader{float:left; margin-top:-17px;}

.area{float:left; width:750px !important; border:1px solid #eee; border-radius:3px; margin-top:-10px;}

div.button{margin-top:20px !important; margin-left:-387px;}

.g-recaptcha{margin-left:30px !important;}

input{width:400px; border:1px solid #ddd; border-radius:3px; height:40px; float:left; padding:3px;}

label{width:90px; float:left;}


</style>


<h1>Our Valued Client Testimonials</h1>

<div class="TBox">
<ul>

   <?php if(isset($alltests) && count($alltests)>0) { ?>
		<?php foreach($alltests as $alltest) { ?>
  
    <li> 
		<div class="TLI">
	
		<img class="img-circle" src="<?php echo base_url().TESTIMONIALS_DIR.'/'.$alltest->filename ;?>">
	
		<div class="TD">
	 
		 <h4 class="Client"><?php echo $alltest->name ;?> says..</h4>
	
		<p class="says"><?php echo $alltest->comments ; ?></p>
		</div>
	
	   </div>
   </li>

<?php } ?>

<?php } ?>


</ul>
</div><!--/TBox-->

<div> <?php echo $this->pagination->create_links(); ?> </div>



<div class="CB" style="height:25px;"></div>

<div id="flip">Click to add review</div>
<div id="panel">



 
<!--<h5 style="padding-left:5px; font-size:16px; color:#0C9; border-bottom:1px solid #ccc; padding-bottom:2px; margin-bottom:2px;">Add Testimonial</h5>-->

	<form id="frmtestimonial" method="post" action="<?php echo base_url().'testimonial/index' ;?>">
     <label>Name</label>
		  <input id="name" name="name" type="text"  />


<div class="CB" style="height:15px;"></div>
   
   <label>Email</label>
		  <input id="email" name="email" type="email"/>

<div class="CB" style="height:15px;"></div>
   

    
	 <label>Photo</label>
		  <input id="test_pic" name="test_pic" type="file"  />	


<div class="CB" style="height:25px;"></div>
   
	         
	  <label>Reviews</label>
		  <textarea id="comment" name="comment" class="area"></textarea>

<div class="CB" style="height:15px;"></div>

<div style="display:block; padding-left:53px; width:300px;">
<div class="g-recaptcha" data-sitekey="6LegBQkTAAAAAM8ZecKBnQrFj8ZVVShTcc0urrDa" required></div>
</div>

<input type="submit" value="submit" name="submit_cms" id="add_test"  style="background:none; margin:7px 0 0 0 !important;"/> 


 <span style="display:none;color:green;font-style:italic;" id="suc">Thank you for your testimonial ! </span><label id="validate" style="display:none;font-style:italic;font-size:12px;color:red;margin-left:20px;">Please supply required fields! </label>


</form>

</div>
    


</div>


<div class="CB" style="height:25px;"></div>






    