
<!-- href = "editDate-update.php?id=<?php echo $this->clientId; ?>&url=<?php echo $this->redirectUrl; ?>" -->
<a data-toggle="modal" data-url="editDate-update.php?id=<?php echo $this->clientId; ?>&url=<?php echo $this->redirectUrl; ?>" data-target="#confirmModal" class = "btn btn-sm btn-warning" > Update Date </a>


<?php   $m = "Are you sure you want to update the data for a client to be now ? the change cannot be undone "; ?>
<?php new ConfirmationModal($m); //"editDate-update.php?id=$this->clientId&url=$this->redirectUrl"?>
