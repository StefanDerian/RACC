<?php 
include('session.php');
include('agentList-backend.php');
include('header.php');
?>

<?php $pagination->render(); ?> 
<table class = "table table-hover">
	<tr class = "info">
		<th>Display Name</th>
		<th>User Name</th>
		<th>Phone Number</th>
		<th>Email</th>
	</tr>
	<?php foreach ($agents as $key => $value) { ?>
	
	<tr onclick="window.document.location='createAccount.php?id=<?php echo $value["id"]; ?>'">

		<td><?php echo $value['DisplayName']; ?></td>
		<td><?php echo $value['UserName']; ?></td>
		
	</tr>









	<?php }  ?>
</table>
<?php $pagination->render(); ?> 