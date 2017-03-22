<style>
.CB{clear:both; }
.block-label{width:90px;float:left;font-weight:bold;}
</style>	    
    
<h2>Inquiry  <?php if(isset($product_name)) echo 'on '. $product_name ; ?>
<?php if(isset($product_model)) echo '['. $product_model.']' ; ?>
</h2>
<div>
    <div class="block-label">Quantity</div>
    <div><?php if(isset($quantity)) echo $quantity ; ?></div>
</div>
<div class="CB"></div>
<div>
    <div class="block-label">Phone No.</div>
    <div><?php if(isset($phone)) echo $phone ; ?></div>
</div>
<div class="CB"></div>
<div>
    <div class="block-label">Country</div>
    <div>
    <?php if(isset($country)) echo $country ; ?>
    </div>
</div>
<div class="CB"></div>
<div>
    <div class="block-label">Description</div>
    <div><?php if(isset($information)) echo $information ; ?></div>
</div>
<div class="CB"></div>
Thank You !    
