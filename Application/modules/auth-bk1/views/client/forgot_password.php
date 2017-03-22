<style>
#forgetform .message {
	left:606px !important;
	color:#fff;
}

.title_text {
width: 100%;
text-align: left;
font-size: 14px;
color: #F2F2F2;
font-family: Verdana, Geneva, sans-serif;
background: #09F;
padding: 5px 10px;
margin-top:15px;
margin-bottom:30px;
}
</style>
<Script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.form.js"></script>     
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<div class="leftContent">
<p class="title_text">Forgot password</p>
<?php echo form_open("forgot_password", 'id="forgetform"');?>
      <label style="font-size:12px; color:#0083d7;"><strong>Email/login ID</strong></label>
      <input type="text" name="email" id="email" />
    <?php echo form_submit('submit', 'Submit', 'class="log-me-in", style="float:none;"');?>
<?php echo form_close();?>
</div>
<?php if(isset($featured_jobs)) echo $featured_jobs ;?>
<script>
$(function() {
$('#forgetform').validate({
		rules: {		   
			email: {				
				required: true,
				email : true,
				remote: {
                    type: 'POST',
                    url : "<?php echo base_url() ; ?>cms/forget_email_check"
				}
						
			}			
		},
			messages: {							
			email: {
				required :"enter your email",
				email    : "Please submit your correct email",
				remote   :"you are not a user"
         }
		},
		errorElement: "div",

        errorPlacement: function(error, element) {
            offset = element.offset();
            error.insertBefore(element)
            error.addClass('message');  // add a class to the wrapper
            error.css('position', 'absolute');
            error.css('left', offset.left + element.outerWidth());
            error.css('top', offset.top);
        }
});
});				 
</script>
