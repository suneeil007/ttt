<?php $this->load->view('admin/blocks/header'); ?>
<script>
var base_url = '<?php echo base_url()?>';
</script>
<?php $this->load->view('admin/blocks/left_nav'); ?>
<!-- <section style="position: absolute; z-index: -100; top:10px; right: 5%;">
       <a class="blue button" style="float: right;" href="#"><span class=" user"></span> 
            <?php if($this->ion_auth->logged_in()):?>
            Loged in as <?php 
            $res = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->result();
            echo ucfirst($res[0]->name);
            ?>
         <?php endif; ?></a>
   </section> -->
<div class="content-temp">
<?php echo $contents; ?>
</div>
<?php $this->load->view('admin/blocks/footer'); ?>