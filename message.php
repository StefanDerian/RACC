<?php
if(isset($_GET['msg']) && isset($_GET['flag']) ){ ?>

<div class = "alert <?php echo $_GET['flag']==1?'alert-success':'alert-danger';?>">
	<?php echo $_GET['msg']; ?>
</div>


<?php

}



?>