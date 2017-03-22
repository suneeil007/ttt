<link rel="stylesheet" href="<?php echo base_url();?>assets/css/adminLogin.css" type="text/css" media="screen" />




    <div id="login-form">

     <div id="infoMessage" style="color:#F00; font-size:12px; font-style:italic; line-height:4px;text-align:right; margin:0 30px 10px 0;"><?php echo $message;?></div>

     <?php echo form_open("auth/login");?> 
    
        <h3>Admin Login</h3>

        <fieldset>

       <form action="" method="post" accept-charset="utf-8">  
   
       
    <input type="email" required value="Email" id="identity"  name="identity"  onBlur="if(this.value=='')this.value='Email'" onFocus="if(this.value=='Email')this.value='' ">
    
    <input type="password" required value="Password" id="password" name="password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' ">
    
    <input type="submit" name="submit" value="Login"  />

    </form>

        </fieldset>

    <?php echo form_close();?>

    </div> <!-- end login-form -->
