<?php if(isset($products) && count($products)>0){ $i = 0 ; ?>
	<ul class="ceebox html">
	<?php foreach($products as $product): $i++ ; ?>
	<li>
		<div class="packBlock<?php if($i%3 == 0)echo ' last';?>">
			 <div class="packBlockContent">
				<img src="<?php echo base_url().PRODUCTS_DIR.'/'.$product->image ; ?>" width="206" height="125" alt="Bag" />
				  <!-- pack info starts -->
					<div class="packInfo">
						<p style=" font:16px bold Verdana, Geneva, sans-serif; color:#000;"><?php echo $product->name ;?></p>
						<p><?php echo $product->model ;?></p>
						<?php if($product->hide_price == 'no'): ?>
							 <p style=" font:13px bold Verdana, Geneva, sans-serif; color:#F00;"><?php echo $product->price ;?></p>
						<?php endif ;?>      
								<a href="<?php echo base_url().'cms/product/'.$product->id ;?>" class="btnDetail">Details</a> 								
					 </div>
				  <!-- pack info ends -->
			  </div>           
		</div>
	</li>
	<?php if($i%3 ==0):?>
		<div class="CB"></div>	
	<?php endif ;?>    
	<?php endforeach ;?>      
</ul>	
<?php }?>
	<div class="CB"></div>	
 <div> <?php echo $this->pagination->create_links(); ?> </div> 