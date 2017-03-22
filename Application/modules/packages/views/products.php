

<div class="CB"></div>	

  
 	
    <div class="leftContent">

 <div class="banner-text">
<div class="text-holder">
<div class="text-frame">
<strong class="title">Popular Packages</strong>
<div class="CB" style="height:10px;"></div>

		<ul>
 <?php if(isset($popular_products) && count($popular_products)>0) { ?>
		<?php foreach($popular_products as $blog) { ?>

		<li><a href="<?php echo base_url().'tour/'.$blog->id ;?>"><?php echo $blog->name; ?></a></li>
<? } ?>

<? } ?>

		</ul>
  
     </div>  </div>  </div>  </div>



<?php if(count($child_categories)==0){?>
<?php if(isset($products) && count($products)>0){ $i = 0 ; ?>

<div id="sub-categories" style="margin-top:15px;">

<div class="contentRight">

<h3 style="border-bottom:1px solid #eee; padding-bottom:32px;"><?php if(isset($cat_breadcrumbs)) echo $cat_breadcrumbs ;?></h3>


<ul class="ceebox html">
	<?php foreach($products as $product): $i++ ; ?>

    <li>
		<div class="trailBox" style="width:100%; padding:5px; border:1px solid #eee; overflow:hidden;">
		
		<img src="<?php echo base_url().PRODUCTS_DIR.'/'.$product->image ; ?>" width="360" height="237" style="float:left;" />
		
		<div  style="width:20px; float:left; height:230px"></div>
		
		<a href="<?php echo base_url().'tour/'.$product->id ;?>"><h4><?php echo $product->name ;?></h4></a>

		<p class="desccription"><?php echo word_limiter($product->description, 50);?></p>
	    <p class="time"><?php echo $product->model ;?></p>
		<p class="time2">$ <?php echo $product->price ;?></p>
		
		
		<p class="time1"><a href="<?php echo base_url().'tour/'.$product->id ;?>" style="height:45px; width:155px;  display:block; float:right; line-height:44px;"><button type="button" class="btn btn-info">View Details</button></a></p>

    </div><!--/end of trailBox-->
</li>

	<?php if($i%3 ==0):?>
		<div class="CB"></div>	
	<?php endif ;?>    
	<?php endforeach ;?>      
</ul>
</div></div>

		<div class="CB"></div>	
	 <div> <?php echo $this->pagination->create_links(); ?> </div>    
	 	<?php }else{?>
			<font color="grey" style="font-style:italic; font-size:40px; padding:230px; display:block;">Sorry no tours updated !</font>  
 		<?php }?>
  <?php }else{?>
 	<div id="sub-categories" style="margin-top:15px;">

    

<div class="contentRight">

<h3 style="border-bottom:1px solid #eee; padding-bottom:15px;"><?php if(isset($data_cms->title)){ echo $data_cms->title ; }elseif(isset($current_category)) { echo $current_category->name; }elseif($this->uri->segment(2)=='search') echo 'Search Results'?></h3>

		<ul>
			<?php if(isset($child_categories) && count($child_categories)>0){?>
			<?php foreach($child_categories as $row){?>			
				
		   <li>
		<div class="trailBox" style="width:100%; padding:5px; border:1px solid #eee; height:250px;">
		
		<img src="<?php echo base_url().CATEGORIES_DIR.'/'.$row->image ; ?>" width="360" height="237" style="float:left;" />
		
		<div  style="width:20px; float:left; height:230px"></div>
		
		<a href="<?php echo base_url().'tours/'.decode_title($row->name).'/'.$row->id ;?>"><h4><?php echo $row->name;?></h4></a>
		<p class="desccription"><?php  echo word_limiter($row->description, 60);?></p>
	<!--	<p class="time">4 days 5 nights</p>
		<p class="time">$ 5000</p>-->
		
		
		<p class="time1"><a href="<?php echo base_url().'tours/'.decode_title($row->name).'/'.$row->id ;?>" style="height:45px; width:155px;  display:block; float:right; line-height:44px;"><button type="button" class="btn btn-info">View All</button></a></p>

</div><!--/end of trailBox-->
</li>
  	           
			 <?php }}?>
		</ul>
    </div><!--/end of contentRight-->
	</div>
 <?php }?>


<style>

#breadcrumb li{ float:left; list-style:none; padding:0 5px;}

.desccription{ width:54% !important; float:left !important;}

.banner-text .title::before {
    border-left: 9px solid transparent;
    border-top: 9px solid #5a2802;
    bottom: -9px;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    width: 0;}

.banner-text .title::after {
    border-bottom: 25px solid transparent;
    border-right: 21px solid #fff;
    border-top: 23px solid transparent;
    content: "";
    height: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: 0;
}
.banner-text .title {
    background: #e44141 none repeat scroll 0 0;
    color: #fff;
    display: inline-block;
    font: 17px/21px "Comic Sans MS",cursive;
    margin: 0 0 0 -9px;
    padding: 10px 71px 18px 43px;
    position: relative;
    margin-top:20px;
}
.banner-text .text-frame {

}

.PackWrap{ width:auto; height:10px; margin-top:5px; padding:0 4px; margin-top:20px;}

.PopINner1{font: 14px/29px "Comic Sans MS" !important; float:left; width:70%;}

.PopINner2{font: 11px/5px "Comic Sans MS",cursive; float:right; width:30%; text-align:right;}

.POPINNER{width:auto; overflow:hidden;}

.POPINNER ul li{list-style:square inside !important;}

.leftContent ul li:hover{color:grey !important;}

.POPINNER ul{margin:0; padding:0;}

h4{ margin-bottom:-10px !important;}

</style>

