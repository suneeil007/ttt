<link rel="stylesheet" href="<?php echo base_url();?>assets/uniform/css/uniform.default.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.3.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.form.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/uniform/jquery.uniform.js" language="javascript"></script> 
<script type='text/javascript'>
    $(function () {
        $("select, input, button,textarea").uniform();       
    });
</script>
<script>
$(function() {
	  $('#submit').click(function () {		  
	   
	  var name    = $("#name").val() ;
  	  var address = $("#address").val() ;
	  var email   = $('#email').val();
	  
	  $('#validate').hide();	
	  $('#invalid_email').hide();
	  if(name ==""){
	    $("#name").focus();
	  	$('#validate').fadeIn('slow');	
				  return false;
	  }
	   if(address ==""){
	    $("#address").focus();
	  	$('#validate').fadeIn('slow');	
				  return false;
	  }
	  
	  if(email== ''){
		   $('#email').focus();
		   $('#validate').fadeIn('slow');	
		         return false;
		}
		if(IsEmail(email)==false){
			$('#invalid_email').fadeIn('slow');
			return false;
		}
	  		  	
		$('.loading').fadeIn('slow');			
		$('#frmfeedback').ajaxForm({
			  success: function() {
				$('.loading').fadeOut('slow');	
			  	$('#suc').show();
			   $('#invalid_email').hide();
				$('#submit').attr('disabled','true');
				}
			});			  		
      });	  
	}); 
	
	function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }
</script>
	<h1>Feedback</h1>
 	<div id="feedback">
	<form id="frmfeedback" method="post" action="<?php echo base_url().'feedback/index' ;?>">
		  <strong>Name</strong><br/>
		  <input id="name" name="name" type="text" /><br/><br/>
	  
		  <strong>Address</strong><br/>
		  <input id="address" name="address" type="text" /><br/><br/>
	  
		  <label for="email"><strong>Email</strong></label><br/>
		  <input id="email" name="email" type="text" />		        
	  <br/><br/>
	    <strong>Country</strong><br/>
		  <input id="country" name="country" type="text" />		        
	  <br/><br/>	  
		  <strong>Comment</strong><br/>
		  <textarea id="comment" name="comment" ></textarea>		        
	  <br/><br/>
<input type="submit" value="submit" name="submit_cms" id="submit" />
</form>
  <span style="display:none;color:green;font-style:italic;font-size:12px;" id="suc">Thank you for your feedback ! </span>
  <label id="validate" style="display:none;font-style:italic;font-size:12px;color:red;margin-left:20px;">Please supply required fields! </label><span id="invalid_email" style="display:none;font-style:italic;font-size:12px;color:red;margin-left:20px;">This email is not valid</span>
	<span class="loading"></span>
	<br/>
 </div>

    
    