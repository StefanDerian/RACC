<!-- <link rel = "stylesheet" type="text/css" href = "./css/secondary.css"/> -->
<?php if(isset($_SESSION['userID'])){
  ?>
  <nav class="navbar navbar-default">
    <div class="container">

      <ul class="nav navbar-nav">
       <li>
        <a href=<?php echo "editAppt.php?user=$id"; ?>>Personal Information</a>
      </li>

      <li>
       <a href=<?php echo "PointTest.php?user=$id"; ?>>Migration</a>
     </li>

     <li>
      <a href=<?php echo "education.php?user=$id"; ?>>Education</a>
     </li>

   </ul>
 </div>
</nav>
<!-- <div class="btn-group">
    <li class = "active">
        <a href=<?php echo 'editAppt.php?user=$id'; ?> class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" >Edit Data</a>
    </li>
    <li >
       <a href=<?php echo "PointTest.php?user=$id"; ?> class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Point Test</a>
   </li>
 </div> -->
 <?php } ?>



