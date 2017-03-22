<style>
.new-items{background:#F00; padding:5px 9px; color:#FFF;}
</style>

<div class="homelinks-container" style="margin-left:30px; margin-top:80px;">

  <div class="row_adm00">  
    <ul>
        <a href="<?php echo base_url().'adm-panel/cms/create' ; ?>" class=""><li><img src="<?php echo base_url().'assets/images/add51.png'; ?>"><br /><label>Add New Page</label></li></a>
        <a href="<?php echo base_url().'adm-panel/cms/all' ; ?>"><li><img src="<?php echo base_url().'assets/images/settings4.png'; ?>"><br /><label>Manage Contents</label></li></a>
        <a href="<?php echo base_url().'adm-panel/feedback' ; ?>"><li><img src="<?php echo base_url().'assets/images/leader.png'; ?>"><br /><label>Feedbacks</label></li></a>
        <a href="#"> <li><img src="<?php echo base_url().'assets/images/profile22.png'; ?>"><br /><label>Manage Users</label></li></a>
        <a onclick="view_org()" style="cursor:pointer;">
        	<li><img src="<?php echo base_url().'assets/images/set2.png'; ?>"><br />
            	<label>Employers
                <?php if(new_users(6)>0){ ?>
    <span class="new-items">
			<?php echo new_users(6).' New';?>
    </span>
	<?php } ?>
                </label></li></a> 
    </ul>
   </div><!--endo 0f row_adm00-->
  
    <div class="row_adm00">  
    <ul>
		<a onclick="view_jobseekers()" style="cursor:pointer;">
			<li><img src="<?php echo base_url().'assets/images/user106.png'; ?>"><br />
            <label>Jobseekers
            <?php if(new_users(2)>0){ ?>
    <span class="new-items">
			<?php echo new_users(2).' New';?>
    </span>
	<?php } ?>
            </label></li>
        </a>
        <a onclick="view_latest_vacancies()" style="cursor:pointer;"> 
            <li>
            	<img src="<?php echo base_url().'assets/images/wireless29.png'; ?>"><br />
                <label>Job Vacancies<?php if(latest_vacancies()>0){ ?>
                <span class="new-items">
                <?php echo latest_vacancies()> 0 ? latest_vacancies().' New' : '';?>
                </span><?php } ?></label>
            </li>
        </a>
        <a onclick="view_latest_jobApplications()" style="cursor:pointer;"> 
        <li><img src="<?php echo base_url().'assets/images/businessman65.png'; ?>"><br /><label>Jobs Appliers
        <?php if(latest_jobApplications()>0){ ?>
                <span class="new-items">
                <?php echo latest_jobApplications()> 0 ? latest_jobApplications().' New' : '';?>
                </span><?php } ?>
        </label></li></a>        
        <a href="<?php echo base_url().'adm-panel/notifications/'  ; ?>"><li><img src="<?php echo base_url().'assets/images/email11-2.png'; ?>"><br /><label>Send Notifications</label></li></a>
        <a href="<?php echo base_url().'adm-panel/notification_sent/'  ; ?>"> <li><img src="<?php echo base_url().'assets/images/businessman65.png'; ?>"><br /><label>Notifications Sent</label></li></a>
       
    </ul>
   </div><!--endo 0f row_adm00-->   
    <div class="row_adm00">  
    <ul>
    <a onclick="view_latest_jobseekerInfoRequests()" >
    	<li><img src="<?php echo base_url().'assets/images/email11-2.png'; ?>"><br />
        	<label>Info Requests  
			   <?php if(latest_jobseekerInfoRequests()>0){ ?>
                <span class="new-items">
                   <?php echo latest_jobseekerInfoRequests()> 0 ? latest_jobseekerInfoRequests().' New' : '';?>
               </span>
			   <?php } ?>
        </label>
        </li>
    </a>
    <a href="<?php echo base_url().'adm-panel/approved_jobseekerInfoRequests' ; ?>"> 
        <li><img src="<?php echo base_url().'assets/images/businessman65.png'; ?>"><br />
        	<label>Approved Requests</label>
        </li>
    </a>          
    <a href="<?php echo base_url().'adm-panel/subscribers/'  ; ?>"> 
        <li><img src="<?php echo base_url().'assets/images/user106.png'; ?>"><br /><label>Subscribers
       
        </label></li></a>  
        
        <a href="<?php echo base_url().'adm-panel/alerts_sent/'  ; ?>"> 
        <li><img src="<?php echo base_url().'assets/images/email11-2.png'; ?>"><br /><label>Jobs Alerts Sent
        
        </label></li></a>  
        
        <a href="<?php echo base_url().'adm-panel/alert_history/'  ; ?>"> 
        <li><img src="<?php echo base_url().'assets/images/email11-2.png'; ?>"><br /><label>Alert History
      
        </label></li></a>      
    </ul>
   </div>
</div> 
