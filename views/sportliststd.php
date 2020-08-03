<?php 
$records = getSportList();
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Sport List</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tr>
        <th style="width: 10px">No.</th>
        <th>Sport Type</th>
        <th>Date</th>
        <th>Category</th>
        <th>Venue</th>
      </tr>
      <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
	  ?>
      <tr>
        <td><?php echo $idx++; ?></td>
        <td><?php echo $ssport_type; ?></td>
        <td><?php echo $sdate; ?></a></td>
        <td><?php echo $scategory; ?></td>
        <td><?php echo $svenue; ?></td>
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
function deleteSport(sid) {
	if(confirm('Deleting sport event will allows user to book that date.\n\nAre you sure you want to proceed ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=sdelete&sId='+sid;
	}
}

</script>
