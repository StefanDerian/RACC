<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<link href = "css/editAppt.css" type = "text/css" rel = "stylesheet">
	<link rel = "stylesheet" type="text/css" href = "./css/header.css"/>
	<link rel = "stylesheet" type="text/css" href = "./css/note.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- <link href = "css/style.css" type = "text/css" rel = "stylesheet"> -->
	
	<script src="confirmation-modal.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.min.js"></script>
	<!-- <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet"> -->

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
</head> 




<!-- <nav class="nav">

	<?php if(isset($_SESSION['userID'])){ ?>


	<a class="nav-link" href = "list.php"> Your Clients</a>
	<a class="nav-link" href = "#Notes">Notes</a>
	<a class="nav-link" href = "#Report">Report</a>
	<a class="nav-link" href = "logout.php">Logout</a>

	<?php }else{ ?>

	<a class="nav-link" href = "createAccount.php">Create Account</a>
	<a class="nav-link" href = "login.php">Login</a></li>
	<a class="nav-link" href = "editAppt.php">Registration Page</a>

	<?php } ?>
</nav> -->


<body>


	<!-- <nav class="nav">

		<?php if(isset($_SESSION['userID'])){ ?>


		<a class="nav-link" href = "list.php"> Your Clients</a>
		<a class="nav-link" href = "#Notes">Notes</a>
		<a class="nav-link" href = "#Report">Report</a>
		<a class="nav-link" href = "logout.php">Logout</a>

		<?php }else{ ?>

		<a class="nav-link" href = "createAccount.php">Create Account</a>
		<a class="nav-link" href = "login.php">Login</a></li>
		<a class="nav-link" href = "editAppt.php">Registration Page</a>

		<?php } ?>
	</nav> -->
	<!-- <header>
		<div class="navbar-header">
			<a class="navbar-brand" href="#">RACC</a>
		</div>
		<ul>

			<?php if(isset($SESSION['userId'])){ ?>


			<li><a href = "list.php"> Your Clients</a></li>
			<li><a href = "#Notes">Notes</a></li>
			<li><a href = "#Report">Report</a></li>
			<li><a href = "logout.php">Logout</a></li>

			<?php }else{ ?>





			<li><a href = "createAccount.php">Create Account</a></li>
			<li><a href = "login.php">Login</a></li>
			<li><a href = "editAppt.php">Registration Page</a></li>

			<?php } ?>
		</ul>


	</header> -->
	<nav class="navbar navbar-new">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class = "row">
					<a class="navbar-header" href="#"><img src= "image/racc.png" id = "racc"></a>
					<h1 style="margin-top: 30px">RACC Australia</h1>
					
				</div>
				
			</div>

			<?php if(isset($_SESSION['userID'])){ ?>

			
			<ul class="nav navbar-nav">
				<li><a href="list.php">CLIENTS</a></li>
				<li id = "gen-report"><a href="javascript:void(0);">GENERATE REPORT</a></li>
				<li><a href="editAppt.php">ADD CLIENT</a></li>
				
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
			</ul>

			<?php }else{ ?>
			<ul class="nav navbar-nav">
				<li><a href="editAppt.php">REGISTRATION FORM</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
			</ul>

			<?php } ?>
		</div>
	</nav>

    <!-- <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
  </form>






<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Right Aligned Navbar</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div>

</body>
</html>
 -->