<?php 
include('session.php');
include('header2.php');
include('education-backend.php');
include('secondary.php');
include('message.php');
?>
<script type="text/javascript" src = "education.js"></script>
<div id="educationModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Education Data</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo $action;?>">
					<div class="form-group">
						<label>Course</label>
						<input  type="text" id = "courseModal" name = "course" maxlength = "255" value = "<?php echo isset($course)?$course:"";  ?>" class="form-control">
						<span class="error"><?php echo isset($courseError)?$courseError:"";?></span>
					</div>
					<div class="form-group">
						<label>University</label>
						<input  type="text" id = "uniModal" name = "uni" maxlength = "255" value = "<?php echo isset($uni)?$uni:"";  ?>" class="form-control">
						<span class="error"><?php echo isset($uniError)?$uniError:"";?></span>
					</div>
					<div class="form-group">
						<label>Intake Date</label>
						<input  type="date" id = "intakeModal" name = "intake" maxlength = "255" value = "<?php echo isset($intake)?$intake:"";  ?>" class="form-control">
						<span class="error"><?php echo isset($intakeError)?$intakeError:"";?></span>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name = "status" id ="statusModal" class="form-control">
							<option value= "application submitted" <?php echo isset($status)&&$status=="application submitted"?"selected":"" ?>>application submitted</option>
							<option value= "got conditional offer" <?php echo isset($status)&&$status=="got conditional offer"?"selected":"" ?>>got conditional offer</option>
							<option value= "waiting for document" <?php echo isset($status)&&$status=="waiting for document"?"selected":"" ?>> waiting for document</option>
							<option value= "received COE" <?php echo isset($status)&&$status=="received COE"?"selected":"" ?>>received COE</option>
							<option value= "visa application" <?php echo isset($status)&&$status=="visa application"?"selected":"" ?>>visa application</option>
						</select>
					</div>
					<div class="form-group">
						<label>Comment</label>
						<textarea  id = "commentModal" name = "comment" maxlength = "255" value = "<?php echo isset($comment)?$comment:"";  ?>" class="form-control"></textarea>
						<span class="error"><?php echo isset($intakeError)?$intakeError:"";?></span>
					</div>
					<input type="text" id="idModal" name="id" value="" hidden>
					<input type = "submit" class="btn btn-primary btn-lg activ pull-left" id = "submit-button" name="submitBtn" style = "margin-left: 38%;" value="Update">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<div class = "container">
	<form method="post">
		<div class="form-group" action="<?php echo $action;?>">
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
		<div class="form-group">
			<label>Status</label>
			<select name = "status" class="form-control">
				<option value= "application submitted" <?php echo isset($status)&&$status=="application submitted"?"selected":"" ?>>application submitted</option>
				<option value= "got conditional offer" <?php echo isset($status)&&$status=="got conditional offer"?"selected":"" ?>>got conditional offer</option>
				<option value= "waiting for document" <?php echo isset($status)&&$status=="waiting for document"?"selected":"" ?>> waiting for document</option>
				<option value= "received COE" <?php echo isset($status)&&$status=="received COE"?"selected":"" ?>>received COE</option>
				<option value= "visa appication" <?php echo isset($status)&&$status=="visa application"?"selected":"" ?>>visa application</option>
			</select>
		</div>
		<div class="form-group">
			<label>Comment</label>
			<textarea  id = "comment" name = "comment" maxlength = "255" value = "<?php echo isset($comment)?$comment:"";  ?>" class="form-control"></textarea>
			<span class="error"><?php echo isset($intakeError)?$intakeError:"";?></span>
		</div>
		<input type = "submit" class="btn btn-primary btn-lg activ pull-left" id = "submit-button" name="submitBtn" style = "margin-left: 38%;" value="Insert">
	</form>
	<table cellpadding="5" class="table table-hove note-table">
		<tr class = "info">
			<th> Course </th>
			<th> University </th>
			<th> Intake </th>
			<th> Status </th>
			<th> Comment </th>
		</tr>
		<?php foreach ($educations as $key => $value) { ?>
		<tr>
			<td> <?php echo $value['course']; ?> </td>
			<td> <?php echo $value['uni']; ?> </td>
			<td> <?php echo $value['Intake']; ?> </td>
			<td> <?php echo $value['status']; ?> </td>
			<td> <?php echo $value['comment']; ?> </td>
			<td> <button class = "btn btn-sm btn-warning education-edit"
				data-toggle="modal" data-target="#educationModal"
				data-id = "<?php echo $value['id']; ?>"
				data-course = "<?php echo $value['course']; ?>"
				data-uni = "<?php echo $value['uni']; ?>"
				data-intake = "<?php echo $value['Intake']; ?>"
				data-status = "<?php echo $value['status']; ?>"
				data-comment = "<?php echo $value['comment']; ?>"
				>Edit</button> </td>
			
		</tr>
		<?php } ?>



	</table>







</div>




</body>
</html>