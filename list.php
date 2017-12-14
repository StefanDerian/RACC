<?php
include('session.php');
include('list-backend.php');

include ('header.php');

include ('editDate-backend.php');

?>
<script type="text/javascript" src = "list.js"></script>
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
    <!--     <div class="col-md-2" >

            <div class = "form-group">
                <label> Enter Course:</label>
                <input type="text" class="form-control" name="course" placeholder="Course..."/>

            </div>
        </div> -->
        <div class="col-md-2" >

            <div class = "form-group">
                <label> Date Of Birth:</label>
                <input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy"/>
            </div>
        </div>  
        <div class="col-md-2" >

            <div class = "form-group">
                <label> phone number:</label>
                <input type="tel" class="form-control" name="phone" placeholder="dd/mm/yyyy"/>
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
                    <option value= "-3" > Last 3 Months</option>
                    <!--  <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option> -->

                </select>
            </div>
        </div>  

        <div class="col-md-2" >

            <input type="submit" class ="btn btn-warning" name="Btsearch" value="Search"/>
        </div>
    </form>
</div>
<a href = "editAppt.php" class = "btn btn-lg btn-primary pull-right"> Add Client</a>
<button  class = "btn btn-lg btn-primary pull-right" onclick = "printData()"> Generate Report</button>
<table width="100%" style="border-collapse:collapse" cellpadding="5" class="table table-hover" id="clients-list">
    <tr class = "info">
        <th>First Name</th>
        <th>Last Name</th>
        <!-- <th>Prefer Name</th> -->
        <th>Mobile</th>
        <th>DOB</th>
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
        
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Mobile"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["DateofBirth"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Email"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["CurrentStatus"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["vexpiry"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["course"] ?></td>
        <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["lastContacted"] ?></td>
        

    </tr>


    <?php } ?>
    <?php } ?>

</table>

</div>






</body>
</html>