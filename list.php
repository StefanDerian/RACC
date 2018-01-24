<?php
include('session.php');
// include('list-backend.php');

// include ('header.php');
include ('header2.php');

include ('editDate-backend.php');

?>
<script type="text/javascript" src = "./printMe/jquery-printme.js"></script>
<!-- <script type="text/javascript" src = "list.js"></script> -->

<?php
if($_SESSION['userType'] == "MANAGER"){
    include('dbConnection.php'); 
//db connection
    $consultants = array();
    $consultantQuery = "SELECT * FROM account";
    if ($result = $mysqli->query($consultantQuery)) {
        while ($row = $result->fetch_assoc()) {
            $consultant = array();
            foreach ($row as $key => $value) {
            # code...
                $consultant[$key] = $value;
            }
            array_push($consultants, $consultant);

        }
    }
}
?>
<?php if($_SESSION['userType'] == "MANAGER"){ ?>

<script>
    jQuery(function($){
        $.getDataTable('list-admin-table.json');
    });
</script>

<?php }else{ ?>
<script>
    jQuery(function($){
        console.log('ok')
        $.getDataTable('list-table.json',false);
    });
</script>

<?php } ?> 


<br>
<div class = "container">
    <?php include('message.php'); ?>

    <div class="row">



        <form method="post" name="info" id="search-form" >
            <div class="col-md-2" >

                <div class = "form-group">
                    <label> First Name:</label>

                    <input type="text" id="firstname" class="form-control search-form" name="search" placeholder="Search by Name..."/>

                </div>
            </div>
            <div class="col-md-2" >

                <div class = "form-group">
                    <label> Last Name:</label>

                    <input type="text" id="lastname" class="form-control search-form" name="search" placeholder="Search by Name..."/>

                </div>
            </div>  

            <div class="col-md-2" >
                <div class = "form-group">
                    <label> Date Of Birth:</label>
                    <input type="date" id="birthday" class="form-control search-form" name="dob" placeholder="dd/mm/yyyy"/>
                </div>
            </div>  
            <div class="col-md-2" >

                <div class = "form-group">
                    <label> phone number:</label>
                    <input type="tel" id="phone" class="form-control search-form" name="phone" placeholder="Search by Phone Number..."/>
                </div>
            </div>  
            <div class="col-md-2" >

                <div class = "form-group">
                    <label> Visa Expiry Date:</label>
                    <input type="date" id="vexpiry" class="form-control search-form" name="vexpiry" placeholder="dd/mm/yyyy"/>
                </div>
            </div>  

            <div class="col-md-2" >
                <div class = "form-group">
                    <label> Last Contact Date In:</label>
                    <select id="lastContacted" name="lastContacted" class = "form-control search-form">

                        <option value= "">Any Month</option>
                        <option value= "-1" >Last 1 Months</option>
                        <option value= "-2" >Last 2 Months</option>
                        <option value= "-3" >Last 3 Months</option>
                        <!--  <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option> -->
                    </select>
                </div>
            </div>
            <div class="col-md-2" >
                <div class = "form-group">
                    <label>Status:</label>
                    <select id="status" name="status" class = "form-control search-form">

                        <option value= "">Any Progress</option>
                        <option value= "new client" >new client</option>
                        <option value= "on progress" > app on progress</option>
                        <option value= "successfull" > Successfull</option>
                        <!--  <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option> -->
                    </select>
                </div>
            </div>

            <?php if($_SESSION['userType'] != "AGENT"){ ?>
            <div class="col-md-2" >

                <div class = "form-group">
                    <label> Consultant Name:</label>
                    <select id="consultant" name="consultant" class = "form-control search-form">
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
                    <input type="submit" class ="btn btn-warning" id = "search-button" name="Btsearch" value="Reset Search"/>
                </div>
            </div>
        </form>
    </div>
   
    <!-- <a href = "editAppt.php" class = "btn btn-lg btn-primary pull-right"> Add Client</a> -->
    <!-- <button  class = "btn btn-lg btn-primary pull-right" id ="gen-report"> Generate Report</button> -->







    <table width="100%" style="border-collapse:collapse" cellpadding="5"  class="table table-striped table-bordered table-hover dt-responsive " id = "client-table">
        <thead>
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
                <!--  <th>Reference</th> -->
                <th>Last Contact</th>
                <?php if($_SESSION["userType"] != "AGENT"){?>
                <th>Consultant</th>
                <th style = "display:none">ConsultantID</th>
                <?php }?>
                <th>Due Date</th>

            </tr>
        </thead>
    <!-- <?php if (empty($appointment)){ ?>

    <span class = "alert alert-warning"> There is no match with your Search criteria</span>
    <?php } else {?> -->
  <!--   <tbody>
        <?php foreach($appointments as $appointment) { ?>
        <tr class="listrow <?php echo $appointment["urgent"] == 1?'danger':''; ?>" id = "list-Client">

            <td ><input type="checkbox" class="urgent-switch" <?php echo $appointment["urgent"] == 1?'checked':''; ?> data-id='<?php echo $appointment["UserID"]; ?>' ></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["FirstName"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["LastName"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Mobile"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["DateofBirth"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["Email"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["CurrentStatus"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["vexpiry"]=="0000-00-00"?"<i><font color='grey'>There is no information yet</font></i>": $appointment["vexpiry"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo $appointment["course"] ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo !empty($appointment["know"])?$appointment['know']:"<i><font color='grey'>not filled </font></i>"; ?></td>
            <td onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'"><?php echo empty($appointment["lastContacted"])?"<i><font color='grey'>There is still no contact </font></i>": $appointment["lastContacted"] ?></td>
            <?php if($_SESSION["userType"] != "AGENT"){?>


            <td><?php echo empty($appointment["consultant"])?"<i><font color='grey'>Not assigned</font></i>":$appointment["consultant"] ?></td>
            <?php }?>

        </tr>


        <?php } ?>
    </tbody> -->
    <?php } ?>
</table>

</div>






</body>
</html>