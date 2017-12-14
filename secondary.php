
<?php if(isset($_SESSION['userID']) && isset($_GET['user'])){
    ?>
    <nav class="navbar navbar-default">
      <div class="container">

          <ul class="nav navbar-nav">
             <li class = "active">
                <a href=<?php echo "editAppt.php?user=$id"; ?>   >Cient Information</a>
            </li>
            <li >
             <a href=<?php echo "PointTest.php?user=$id"; ?>  >Point Test</a>
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


<?php if(isset($_GET['msg'])){ ?>
<div class = "alert <?php echo $_GET['flag']==1?'alert-success':'alert-danger';?>">
    <?php echo $_GET['msg']; ?>
</div>

<?php } ?> 
