<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<!-- Horizontal Form -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">New Sport Form</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=sport" method="post">
    <div class="box-body">
     <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label">Sport Type</label>
        <div class="col-sm-8">
		<span id="sprytf_type">
          <input type="text" class="form-control input-sm" name="sport_type" placeholder="Sport">
		  <span class="textfieldRequiredMsg">Sport Type is required.</span>
            </span>

        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Date</label>
        <div class="col-sm-8">
		<span id="sprytf_date">
          <input type="text" class="form-control input-sm" name="date" placeholder="yyyy-mm-dd">
		  <span class="textfieldRequiredMsg">Date is required.</span>
		</span>
        </div>
      </div>
	  
      
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label">Sport Category</label>
        <div class="col-sm-8">
		<span id="sprytf_category">
          <input type="text" class="form-control input-sm" name="category" placeholder="Male/Female">
		  <span class="textfieldRequiredMsg">Sport Category is required.</span>
            </span>
<!--		  <span class="textfieldMinCharsMsg">Reason must specify at least 8 characters.</span>-->
<!--		</span>-->
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label">Sport Venue</label>
        <div class="col-sm-8">
		<span id="sprytf_venue">
          <input type="text" class="form-control input-sm" name="venue" placeholder="Venue">
		  <span class="textfieldRequiredMsg">Sport Venue is required.</span>
            </span>
<!--		  <span class="textfieldMinCharsMsg">Reason must specify at least 8 characters.</span>-->
<!--		</span>-->
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-right">Add Sport Event</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<!-- /.box -->
<script>
<!--
var sprytf_date = new Spry.Widget.ValidationTextField("sprytf_date", "date", {format:"yyyy-mm-dd", useCharacterMasking: true, validateOn:["blur", "change"]});
var sprytf_reason = new Spry.Widget.ValidationTextField("sprytf_reason", "none", {minChars:8, maxChars: 100, validateOn:["blur", "change"]});
var sprytf_type 	= new Spry.Widget.ValidationTextField("sprytf_type", 'none', {validateOn:["blur", "change"]});
var sprytf_category 	= new Spry.Widget.ValidationTextField("sprytf_category", 'none', {validateOn:["blur", "change"]});
var sprytf_venue 	= new Spry.Widget.ValidationTextField("sprytf_venue", 'none', {validateOn:["blur", "change"]});
//-->
</script>
