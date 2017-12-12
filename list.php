<?php
include('session.php');
include('list-backend.php');

include ('header.php');

include ('editDate-backend.php');

?>

<div class = "container-fluid">
    <div class="row">

       <?php if(isset($_GET['msg'])){ ?>
       <div class = "alert <?php echo $_GET['flag']==1?'alert-success':'alert-danger';?>">
        <?php echo $_GET['msg']; ?>
    </div>
    <?php } ?>

    <form method="post" name="info" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="col-md-2" >

            <div class = "form-group">
                <label> Enter Name:</label>

                <input type="text" class="form-control" name="search" placeholder="Search for client Name..."/>

            </div>
        </div> 
        <div class="col-md-2" >

            <div class = "form-group">
                <label> Enter Course:</label>
                <input type="text" class="form-control" name="course" placeholder="Course..."/>

            </div>
        </div>
        <div class="col-md-2" >

            <div class = "form-group">
                <label> Enter Visa Expiry Date:</label>
                <input type="date" class="form-control" name="vexpiry[begin]" placeholder="dd/mm/yyyy"/>
                To
                <input type="date" class="form-control" name="vexpiry[end]" placeholder="dd/mm/yyyy"/>
            </div>
        </div>  

        <div class="col-md-2" >

            <div class = "form-group">
                <label> Enter Last Contact Date:</label>
                <input type="date" class="form-control" name="lastContact[begin]" placeholder="dd/mm/yyyy"/>
                To
                <input type="date" class="form-control" name="lastContact[end]" placeholder="dd/mm/yyyy"/>
            </div>
        </div>  

        <div class="col-md-2" >

            <input type="submit" class ="btn btn-warning" name="Btsearch" value="Search"/>
        </div>
    </form>
</div>
<a href = "editAppt.php" class = "btn btn-lg btn-primary pull-right"> Add Client</a>
<table width="100%" style="border-collapse:collapse" cellpadding="5" class="table table-hover">
    <tr class = "info">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Prefer Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Status</th>
        <th>Visa Expiry Date</th>
        <th>Course</th>
        <th>Last Contact</th>

    </tr>
    <?php if (empty($appointment)){ ?>

    <span class = "alert alert-warning"> There is no match with your Search criteria</span>
    <?php } else {?>


    <?php foreach($appointments as $appointment) { ?>
    <tr class="listrow">
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["FirstName"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["LastName"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["PreferName"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Mobile"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Email"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["CurrentStatus"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["vexpiry"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["course"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["lastContacted"] ?></td>
        <td ><?php new editDate($appointment["UserID"], $_SERVER['PHP_SELF']) ?> </td>

    </tr>


    <?php } ?>
    <?php } ?>

</table>

</div>






</body>
</html>