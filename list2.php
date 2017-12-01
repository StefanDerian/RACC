<?php


if(isset($_POST['Btsearch'])) {
    $search = $_POST['search'];
    //search in all table columns
    //$query = "SELECT FirstName, LastName, PreferName, Mobile, Email FROM user WHERE CONCAT('FirstName', 'LastName', 'PreferName', 'Mobile', 'Email') AND ConsultantID = 6 LIKE '%".$search."%'";
    $query = "SELECT FirstName, LastName, PreferName, Mobile, Email FROM user WHERE ConsultantID = 6 AND CONCAT(`FirstName`, `LastName`, `PreferName`) LIKE '%".$search."%'";
    $search_result = table($query);
} else {
    $query = "SELECT UserID, FirstName, LastName, PreferName, Mobile, Email FROM user WHERE ConsultantID = 6";
    $search_result = table($query);
}

//function to connect and execute the query
function table($query){
    include('dbConnection.php'); //db connection
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($mysqli));
        exit();
    }
    return $result;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>information page</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    
    <body>
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