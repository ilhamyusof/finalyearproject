<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=DB"><i class="fa fa-calendar"></i><span>Sport Events Calendar</span></a>
	</li>
    <li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=LIST"><i class="fa fa-university"></i><span>Venue Booking List</span></a>
	</li>
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=TREGLIST"><i class="fa fa-book"></i><span>Team Registration List</span></a>
	</li>
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=USERS"><i class="fa fa-users"></i><span>User Details</span></a>
	</li>
	<?php 
	$type = $_SESSION['calendar_fd_user']['type'];
	if($type == 'student') {
	?>
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=TEAMREG"><i class="fa fa-book"></i><span>Team Registration</span></a>
	</li>
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=NOTILIST"><i class="fa fa-users"></i><span>Notifcations</span></a>
	</li>
	
	
	<?php
	}
	?>
	<?php 
	$type = $_SESSION['calendar_fd_user']['type'];
	if($type == 'organizer') {
	?>
	
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=NOTI"><i class="fa fa-users"></i><span>Notifcations</span></a>
	</li>
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=SPORT"><i class="fa fa-futbol-o"></i><span>Create Sport Event</span></a>
	</li>
	
	
	
	
	<?php
	}
	?>
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=SPORTSTD"><i class="fa fa-book"></i><span>Sport Event List</span></a>
	</li>
	
	
	<?php 
	$type = $_SESSION['calendar_fd_user']['type'];
	if($type == 'lecturer') {
	?>
	<li class="treeview"> 
		<a href="<?php echo WEB_ROOT; ?>views/?v=NOTI"><i class="fa fa-book"></i><span>Notification</span></a>
	</li>
	
	
	<?php
	}
	?>
	
  </ul>
</section>
<!-- /.sidebar -->