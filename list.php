<?php
include('session.php');
include('list-backend.php');

// include ('header.php');
include ('header2.php');

include ('editDate-backend.php');

?>
<script type="text/javascript" src = "./printMe/jquery-printme.js"></script>
<script type="text/javascript" src = "list.js"></script>

<br>
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

                <input type="text" class="form-control" name="search" placeholder="Search by Name..."/>

            </div>
        </div> 
        <div class="col-md-2" >

            <div class = "form-group">
                <label> Date Of Birth:</label>
                <input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy"/>
            </div>
        </div>  
        <div class="col-md-2" >

            <div class = "form-group">
                <label> phone number:</label>
                <input type="tel" class="form-control" name="phone" placeholder="Search by Phone Number..."/>
            </div>
        </div>  
        <div class="col-md-2" >

            <div class = "form-group">
                <label> Enter Visa Expiry Date:</label>
                <input type="date" class="form-control" name="vexpiry" placeholder="dd/mm/yyyy"/>
            </div>
        </div>  

        <div class="col-md-2" >
            <div class = "form-group">
                <label> Enter Last Contact Date In:</label>
                <select id="status" name="lastContacted" class = "form-control">

                    <option value= "">Any Month</option>
                    <option value= "-1" >Last 1 Months</option>
                    <option value= "-2" >Last 2 Months</option>
                    <option value= "-3" >Last 3 Months</option>
                    <!--  <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option> -->
                </select>
            </div>
        </div>

        <?php if($_SESSION['userType'] != "AGENT"){ ?>
        <div class="col-md-2" >

            <div class = "form-group">
                <label> Enter Consultant Name:</label>
                <select id="consultant" name="consultant" class = "form-control">
                    <option value= ""> Any </option>
                    <?php foreach ($consultants as $key => $value) {?>

                    <option value= "<?php echo $value['UserID'];?>"> <?php echo $value['DisplayName'];?></option>
                    <?php } ?>
                    
                    <!--  <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option> -->

                </select>
            </div>
        </div>  

        <?php } ?>

        <div class="form-group" >
            <div align="center">
                <input type="submit" class ="btn btn-warning" name="Btsearch" value="Search"/>
            </div>
        </div>
    </form>
</div>
<!-- <a href = "editAppt.php" class = "btn btn-lg btn-primary pull-right"> Add Client</a> -->
<!-- <button  class = "btn btn-lg btn-primary pull-right" id ="gen-report"> Generate Report</button> -->

<table width="100%" style="border-collapse:collapse" cellpadding="5" id = "clients-list" class="table table-hover">
    <tr class = "info">
        <th>Emergency</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Mobile</th>
        <th>DOB</th>
        <th>Email</th>
        <th>Status</th>
        <th>Visa Expiry Date</th>
        <th>Course</th>
        <th>Last Contact</th>


        <?php if($_SESSION["userType"] != "AGENT"){?>

        <th>Consultant</th>
        <?php }?>

    </tr>
    <?php if (empty($appointment)){ ?>

    <span class = "alert alert-warning"> There is no match with your Search criteria</span>
    <?php } else {?>


    <?php foreach($appointments as $appointment) { ?>
    <tr class="listrow">
        <td><input type="checkbox" name="my-checkbox" checked></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["FirstName"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["LastName"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Mobile"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["DateofBirth"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Email"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["CurrentStatus"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["vexpiry"]=="0000-00-00"?"<i><font color='grey'>There is no information yet</font></i>": $appointment["vexpiry"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["course"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo empty($appointment["lastContacted"])?"<i><font color='grey'>There is still no contact </font</i>": $appointment["lastContacted"] ?></td>
            <?php if($_SESSION["userType"] != "AGENT"){?>


            <td><?php echo empty($appointment["consultant"])?"<i><font color='grey'>Not assigned</font></i>":$appointment["consultant"] ?></td>
            <?php }?>

        </tr>

        <?php } ?>
        <?php } ?>
    </table>
    <div align="center">
        <?php $pagination->render(); ?>
    </div> 
</div>






</body>
</html>