<?php

include('list-backend.php');


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>information page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <header>
    
    </header>
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
                </tr>
                
                
                <?php foreach($appointments as $appointment) { ?>
                <tr class="listrow" onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'">
                    <td><?php echo $appointment["FirstName"] ?></td>
                    <td><?php echo $appointment["LastName"] ?></td>
                    <td><?php echo $appointment["PreferName"] ?></td>
                    <td><?php echo $appointment["Mobile"] ?></td>
                    <td><?php echo $appointment["Email"] ?></td>
                </tr>
                <?php } ?>
            </table>
        </form>
    </div>
</body>
</html>