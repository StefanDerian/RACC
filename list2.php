<?php


include ('list2-backend.php');
include ('header.php');

?>


        <form method="post" name="info" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="search" placeholder="search client">
            <input type="submit" name="Btsearch" value="Search">
            <input type="button" name="reflect" value="Show all" onClick="document.location.href='list2.php'" >
            
            <table width="100%" style="border-collapse:collapse" cellpadding="5">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Prefer Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)) {?>
                <tr class="listrow" onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'">
                    <td><?php echo $row['FirstName'];?></td>
                    <td><?php echo $row['LastName'];?></td>
                    <td><?php echo $row['PreferName'];?></td>
                    <td><?php echo $row['Mobile'];?></td>
                    <td><?php echo $row['Email'];?></td>
                </tr>
                <?php }?>
            </table>
        </form>
        
        <?php
        include('footer.php'); //menu and navigation controls
        ?>
        
    </body>
</html>