<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/zoom.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/product.css" type="text/css" media="screen" />
<style type="text/css">
a img{border: 0;}
</style> 
	<!-- Product Description starts -->
	<div class="product-wrapper">
			<div class="product-title"><strong>Product Description</strong></div>
			<div>				
                <div class="prod-label">Product</div><?php if(isset($product_detail))echo $product_detail->name ;?><br/>
					<div class="prod-label">Model</div><?php if(isset($product_detail))echo $product_detail->model ;?><br/>
		<div class="prod-label">Dimension</div><?php if(isset($product_detail))echo $product_detail->dimension ;?><br/>
				<?php if(isset($product_detail) && $product_detail->hide_price == 'no') {?>	
					<div class="prod-label">Price</div>  
					<?php echo $product_detail->currency.' '.$product_detail->price ; ?><br/>
				<?php } ?>
				<p><div class="prod-label">Description</div><?php if(isset($product_detail))echo $product_detail->description ;?></p>			  
				</div>       
			</div>
	</div>	
	<!-- Product Description ends -->
	
	<!-- Product images starts -->
	<div>
		<!-- Product Colors starts -->

		<div class="dim-menu">
		<!-- Product Verieties -->
			<ul>	
			<?php if(isset($product_colors) && count($product_colors)>0){?>
			<?php foreach($product_colors as $product_row){?>			
				 <li>
					<a href='<?php echo base_url().COLORS_DIR .'/'.$product_row->image ;?>' class='cloud-zoom-gallery' title='Thumbnail 1'
						rel="useZoom: 'zoom1', smallImage: '<?php echo base_url().COLORS_DIR .'/'.$product_row->image ;?>'">
						<img src="<?php echo base_url().COLORS_DIR .'/'.$product_row->image ;?>"  style="width:77px;height:60px;margin-bottom:3px;"/>
					</a>
				</li>
			<?php }}?>
			</ul>		
		
		</div>
		<!-- Product Colors ends -->
		
		<!-- Product big image starts -->	
			<div class="product-big-image">
					<a href='<?php echo base_url().PRODUCTS_DIR .'/'.$product_detail->image ;?>' class = 'cloud-zoom' id='zoom1' 
						rel="adjustX: 1, adjustY:-25">
		<img src="<?php echo base_url().PRODUCTS_DIR .'/'.$product_detail->image ;?>" style="width:320px;margin-bottom:3px;"/>
					</a>
			</div>						
		<div style="clear:left;height:20px;"></div>
		
		  
		  
			<!-- Product Verieties starts -->
			<div class="col-menu" style="margin-left:95px;">
				<ul>
				   <?php if(isset($product_verieties) && count($product_verieties)>0){?>
			<?php foreach($product_verieties as $product_row){?>			
				 <li>
					<a href='<?php echo base_url().VERITIES_DIR .'/'.$product_row->image ;?>' class='cloud-zoom-gallery' title='Thumbnail 1'
						rel="useZoom: 'zoom1', smallImage: '<?php echo base_url().VERITIES_DIR .'/'.$product_row->image ;?>'">
						<img src="<?php echo base_url().VERITIES_DIR .'/'.$product_row->image ;?>" alt = "Thumbnail 1" style="width:77px;height:60px;margin-bottom:3px;"/>
					</a>
				</li>
			<?php }}?>			
			</ul>
			</div>	
			<!-- Product Verieties ends -->
			
	</div> 
	<!-- Product images ends -->	
	
<div style="clear:left;height:30px;"></div>	
<div style="background:#E1E1E1;padding:3px;"><strong>Send Inquiry</strong></div>
	<!-- Inquiry Form -->	
	<div class="frm-inquiry">
		<form method="post" id="frm_inquiry" action="<?php echo base_url().'cms/send_email/' ;?>">
			<div class="block-some">
				<div>Quantity</div>
				<input type="text"  name="quantity" id="quantity" />
			</div>
			<div class="block-some">
				<div>Name</div>
				<input type="text"  name="name" id="name" />
			</div>
			<div class="block-some">
				<div>Email</div>
				<input type="text"  name="email" id="email" />
			</div>	
			<div class="block-some">
				<div>Phone</div>
				<input type="text"  name="phone" id="phone" />
			</div>
   			<div class="block-some">
				<div>Country</div>
				<input type="text"  name="country" id="country" />
			</div>
            <div class="block-some" style="margin-bottom:10px;">
			 <div style="margin-top:10px;">Inquiry Information</div>
				<textarea type="text"  name="information" id="information" cols="40" rows="3"></textarea>
			</div><br/><br/><br/><br/>
<div style="float:left;margin:0 0 20px 20px;"><input type="submit" name="inquire" id="inquire" value="Send"/></div>
		</form>
	</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery-1.8.0.js"></script>
<script type="text/JavaScript" src="<?php echo base_url();?>assets/front/js/cloud-zoom.1.0.2.js"></script>
