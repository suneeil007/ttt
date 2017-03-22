
<style>

.TD{width:82%;  height:150px; float:right; display:block; border-left:15px solid #eee; margin-top:15px; padding:20px;}
.Client{width:30%; float:left; margin-top:4px;}
.says{width:100%; float:left; font-size:13px; }
li{list-style:none;}
div.button span{height:30px;}

#panel, #flip {
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
    width:79%; float:right;
}

#panel {
    padding: 10px;
    display: none;
}
.TI{width:400px !important; height:35px; border:1px solid #eee; border-radius:3px; float:left; margin-top:-20px;}

strong{line-height:35px; float:left; width:200px;}

form{padding:0 0 0 35px;}

.uploader{float:left; margin-top:-17px;}

.area{float:left; width:450px !important; border:1px solid #eee; border-radius:3px; margin-top:-10px;}

div.button{margin-top:20px !important; margin-left:-387px;}

ul{margin:0; padding:0;}

</style>


<h1>Himalaya Hub Blog</h1>

<div class="TBox" style="padding-bottom:25px;">
<ul>

   <?php if(isset($blog_data) && count($blog_data)>0) { ?>
   <?php foreach($blog_data as $blog) { ?>

<li>	
	

<div class="thumb" style="float:left; padding-right:20px;">
<a title="Amazing Places" href="#">
<img class="attachment-widget-thumb wp-post-image" width="95" height="95" alt="1" src="<?php echo base_url().BLOG_DIR.'/'.$blog->image ;?>">
</a>
</div>
<div class="description009">
<h5 class="title">
 <a href="<?php echo base_url().'cms/blog_details/'.$blog->id;?>"><h4 class="Client"><?php echo $blog->title ;?></h4></a>
</h5>
<p class="says"><?php echo  word_limiter($blog->description, 30 );?></p>
<span class="date"><?php echo $blog->date ; ?></span>

<div class="CB" style="clear:both; height:20px;"></div>
<a href="<?php echo base_url().'cms/blog_details/'.$blog->id;?>"><button type="button" class="btn btn-info">Read more</button></a>
</div>


 </li>

<div class="CB" style="clear:both;"></div>

<?php } ?>

<?php } ?>


</ul>
</div><!--/TBox-->
