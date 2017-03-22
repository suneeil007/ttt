<?php echo js_jobseeker('jquery-ui.js') ; ?>
<?php echo css_jobseeker('jquery-ui.css','screen',1) ; ?>
<style>
#security_img img, #security_img_js img{ margin:4px 0px 10px 22px; max-width:200% !important;}
.controls{}
.control-label{ float:left !important; width:120px !important; font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:26px; text-align:right; margin-right:21px;}
input[type="text"] {
    border: 1px solid #6b95f9;
    border-radius: 3px;
    font-size: 12px;
    height: 26px;
    line-height: 25px;
    padding-left: 5px;
    width: 322px;
}
input[type="password"] {
    border: 1px solid #6b95f9;
    border-radius: 3px;
    font-size: 12px;
    height: 26px;
    line-height: 25px;
    padding-left: 5px;
    width: 322px;
}
select {
    background-color: #ffffff;
    border: 1px solid #6b95f9;
    border-radius: 3px;
    width: 328px;
}
.cate_list_option {
    border: 1px solid #fff;
    height: 118px !important;
    list-style-type: none;
    overflow: auto;
    padding: 4px 5px 7px;
    width: 67.5%;
    border-radius:3px;
    float:right;
    margin-top:-51px;
}
#frm_profile ul{
    border: 1px solid #ccc;
    height: 100px !important;
    list-style-type: none;
    overflow: auto;
    padding: 4px 5px 7px;
    width: 67.5%;
    display:block;
}
ul li{list-style:none;}
</style>
<div class="registrationContent" style="overflow:hidden; background:#5BC0DE;">

<div class="verification">
<p>Choose whether you are Recruiters or Jobseekers, fill the form with your valid email ID, new pasword and click<br/> register button. We will immediately send you verification email. Please check your email and verify your account.<br/><span> Sometimes verification email may be in your spam or junk folder too.</span></p>
</div><!--end of verification-->

<div class="employerForm">
<h2>Organization/Recruiters Registration Form</h2>
<form id="register_form_employer" name="register_form_employer" action="<?php echo base_url('registration/process/6') ;?>" method="post">


              <div class="control-group">
                <label class="control-label" for="home_phone">Organization Name</label>
                <div class="controls">
                  <input type="text"  name="username" value="<?php if($isEdit) echo $personal_info->home_phone ;?>">                  
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="professional_status">Company Type</label>
                <div class="controls">
     <select  id="select01"  name="org_type" data-rule-required="true" data-msg-required="Company type required">
                    <option value="">Select Your Company Type</option>
                          <?php foreach(categories() as $category):?>
              <option value="<?php echo $category->id ; ?>"><?php echo $category->description ; ?></option> 
              <?php endforeach ;?> 
                  </select>
                </div>
              </div>
 
              <div class="control-group">
                <label class="control-label" for="email">Email Address</label>
             <div class="controls">
                  <input type="text" class="input-xlarge"  name="email"  value="<?php if($isEdit) echo $personal_info->email ;?>">              
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="alt_email">Password</label>
                <div class="controls">
                  <input type="password" class="input-xlarge" id="password_org"  name="password" value="<?php if($isEdit) echo $personal_info->alt_email ;?>">              
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="alt_email">Confirm Password</label>
                <div class="controls">
                  <input type="password" class="input-xlarge"  name="repassword" value="<?php if($isEdit) echo $personal_info->alt_email ;?>">              
                </div>
              </div>  

              <div class="control-group">
            <label class="control-label" for="org_size">Organization Size</label>
            <div class="controls">
              <select id="select010" name="org_size" data-rule-required="true"  data-msg-required="Company size required" >
                <option value="">Select Your Organization Size</option>
                <option value="0-10" <?php if($isEdit && $company_profile->org_size == '0-10') echo ' selected';?>>0-10</option>
                <option value="10-25" <?php if($isEdit && $company_profile->org_size == '10-25') echo ' selected';?>>10-25</option>
                <option value="25-100" <?php if($isEdit && $company_profile->org_size == '25-100') echo ' selected';?>>25-100</option>
                <option value="above 100" <?php if($isEdit && $company_profile->org_size == 'above 100') echo ' selected';?>>above 100</option>
              </select>
            </div>
          </div> 
        
              <div class="control-group">
            <label class="control-label" for="ownership">Ownership</label>
            <div class="controls">
              <select id="select0123" name="ownership" data-rule-required="true" data-msg-required="ownership required">
                <option value="">Select Your Ownership</option>
                <option value="Public" <?php if($isEdit && $company_profile->ownership == 'Public') echo ' selected';?>>Public</option>
                <option value="Private" <?php if($isEdit && $company_profile->ownership == 'Private') echo ' selected';?>>Private</option>
                <option value="Multinational" <?php if($isEdit && $company_profile->ownership == 'Multinational') echo ' selected';?>>Multinational</option>
              </select>
            </div>
          </div> 
          
              <div class="control-group">
            <label class="control-label" for="country">Country</label>
            <div class="controls">
              <select id="select013" name="country" data-rule-required="true" data-msg-required="country required">
                <option value="">Select Your Country</option>
                <?php foreach(countries() as $country){?>
                <option value="<?php echo $country->id ;?>" <?php if($isEdit && $country->id == $company_profile->country){ echo ' selected';} ?>><?php echo $country->country_name ;?></option>
                <?php } ?>
              </select>
            </div>
          </div> 

              <div class="control-group">
            <label class="control-label" for="select01">Office Type</label>
            <div class="controls">
              <select id="select01"  name="office_type">
                <option>Select Address Type</option>
                <option value="Head Office" <?php if($row_contact->office_type == 'Head Office') echo ' selected';?>>Head Office</option>
                <option value="Branch Office" <?php if($row_contact->office_type == 'Branch Office') echo ' selected';?>>Branch Office</option>
                <option value="Country Head" <?php if($row_contact->office_type == 'Country Head') echo ' selected';?>>Country Head</option>
              </select>
            </div>
          </div>

              <div class="control-group">
            <label class="control-label" for="input01">Address</label>
            <div class="controls">
              <input type="text" id="oenrw" class="input-xlarge" data-rule-required="true" data-msg-required="address required"  name="address" value="<?php if(!empty($row_contact->address)) echo $row_contact->address ; ?>" required>              
            </div>
          </div>    
      
              <div class="control-group">
            <label class="control-label" for="input01">Phone</label>
            <div class="controls">
              <input type="text" id="ower" class="input-xlarge" data-rule-required="true" data-msg-required="phone no. required" name="phone" value="<?php if(!empty($row_contact->phone)) echo $row_contact->phone ; ?>" required>              
            </div>
          </div>   
   
              <div class="control-group">
            <label class="control-label" for="input01">Alt. Phone</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="alt_phone" value="<?php if(!empty($row_contact->alt_phone)) echo $row_contact->alt_phone ; ?>">              
            </div>
          </div>   

   		      <div class="control-group">
            <label class="control-label" for="input01">Fax</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="fax" value="<?php if(!empty($row_contact->fax)) echo $row_contact->fax ; ?>">              
            </div>
          </div>  
        
              <div class="control-group">
            <label class="control-label" for="input01">P.O.Box</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="p_box" value="<?php if(!empty($row_contact->p_box)) echo $row_contact->p_box ; ?>">              
            </div>
          </div>   

              <div class="control-group">
            <label class="control-label" for="input01">Website</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="website" value="<?php if(!empty($row_contact->website)) echo $row_contact->website ; ?>">              
            </div>
          </div>   

              <div class="control-group">
            <label class="control-label" for="input01">Contact Person</label>
            <div class="controls">
             <select name="title" id="select01" style="width:45px;">
                <option value="Mr" <?php if($row_contact->title == 'Mr') echo ' selected';?>>Mr.</option>
                <option value="Ms" <?php if($row_contact->title == 'Ms') echo ' selected';?>>Ms.</option>
                <option value="Mrs" <?php if($row_contact->title == 'Mrs') echo ' selected';?>>Mrs.</option>                
            </select>
            <input type="text" class="input-xlarge" id="o0o" data-rule-required="true" data-msg-required="Contact Person required"  style="width:271px;margin-left:2px;" name="contact_person" value="<?php if(!empty($row_contact->contact_person)) echo $row_contact->contact_person ; ?>" required>              
            </div>
          </div>
    
              <div class="control-group">
            <label class="control-label" for="input01">Designation</label>
            <div class="controls">
              <input type="text" id="kek" data-rule-required="true" data-msg-required="designation required" class="input-xlarge" name="designation" value="<?php if(!empty($row_contact->designation)) echo $row_contact->designation ; ?>">              
            </div>
          </div> 

              <div class="change01" id="security_img"><p>Security Code</p>
	<?php echo $captcha_image ; ?>
    <a href="#" id="new_captcha"><img src="<?php echo base_url().'assets/front/images/ref.png'?>" title="Refresh" style="margin-top:1px;" /></a>
    <input type="text" name="captcha" id="captcha" class="input-xlarge"  style="float:right;"/>
</div>

<div><input type="submit" name="submit"  value="Submit" id="submit_employer" class="change020"/></div>
<span class="registering-employer"></span>
</form>

</div><!--end of employerForm-->


<!-- end of employer registratio form--><!-- end of employer registratio form--><!-- end of employer registratio form-->
<!-- start of employee registration form--><!-- start of employee registration form--><!-- start of employee registration form-->


<div class="employeeForm" style="border:none !important;">
<h2>Jobseekers Registration Form</h2>
<form id="register_form_jobseeker" action="<?php echo base_url('registration/process/2') ;?>" method="post">

              <div class="control-group">
                <label class="control-label" for="name">Name</label>
                <div class="controls">          
                  <!--<select id="select01" style="width:47px;" name="gender">
                    <option value="Mr" <?php if($isEdit && $personal_info->gender == 'Mr') echo ' selected';?>>Mr.</option>
                    <option value="Ms" <?php if($isEdit && $personal_info->gender == 'Ms') echo ' selected';?>>Ms.</option>
                    <option value="Mrs" <?php if($isEdit && $personal_info->gender == 'Mrs') echo ' selected';?>>Mrs.</option>
                  </select>   -->             
         <input type="text" class="input-xlarge" name="username" value="<?php if($isEdit) echo $personal_info->first_name ;?>"  style="width:100px;" required>
         <input type="text" class="input-xlarge" name="middle_name" value="<?php if($isEdit) echo $personal_info->middle_name ;?>" style="width:100px;margin-left:1px;">
         <input type="text" class="input-xlarge" id="oenre" data-rule-required="true" data-msg-required="lastname required" name="last_name"  value="<?php if($isEdit) echo $personal_info->last_name ;?>"  style="width:100px;margin-left:1px;" required>                  
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="email">Email Address</label>
             <div class="controls">
                  <input type="text" class="input-xlarge"  name="email" value="<?php if($isEdit) echo $personal_info->email ;?>">              
                </div>
              </div>   

              <div class="control-group">
                <label class="control-label" for="alt_email">Password</label>
                <div class="controls">
                  <input type="password" class="input-xlarge" id="passwordj"  name="password" value="<?php if($isEdit) echo $personal_info->password ;?>">              
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="alt_email">Confirm Password</label>
                <div class="controls">
                  <input type="password" class="input-xlarge"  name="repassword" value="<?php if($isEdit) echo $personal_info->repassword ;?>">              
                </div>
              </div>  

              <div class="control-group">
 <label class="control-label"  style="line-height:17px;">Gender</label>
 <label style="margin-right:3px;margin-top:-5px;">Male</label><input type="radio" name="gender" style="margin-top:-5px;" class="input-xlarge"  value="Male"<?php echo 'checked' ?> />&nbsp;&nbsp;
 <label style="margin-right:3px;margin-top:-5px;">Female</label><input type="radio" name="gender" style="margin-top:-5px;" class="input-xlarge" value="Female" />
</div>

              <div class="control-group">
                <label class="control-label" for="dob">Date of Birth</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="dob" data-rule-required="true" data-msg-required="DOB required" name="dob" value="<?php if($isEdit && $personal_info->dob != '0000-00-00') echo $personal_info->dob ;?>" style="width:322px;" required>                  
                </div>
              </div>  
    
              <div class="control-group">
                <label class="control-label" for="nationality">Nationality</label>
                <div class="controls">
                  <select id="selectssdf01"  data-rule-required="true" data-msg-required="nationality required" name="nationality" required>
                    <option value="">Select Your Nationality</option>
                    <?php foreach(countries() as $row):?>
                        <option value="<?php echo $row->id ;?>" <?php if($isEdit && $row->id == $personal_info->nationality){ echo ' selected';} ?>><?php echo $row->country_name ;?></option>
                    <?php endforeach ;?>
                  </select>
                </div>
              </div>
   
              <div class="control-group">
                <label class="control-label" for="marital_status" style="line-height:17px;">Maritial Status</label>
                <div class="controls" style="margin-top:14px; padding-left:25px; height:17px;">
                Sigle  <input type="radio" style="margin-top:-5px;" class="input-xlarge"  name="marital_status" value="Single" <?php if($isEdit && $personal_info->marital_status == 'Single') echo ' checked';?>>
              &nbsp;  Married  <input type="radio" style="margin-top:-5px;" class="input-xlarge"  name="marital_status" value="Married" <?php if($isEdit && $personal_info->marital_status == 'Married') echo ' checked';?>>            
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="home_phone">Home Phone</label>
                <div class="controls">
                  <input type="text"  name="home_phone" value="<?php if($isEdit) echo $personal_info->home_phone ;?>">                  
                </div>
              </div>      

              <div class="control-group">
                <label class="control-label" for="cell">Mobile</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="onwewrqer" data-rule-required="true" data-msg-required="mobile no. required" name="cell" value="<?php if($isEdit) echo $personal_info->cell ;?>" required>
                  
                </div>
              </div> 
         
              <div class="control-group">
                <label class="control-label" for="current_address">Current Address</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="hkwehr" data-rule-required="true" data-msg-required="current address required" name="current_address" value="<?php if($isEdit) echo $personal_info->current_address ;?>"required>
                  
                </div>
              </div>


              <div class="control-group">
                <label class="control-label" for="visa_status">Visa Stauts</label>
                <div class="controls">
                  <select id="selectdfdfd01" name="visa_status" data-rule-required="true" data-msg-required="visa status required">
                    <option value="">Select Visa Stauts</option>
                    <option value="Dependent" <?php if($isEdit && $personal_info->visa_status == 'Dependent') echo ' selected';?>>Dependent</option>
                    <option value="Student" <?php if($isEdit && $personal_info->visa_status == 'Student') echo ' selected';?>>Student</option>
                    <option value="Permanent" <?php if($isEdit && $personal_info->visa_status == 'Permanent') echo ' selected';?>>Permanent</option>
                  </select>
                </div>
              </div>
   
                    
              <label class="control-label" for="job_designation" >Preferred Job Categories</label>

              <div class="row1-fluid">
              
                    <div class="span6">                        
                            <?php if($isEdit && isset($f_area)){
                                foreach($f_area as $fa){
                                    $func_area[] =  $fa->category ;
									}
								}
							?>		
                        <ul class="cate_list_option">
							<?php  foreach(functionalcategories() as $Prow):?>
                            <li>
                                <input id="pref_job_category" name="pref_job_category[]"  data-rule-required="true" data-msg-required="categories required" value="<?=$Prow->id?>" type="checkbox" style="width:20px" class="casef">
                                <label for="<?= $Prow->description ?>" style="cursor: pointer;"><?= $Prow->description ?></label>
                            </li>
                            <?php endforeach ;?>		
                        </ul>
                    <label class="clearCheckbox" id="clearall_f" style="width:100px; color:#F24819; text-align:right; margin-left:20px;display:block;"><font size="0">[clear selection]</font></label>
                    <div class="CB" style="height:11px;"></div>
                
                        </div>                    
              </div>
    
              <div class="control-group">
                <label class="control-label" for="availability">Available For</label>
                <div class="controls">
                  <select id="select01" name="availability">
                    <option value="">Select Your Availability</option>
                    <option value="Morning Shift" <?php if($isEdit && $personal_info->availability == 'Morning Shift') echo ' selected';?>>Morning Shift</option>
                    <option value="Evening Shift" <?php if($isEdit && $personal_info->availability == 'Evening Shift') echo ' selected';?>>Evening Shift</option>
                    <option value="Day Shift" <?php if($isEdit && $personal_info->availability == 'Day Shift') echo ' selected';?>>Day Shift</option>
                    <option value="Any Time Job" <?php if($isEdit && $personal_info->availability == 'Any Time Job') echo ' selected';?>>Any Time Job</option>
                  </select>
                </div>
              </div>             

              <div class="control-group">
                <label class="control-label" for="username">Display Name</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="username" value="<?php if($username) echo $username ;?>">
                  
                </div>
              </div> 

              <div class="change01" id="security_img_js"><p>Security Code</p>
                                    <?php echo $captcha_image_js ; ?>
                                    <a href="#" id="new_captcha_js"><img src="<?php echo base_url().'assets/front/images/ref.png'?>" title="Refresh" style="margin-top:1px;" /></a>
                                    <input type="text" name="captcha_js" id="captcha_js" class="input-xlarge"style="float:right;"/>
                                </div>
                 
              <div><input type="submit" name="submit_jobseeker" id="submit_jobseeker" value="Submit" class="change020"/></div>

<span class="registering-jobseeker"></span>
</form>

</div><!--end of registrationContent-->

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
				required:"firstname required"
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

<script>
	$(function() {
		$( "#dob" ).datepicker({
		  dateFormat:'yy-mm-dd',
		  yearRange: '1970:' + new Date().getFullYear() ,
		  changeMonth: true,
		  changeYear: true
		});
		
		$("#clearall_f").click(function () {
          $('.casef').removeAttr("checked");
    });
	});
</script>