<?php 
include('session.php');
include('header2.php');
include('education-backend.php');
include('secondary.php');
include('message.php');
?>







<form method="post">
	<div class="form-group">
		<label>Course</label>
		<input  type="text" id = "course" name = "course" maxlength = "255" value = "<?php echo isset($course)?$course:"";  ?>" class="form-control">
		<span class="error"><?php echo isset($courseError)?$courseError:"";?></span>
	</div>
	<div class="form-group">
		<label>University</label>
		<input  type="text" id = "uni" name = "uni" maxlength = "255" value = "<?php echo isset($uni)?$uni:"";  ?>" class="form-control">
		<span class="error"><?php echo isset($uniError)?$uniError:"";?></span>
	</div>
	<div class="form-group">
		<label>Intake Date</label>
		<input  type="date" id = "intake" name = "intake" maxlength = "255" value = "<?php echo isset($intake)?$intake:"";  ?>" class="form-control">
		<span class="error"><?php echo isset($intakeError)?$intakeError:"";?></span>
	</div>
	<input type = "submit" class="btn btn-primary btn-lg activ pull-left" id = "submit-button" name="submitBtn" style = "margin-left: 38%;" value="<?php echo isset($_GET['user'])?'Save':'Submit' ?>">








</form>
</body>
</html>