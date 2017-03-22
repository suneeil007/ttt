


<?php if(isset($breadcrumb)) echo $breadcrumb ; ?>

<div class="InnerWrap">

<div class="contentInnerL">

<h2><?php echo $data_cms->title ;?></h2>

<img src="<?php echo base_url(). GROUPS_DIR.'/'.$data_cms->photo;?>" width="100%" height="140" class="imageF"/>

<div class="CB" style="height:10px;"></div>

<?php echo $data_cms->contents ;?>

</div>


<div class="contentInnerR">
<div class="banner-text">
<div class="text-holder">
<div class="text-frame">
<strong class="title">Popular Packages</strong>

<?php if(isset($popular_products) && count(isset($popular_products))>0){  $i = 0 ; ?>

<div class="POPINNER">

<ul>
 <?php foreach($popular_products as $p_product){ $i++ ;?>


<li>
<div class="PackWrap">

<a href="<?php echo base_url().'cms/product/'.$p_product->id ;?>" class="PopINner1"><?php echo $p_product->name ; ?></a>

<p class="PopINner2"><?php echo $p_product->model ; ?></p>

</div><!--/packWrap-->
</li>

<?php } ?>  

</ul>

</div>

<?php } ?>   

</div></div></div>


</div>


</div>










<style>
.InnerWrap{width:100%; overflow:hidden;}

.contentInnerL{width:70%; padding:10px;  float:left; }

.contentInnerR{width:25%; float:right; }

.imageF{width:100%; height:140px; box-shadow: 1px 1px 5px #888888;}

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
    padding: 10px 119px 18px 43px;
    position: relative;
    margin-top:20px;
}
.banner-text .text-frame {

}

.PackWrap{ width:auto; height:10px; margin-top:5px; padding:0 4px; margin-top:20px;}

.PopINner1{font: 14px/29px "Comic Sans MS" !important; float:left; width:70%;}

.PopINner2{font: 11px/5px "Comic Sans MS",cursive; float:right; width:30%; text-align:right;}

.POPINNER{width:auto; overflow:hidden;}

.POPINNER ul li{list-style:square !important;}

.POPINNER ul{margin:0; padding:0;}


</style>