<?php 
$records = getHolidayRecords();
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Notification List</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tr>
        <th style="width: 10px">No.</th>
        <th>Date</th>
        <th>Notification</th>
      </tr>
      <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
	  ?>
      <tr>
        <td><?php echo $idx++; ?></td>
        <td><?php echo $hdate; ?></a></td>
        <td><?php echo $hreason; ?></td>
        
        
        <?php 
	$type = $_SESSION['calendar_fd_user']['type'];
	if($type == 'lecturer') {
	?>
	
	  <td><a href="javascript:deleteHoliday('<?php echo $hid ?>');">Delete</a></td>
	
	<?php
	}
          else if($type == 'organizer') {
	?>
	
	  <td><a href="javascript:deleteHoliday('<?php echo $hid ?>');">Delete</a></td>
	
	<?php
	}
	?>
        
        
        
      </tr>
      <?php } ?>
    </table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <?php echo generateHolidayPagination(); ?> </div>
</div>
<!-- /.box -->
<script language="javascript">
function deleteHoliday(hid) {
	if(confirm('Deleting holiday will allows user to book that date.\n\nAre you sure you want to proceed ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=hdelete&hId='+hid;
	}
}

</script>
