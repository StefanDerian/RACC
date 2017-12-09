
<?php 









?>
<script type="text/javascript" src = "note.js"></script>





<form  id = "note" name="form" action="<?php echo $GLOBALS['action'];?>" method = "post" > <!-- action="<?php echo $GLOBALS['action'];?>" -->
	<input type="hidden" name="note" value="note" />
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Enter Note</label>
		<textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
	<input type = "submit" class = "btn btn-primary" value = "submit">
</form>


<div class = "fluid-container notes-list">




	<?php foreach ($this->notes as $note) { ?>
	
	<div class = "row a-note">


		<?php echo $note['content'] ;?>
	</br>

	<p>Written by :<?php echo $note['DisplayName']?></p>
</br>
<p>at : <?php echo $note['time']?></p>

<a class = "btn btn-sm btn-danger delete-note" href = "note-delete.php?id=<?php echo $note['ID']?>&user=<?php echo $this->id ?>">

	DELETE

</a>
<a class = "btn btn-sm btn-warning edit-note" data-toggle="modal" data-target="#noteModal" data-content = "<?php echo $note['content'] ; ?>"
data-id = "<?php echo $note['ID'] ; ?>" data-user = "<?php echo $_GET['user'] ; ?>" data-writer = "<?php echo $_SESSION['userID'] ; ?>"

 >

	EDIT

</a>



</div>


<?php }   ?>

</div>







</form>

<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="noteModalLabel">Change Note</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action ="note-update.php" method = "GET">
          <!-- <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
        </div> -->
        <div class="form-group">
        	<label for="message-text" class="col-form-label">Note:</label>
        	<textarea class="form-control content" width=100%  name ="content" id="message-text"></textarea>
        </div>
        <div class="form-group">
        	<!-- <label for="message-text" class="col-form-label">Username:</label> -->
        	<input type = "hidden" name ="user" class = "user form-control'">
        </div>
        <div class="form-group">
        	<!-- <label for="message-text" class="col-form-label">Message:</label> -->
        	<input type = "hidden" name ="noteId" class = "noteId form-control'">
        </div>
        <div class="form-group">
        	<!-- <label for="message-text" class="col-form-label">Message:</label> -->
        	<input type = "hidden" name ="writer" class = "writer form-control'">
        </div>
        <input type="submit" class = "btn btn-primary">
    </form>
</div>
<div class="modal-footer">
	<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-primary">Update</button> -->
</div>
</div>
</div>
</div>


















