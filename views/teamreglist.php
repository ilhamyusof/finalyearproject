<?php 
$records = getBTSRecords();
$utype = '';
$type = $_SESSION['calendar_fd_user']['type'];
if($type == 'lecturer') {
	$utype = 'on';
}
else if($type == 'organizer') {
	$utype = 'on';
}
?>

<div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">SportBookingDetail</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th style="width: 10px">No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Sport Type</th>
          <th>Sport Category</th>
          <th>Team Name</th>
          <th>College</th>
          <th>Total Member</th>

          <th style="width: 100px">Status</th>
          <?php if($utype == 'on') { ?>
          <th>Action</th>
		  <?php } ?>
       
        </tr>
        <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
		$stat = '';
		if($status == "PENDING") {$stat = 'warning';}
		else if ($status == "APPROVED") {$stat = 'success';}
		else if($status == "DENIED") {$stat = 'danger';}
		?>
        <tr>
          <td><?php echo $idx++; ?></td>
          <td><a href="<?php echo WEB_ROOT; ?>views/?v=USER&ID=<?php echo $user_id; ?>"><?php echo strtoupper($user_name); ?></a></td>
          <td><?php echo $user_email; ?></td>
          <td><?php echo $user_phone; ?></td>
          <td><?php echo $sport_type; ?></td>
          <td><?php echo $sportcat; ?></td>
          <td><?php echo $tname; ?></td>
          <td><?php echo $college; ?></td>
          <td><?php echo $count; ?></td>
          <td><span class="label label-<?php echo $stat; ?>"><?php echo $status; ?></span></td>
          <?php if($utype == 'on') { ?>
		  <td><?php if($status == "PENDING") {?>
            <a href="javascript:approve('<?php echo $user_id ?>');">Approve</a>&nbsp;/
			&nbsp;<a href="javascript:decline('<?php echo $user_id ?>');">Denied</a>&nbsp;
            <?php } else { ?>
			<a href="javascript:deleteUser('<?php echo $user_id ?>');">Delete</a>
			<?php }//else ?>
          </td>
		  <?php } ?>
        </tr>
        <?php } ?>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <!--
	<ul class="pagination pagination-sm no-margin pull-right">
      <li><a href="#">&laquo;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul>
	-->
      <?php echo generatePagination(); ?> </div>
  </div>
  <!-- /.box -->
</div>

<script language="javascript">
function approve(userId) {
	if(confirm('Are you sure you wants to Approve it ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=teamregConfirm&action=approve&userId='+userId;
	}
}
function decline(userId) {
	if(confirm('Are you sure you wants to Decline the Registration ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=teamregConfirm&action=denide&userId='+userId;
	}
}
    
function deleteUser(userId) {
	if(confirm('Are you sure you want to proceed ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=tregdelete&userId='+userId;
	}
}


</script>
