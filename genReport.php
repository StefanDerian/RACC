
<?php 

include('genReport-backend.php');
include('header2.php');
?>


<button  class = "btn btn-lg btn-primary" id="gen-report">Print</button>
<table width="100%" style="border-collapse:collapse" cellpadding="5" id = "clients-list" class="table table-hover">
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


        <?php if($_SESSION["userType"] != "AGENT"){?>

        <th>Consultant</th>
        <?php }?>

    </tr>

    <?php foreach($appointments as $appointment) { ?>
    <tr class="listrow" onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'">
        <td><?php echo $appointment["FirstName"] ?></td>
        <td><?php echo $appointment["LastName"] ?></td>
        
        <td><?php echo $appointment["Mobile"] ?></td>
        <td><?php echo $appointment["DateofBirth"] ?></td>
        <td><?php echo $appointment["Email"] ?></td>
        <td><?php echo $appointment["CurrentStatus"] ?></td>
        <td><?php echo $appointment["vexpiry"]=="0000-00-00"?"<i><font color='grey'>There is no information yet</font></i>": $appointment["vexpiry"] ?></td>
        <td><?php echo $appointment["course"] ?></td>
        <td><?php echo empty($appointment["lastContacted"])?"<i><font color='grey'>There is still no contact </font></i>": $appointment["lastContacted"] ?></td>



            <?php if($_SESSION["userType"] != "AGENT"){?>


            <td><?php echo empty($appointment["consultant"])?"<i><font color='grey'>Not assigned</font></i>":$appointment["consultant"] ?></td>
            <?php }?>

        </tr>


        <?php } ?>
        

    </table>









</table>