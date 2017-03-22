<?php echo $this->load->view('front/segments/header')?>

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


<div class="wrapper1">

<div class="TBox" style="padding-bottom:25px;">

<div class="thumb" style="float:left; padding-right:20px;">
<a title="Amazing Places" href="#">
<img class="attachment-widget-thumb wp-post-image" width="95" height="95" alt="1" src="<?php echo base_url().BLOG_DIR.'/'.$blogdetail->image ;?>">
</a>
</div>
<div class="description009">
<h5 class="title">
<h4 class="Client"><?php echo $blogdetail->title ;?></h4>
</h5>
<p class="says"><?php echo $blogdetail->description ; ?></p>
<span class="date"><?php echo $blogdetail->date ; ?></span>
</div>

<div class="CB" style="clear:both;"></div>

</ul>
</div><!--/TBox-->

</div>
<?php echo $this->load->view('front/segments/footer')?>