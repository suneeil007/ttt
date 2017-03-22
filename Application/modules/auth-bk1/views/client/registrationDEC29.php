<style>
#security_img img, #security_img_js img{ margin:10px 0px 10px 33px; max-width:200% !important; }

</style>
<div class="registrationContent">
<div class="verification">
<p>Choose whether you are Recruiters or Jobseekers, fill the form with your valid email ID, new pasword and click<br/> register button. We will immediately send you verification email. Please check your email and verify your account.<br/><span> Sometimes verification email may be in your spam or junk folder too.</span></p>
</div><!--end of verification-->

<div class="employerForm">
<h2>Organization/Recruiters</h2>
<form id="register_form_employer" name="register_form_employer" action="<?php echo base_url('registration/process/6') ;?>" method="post">
<div class="change01"><p>Orgnization Name</p><input type="text" name="username" class="change00"/></div>
<div class="change01"><p>Company Type</p>
           <select size="0" name="org_type" class="change03" data-rule-required="true" data-msg-required="Company type required" > 
              <option value="" class="change04">-------------- Select company --------------</option>
              <?php foreach(categories() as $category):?>
              <option value="<?php echo $category->id ; ?>" class="change04"><?php echo $category->description ; ?></option> 
              <?php endforeach ;?> 
          </select>
          </div>
<div class="change01"><p>Email Address</p><input type="text" name="email" class="change00"/></div>
<div class="change01"><p>New Password</p><input type="password" name="password" id="password_org" class="change00"/></div>
<div><p>Confirm Pasword</p><input type="password" name="repassword" class="change00"/></div>
<div style="clear:both;"></div>
<div class="change01" id="security_img"><p>Security Code</p>
	<?php echo $captcha_image ; ?>
    <a href="#" id="new_captcha"><img src="<?php echo base_url().'assets/front/images/ref.png'?>" title="Refresh" style="margin-top:35px;" /></a>
    <input type="text" name="captcha" id="captcha" class="change00"/>
</div>
<div><input type="submit" name="submit"  value="Submit" id="submit_employer" class="change020"/></div>
<span class="registering-employer"></span>
</form>
</div><!--end of employerForm-->

<div class="employeeForm">
<h2>Jobseekers</h2>
<form id="register_form_jobseeker" action="<?php echo base_url('registration/process/2') ;?>" method="post">
<div class="change01"><p>Display Name</p><input type="text" name="username" class="change00"/></div>
<div class="change01"><p>Gender</p>
    <div style="float:left;margin:6px 25px 0 33px;"><label>Male</label><input type="radio" name="gender" style="vertical-align:bottom;" value="Male" checked/></div>
    <div style="float:left;margin-top:6px;"><label>Female</label><input type="radio" name="gender" style="vertical-align:bottom;" value="Female"/></div>
</div>
<div class="change01"><p>Email Address</p><input type="text" name="email" class="change00"/></div>
<div class="change01"><p>New Password</p><input type="password" name="password" id="passwordj"  class="change00"/></div>
<div><p>Confirm Pasword</p><input type="password" name="repassword"  class="change00"/></div>
<div class="change01" id="security_img_js"><p>Security Code</p>
	<?php echo $captcha_image_js ; ?>
    <a href="#" id="new_captcha_js"><img src="<?php echo base_url().'assets/front/images/ref.png'?>" title="Refresh" style="margin-top:35px;" /></a>
    <input type="text" name="captcha_js" id="captcha_js" class="change00"/>
</div>
<div><input type="submit" name="submit_jobseeker" id="submit_jobseeker" value="Submit" class="change020"/></div>
<span class="registering-jobseeker"></span>
</form>
</div><!--end of employerForm-->

</div><!--end of registrationContent-->

<script>
$(function() {
$('#register_form_jobseeker').validate({
	rules: {
		   captcha_js: {
				required: true,
				remote: {
                    type: 'POST',
                    url : "<?php echo base_url() ;?>auth/client/check_captcha_image_js"			
				}
			},
			password: {
				required: true,
				minlength: 5
			},
			repassword: {
				required: true,
				minlength: 5,
				equalTo: "#passwordj"
			}, 
			username: {
				required: true
			},
			email: {				
				required: true,
				email : true,
				remote: {
                    type: 'POST',
                    url : "<?php echo base_url('auth/client/email_check') ;?>"	
				}
			}			
		},
			messages: {			
				password: {
				required: "password required",
				minlength: "password too small"
			},
			repassword: {
				required: "re-password required",
				minlength: "password too small",
				equalTo: "incorrect re-password"
			},
			username: {
				required:"username required"
         },
			email: {
				required :"email required",
				email    : "invalid email",
				remote   :"email unavailable"
         },captcha_js: {
				required:"security code required",
				remote:"security code incorrect"
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
			$("#submit_jobseeker").attr('disabled','disabled');
			$('.registering-jobseeker').fadeIn();
		 $.ajax({	
			   type: "POST",
			   url: $(form).attr('action'),			   
               data : $(form).serialize(),
			   success: function(){
				$("#register_form_jobseeker")[0].reset();
				$('.registering-jobseeker').fadeOut('slow');
				window.location="<?php echo base_url('registration/success'); ?>";		
				   	}
    			});				
  			}
		});
	});
</script>
<script>
$(function() {
$('#register_form_employer').validate({
	rules: {
		captcha: {
				required: true,
				remote: {
                    type: 'POST',
                    url : "<?php echo base_url() ;?>auth/client/check_captcha_image"			
				}
			},
			password: {
				required: true,
				minlength: 5
			},
			repassword: {
				required: true,
				minlength: 5,
				equalTo: "#password_org"
			}, 
			username: {
				required: true
			},
			email: {				
				required: true,
				email : true,
				remote: {
                    type: 'POST',
                    url : "<?php echo base_url('auth/client/email_check') ;?>"	
				}
			}			
		},
			messages: {			
				password: {
				required: "password required",
				minlength: "password too small"
			},
			repassword: {
				required: "re-password required",
				minlength: "password too small",
				equalTo: "incorrect re-password"
			},
			username: {
				required:"username required"
         },
			email: {
				required :"email required",
				email    : "invalid email",
				remote   :"email unavailable"
         },
			captcha: {
				required:"security code required",
				remote:"security code incorrect"
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
			$("#submit_employer").attr('disabled','disabled');
			$('.registering-employer').fadeIn();
		 $.ajax({	
			   type: "POST",
			   url: $(form).attr('action'),			   
               data : $(form).serialize(),
			   success: function(){
				$("#register_form_jobseeker")[0].reset();
				$('.registering-employer').fadeOut('slow');
				window.location="<?php echo base_url('registration/success'); ?>";
				   	}
    			});				
  			}
		});
	});
</script>
<script>
$(function(){
    $('#new_captcha').click(function(event){
        event.preventDefault();
        $(this).prev().attr('src', '<?php echo base_url() ; ?>auth/client/new_captcha?'+Math.random());
    });
	
	$('#new_captcha_js').click(function(event){
        event.preventDefault();
        $(this).prev().attr('src', '<?php echo base_url() ; ?>auth/client/new_captcha_js?'+Math.random());
    });
});
</script>