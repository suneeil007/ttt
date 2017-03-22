<?php echo $this->load->view('front/includes/header')?>
<?php if($this->uri->segment(1) ==''){?>

<?php echo $this->load->view('front/includes/animation')?>
<?php echo $this->load->view('front/includes/menu')?>
<?php echo $this->load->view('front/includes/mid-content')?>

 <?php }else{ echo $contents;  } ?>
<?php echo $this->load->view('front/includes/footer')?>
