<table width="520" border="0"cellpadding="0" cellspacing="0" align="center" style="text-align:center;">
<tr>
<td style="color:#ff0000; padding:10px 0">
 You have got a new order details :
</td>
</tr>

<tr>
<td>
<div style="border:1px solid #8BCC56; overflow:hidden; display:block;">
<table  border="0" cellpadding="0" cellspacing="0" width="100%" align="center"  style="text-align:center; ">


<tr>
<td style="padding:10px;" align="left">
<p style="color:#5b5b5b; margin-top:20px; font-size:12px; font-family:arial; font-weight:bold; border:1px solid #aaa; padding:8px;">Quantity : <?php if(isset($product)) echo $product ;?></p>

<p style="color:#5b5b5b; margin-top:20px; font-size:12px; font-family:arial; font-weight:bold; border:1px solid #aaa; padding:8px;">Name : <?php if(isset($name)) echo $name ;?></p>

<p style="color:#5b5b5b; margin-top:20px; font-size:12px; font-family:arial; font-weight:bold; border:1px solid #aaa; padding:8px;">Email : <?php if(isset($email)) echo $email ;?></p>

<p style="color:#5b5b5b; margin-top:20px; font-size:12px; font-family:arial; font-weight:bold; border:1px solid #aaa; padding:8px;">Phone : <?php if(isset($phone)) echo $phone ;?></p>

<p style="color:#5b5b5b; margin-top:20px; font-size:12px; font-family:arial; font-weight:bold; border:1px solid #aaa; padding:8px;">Address : <?php if(isset($address)) echo $address ;?></p>

<p style="color:#5b5b5b; margin-top:20px; font-size:12px; font-family:arial; font-weight:bold; border:1px solid #aaa; padding:8px;">Description : <?php if(isset($description)) echo $description ;?></p>



</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td style="padding:10px 0;">
<a href="#"><img style="margin-top:5px; border:none;" src="<?php echo base_url().'assets/front/images/logo.png';?>" alt="" width="171px" height="34px"></a>
</td>
</tr>


</table>