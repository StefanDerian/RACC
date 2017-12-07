
<?php 









?>
<script type="text/javascript" src = "note.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



<form  method="post" name="form" action="<?php echo $GLOBALS['action'];?>">
	<input type="hidden" name="note" value="note" />
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Example textarea</label>
		<textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
	<input type = "submit" class = "btn btn-primary" value = "submit">
</form>


<div class = "fluid-container">




	<?php foreach ($this->notes as $note) { ?>
	# code...
	<div class = "row">


		<?php echo $note['content'] ;?>
	</br>

	<p>Written by :<?php echo $note['DisplayName']?></p>
	</br>
	<p>at : <?php echo $note['time']?></p>



</div>


<?php }   ?>

</div>







</form>




















