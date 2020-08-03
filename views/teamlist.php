<?php 
$records = getTeamList();
$utype = '';
$type = $_SESSION['calendar_fd_user']['type'];
if($type == 'lecturer') {
	$utype = 'on';
}
?>

<div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Event Booking Details</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th style="width: 10px">No.</th>
          <th>Sport Type</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>College</th>
          <th>Team Name</th>
          <th>Sport Category</th>
          <th style="width: 200px">Team List</th>
          <?php if($utype == 'on') { ?>
		  <th >Action</th>
		  <?php } ?>
        </tr>
        <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
		$stat = '';
      }
		?>
        <tr>
          <td><?php echo $idx++; ?></td>
          <td><?php echo $tsport_type; ?></td>
          <td><?php echo $tname; ?></td>
          <td><?php echo $tphone; ?></td>
          <td><?php echo $temail; ?></td>
          <td><?php echo $tcollege; ?></td>
          <td><?php echo $ttname; ?></td>
          <td><?php echo $tcategory; ?></td>
          <td><?php echo $ttlist; ?></td>
          <td><span class="label label-<?php echo $stat; ?>"><?php echo $status; ?></span></td>
          <?php if($utype == 'on') { ?>
		 
		  <?php } ?>
        </tr>
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
	if(confirm('Are you sure you wants to Decline the Booking ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=teamregConfirm&action=denide&userId='+userId;
	}
}
function deleteUser(userId) {
	if(confirm('Deleting user will also delete it\'s booking from calendar.\n\nAre you sure you want to priceed ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=delete&userId='+userId;
	}
}
    
    

</script>




























