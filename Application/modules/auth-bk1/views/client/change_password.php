<div class="right-content-wrapper">
<div class="content-title">Change Password</div>
<div class="CB"></div>
<form class="form-horizontal" action="" method="post" id="frm-change-password"><br />
 		<div class="control-group">
            <label class="control-label" for="password">Old password</label>
            <div class="controls">
              <input type="password" name="password">              
            </div>
        </div>  
        
		<div class="control-group">
            <label class="control-label" for="newpassword">New password</label>
            <div class="controls">
              <input type="password" name="newpassword" id="newpassword">              
            </div>
        </div>  

		<div class="control-group">
            <label class="control-label" for="repassword">Confirm new password</label>
            <div class="controls">
              <input type="password" name="repassword">              
            </div>
          </div>  
          	<input type="submit" class="save-button" id="password-submit" value="Save Changes"  />
</form>
</div>

<script>
$(function() {
$('#frm-change-password').validate({
	rules: {
			newpassword: {
				required: true,
				minlength: 5
			},
			repassword: {
				required: true,
				minlength: 5,
				equalTo: "#newpassword"
			}, 
			password: {
				required: true,
				remote: {
                    type: 'POST',
                    url : "<?php echo base_url('auth/client/old_password_check') ;?>"	
				}
			}},
			messages: {			
				newpassword: {
				required: "password required",
				minlength: "password too small"
			},
			repassword: {
				required: "re-password required",
				minlength: "password too small",
				equalTo: "incorrect re-password"
			},
			password: {
				required:"password required",				
				remote   :"password does not match"
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
        },
		
		 submitHandler: function(form) { 
			$('#save-password').remove();	
		 	$( "<div id='save-password'></div>" ).insertAfter( "#password-submit" );
			$('#save-password').html('<span class="loading"></span>');
		 $.ajax({	
			   type: "POST",
			   url: $(form).attr('action'),			   
               data : $(form).serialize(),
			   success: function(){				   
					$("#frm-change-password")[0].reset();
					$('#save-higher').html('');	
					$('#save-password').html('<label class="success-msg"><?php echo SUCCESS_PASSWORD_CHANGED ;?></label>');	
					$('.success-msg').delay(5000).fadeOut('slowly');		
				 }
			  });				
  			}
		});
	});
</script>
