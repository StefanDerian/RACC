<?php
include('session.php');
include('list-backend.php');

include ('header.php');

?>

<div>
    
    <form method="post" name="info" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <input type="text" name="search" placeholder="Search for client..."/>
        <input type="submit" name="Btsearch" value="Search"/>
        
        <table width="100%" style="border-collapse:collapse" cellpadding="5">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Prefer Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
            
            
            <?php foreach($appointments as $appointment) { ?>
            <tr class="listrow" onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'">
                <td><?php echo $appointment["FirstName"] ?></td>
                <td><?php echo $appointment["LastName"] ?></td>
                <td><?php echo $appointment["PreferName"] ?></td>
                <td><?php echo $appointment["Mobile"] ?></td>
                <td><?php echo $appointment["Email"] ?></td>
                <td><?php echo $appointment["CurrentStatus"] ?></td>
                
            </tr>
            <?php } ?>
        </table>
    </form>
</div>
</body>
</html>