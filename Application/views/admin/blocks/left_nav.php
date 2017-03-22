
<nav id="primary">
      <ul>
          <li>
          <a href="<?php echo base_url('admin/dashboard');?>" <?php if($this->uri->segment(2) == 'dashboard') echo ' class="active"'; ?>>
            <span class="icon32 home"></span>
            Home
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('admin/cms/all');?>" <?php if($this->uri->segment(2) == 'cms' && $this->uri->segment(3) == 'all') echo ' class="active"'; ?>>
            <span class="icon32 note"></span>
            Contents          
			</a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/cms/update/20');?>" <?php if($this->uri->segment(2) == 'product' && $this->uri->segment(3) == 'all') echo ' class="active"'; ?>>
            <span class="icon32 note"></span>
            Add Slider
          </a>
        </li>		
		<li>
          <a href="<?php echo base_url('admin/category/all');?>" <?php if($this->uri->segment(2) == 'category' && $this->uri->segment(3) == 'all') echo ' class="active"'; ?>>
            <span class="icon32 note"></span>
           Add Issue's Categories
          </a>
        </li>
		<li>
          <a href="<?php echo base_url('admin/product/all');?>" <?php if($this->uri->segment(2) == 'product' && $this->uri->segment(3) == 'all') echo ' class="active"'; ?>>
            <span class="icon32 note"></span>
            Add Issue's Content
          </a>
        </li>

      	<li style="display: none;">
          <a href="<?php echo base_url('admin/packages/all');?>" <?php if($this->uri->segment(2) == 'product' && $this->uri->segment(3) == 'all') echo ' class="active"'; ?>>
            <span class="icon32 note"></span>
            Add Packages-Direct
          </a>
        </li>
        <li style="display: none;">
          <a href="<?php echo base_url('admin/booking/all');?>">
            <span class="icon32 folder"></span>
            Manage Booking
          </a>
        </li>

        <li style="display: none;">
          <a href="<?php echo base_url('admin/blog/all');?>">
            <span class="icon32 folder"></span>
            Manage Blog
          </a>
        </li>
   <!--     <li class="">
          <a href="<?php echo base_url('admin/feedback/all');?>" <?php if($this->uri->segment(2) == 'feedback' && $this->uri->segment(3) == 'all') echo ' class="active"'; ?>>
            <span class="icon32 listicon"></span>
            Feedbacks
          </a>
        </li>  -->
		
		<li style="display: none;">
          <a href="<?php echo base_url('admin/testimonial/all');?>" <?php if($this->uri->segment(2) == 'testimonial' && $this->uri->segment(3) == 'all') echo ' class="active"'; ?>>
            <span class="icon32 group"></span>
            Testimonials
          </a>
        </li>	
		<li class="">
          <a href="<?php echo base_url('admin/users/change_password');?>" <?php if($this->uri->segment(2) == 'users' && $this->uri->segment(3) == 'change_password') echo ' class="active"'; ?>>
            <span class="icon32 tools"></span>
            Change Password
          </a>
        </li>
		<li class="">
          <a href="<?php echo base_url('auth/logout');?>">
            <span class="icon32 quit"></span>
            Logout
          </a>
        </li>
      </ul>
    </nav>
	