

<font color="green" class="searchT"><?php if(isset($keywords)) echo 'Search results for  '.'<font size="+1" style="font-style:italic;">'.$keywords.'</font>' ;?></font>
		<div class="CB"></div>	


<?php if(isset($products) && count($products)>0){ $i = 0 ; ?>
	<ul class="ceebox html">
	<?php foreach($products as $product): $i++ ; ?>

    <li style="margin-bottom:25px;">
		<div class="trailBox" style="width:100%; padding:5px; border:1px solid #eee; height:250px;">
		
		<img src="<?php echo base_url().PRODUCTS_DIR.'/'.$product->image ; ?>" width="360" height="237" style="float:left;" />
		
		<div  style="width:20px; float:left; height:230px"></div>
		
		<a href="<?php echo base_url().'cms/product/'.$product->id ;?>"><h4><?php echo $product->name ;?></h4></a>

		<p class="desccription"><?php echo $product->description ;?></p>
	    <p class="time"><?php echo $product->model ;?></p>
		<p class="time2"><?php echo $product->price ;?></p>
		
		
		<p class="time1"><a href="<?php echo base_url().'tour/'.decode_title(strtolower($product->name)).'/'.$product->id ;?>" style="height:45px; width:155px;  display:block; float:right; line-height:44px;"><button type="button" class="btn btn-info">View Details</button></a></p>

    </div><!--/end of trailBox-->
</li>

	<?php if($i%3 ==0):?>
		<div class="CB"></div>	
	<?php endif ;?>    
	<?php endforeach ;?>      
</ul>	
<?php }else{ ?>
	<font color="Grey" size="2"  style="font-style:italic; padding:200px; text-align:center; display:block;">No results found !</font>
<?php }?>

<style>

ul{margin:0; padding:0;}
.searchT{font-family:Tahoma, Geneva, sans-serif; font-size:24px; margin:10px 0; display:block;}
.desccription{float:left;}

</style>