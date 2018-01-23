<?php 
include('session.php');
// include('agentList-backend.php');
include('header2.php');
?>

<?php 
if($_SESSION['userType'] != "MANAGER"){
	
	header('location:list.php');
	exit;
}
?>

<?php include('message.php'); ?>



<script type="text/javascript" src="agentList.js" ></script>
<div class = "container">
	<table id ="agent-list" class="table table-striped table-bordered table-hover dt-responsive ">
		<thead>
			<tr class = "info">
				<th>Display Name</th>
				<th>User Name</th>
				<th>Email</th>

			</tr>
		</thead>
		<tbody>
		<!-- <?php foreach ($agents as $key => $value) { ?>

		<tr onclick="window.document.location='createAccount.php?id=<?php echo $value["id"]; ?>'">

			<td><?php echo $value['DisplayName']; ?></td>
			<td><?php echo $value['UserName']; ?></td>

		</tr>









		<?php }  ?> -->
	</tbody>
</table>
</div>