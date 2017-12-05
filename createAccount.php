<?php
include('dbConnection.php');
$authpage = TRUE;





$statusmsg = "";
?>

<?php
//defining variables and setting empty values
$display = $user = $pass = $repass = "";
$displayErr = $userErr = $passErr = $repassErr = "";

if(isset($_GET["success"]) && $_GET["success"] == 1) {
    $statusmsg = "Account creation was successful.";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if it's empty
    if(empty($_POST["display"])){
        $displayErr = "<br /> Diaplay name is required";
    } else {
        $display = $_POST["display"];
    }
    
    if(empty($_POST["user"])) {
        $userErr = "<br /> Username is required";
    } else {
        $user = $_POST["user"];
        if (!preg_match("/[a-zA-Z ]/",$user)) { //check if username contains a letter
			$userErr = "<br />Username must contain a letter";
        }
    }
    
    if(empty($_POST["pass"])) {
        $passErr = "<br />Password is required";
    } else {
        $pass = $_POST["pass"];
        if(strpos($pass, " ") != false) { //check if password contains a space
            $passErr = "<br />Password must not contain spaces";
        } else if(strlen($pass)<5) {
            $passErr = "<br />Password must contain at least 5 charaters";
        }
    }
    
    if(empty($_POST["repass"])) {
        $repassErr = "<br />Re-typed Password is required";
    } else {
        $repass = $_POST["repass"];
        if($repass != $pass){
            $repassErr = "<br />Passwords must match";
        }
    }
}
?>

<?php //store data
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Create Account") {  
    $encrypt_pass=MD5($pass); //encrypt password
    $query = "INSERT INTO Account (DisplayName, UserName, Password) VALUES ('$display', '$user', '$encrypt_pass')";
    echo $query;
    $mysqli->query($query);
}?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Create Account</title>
        
    </head>
    
    <header>
    
    </header>
    
    <body>
        <p> <?php echo $statusmsg; ?></p>
        <table width="100%" style="border-collapse:collapse" cellpadding="5">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <H2>Create a new user account</H2>
                <tr>
                    <td width="50%" style="text-align:right">Display name:</td>
                    <td style="text-align:left"><input type="text" name="display" maxlength="255" value=""/><span class="error">* <?php echo $displayErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Username:</td>
                    <td style="text-align:left"><input type="text" name="user" maxlength="45" value=""/><span class="error">* <?php echo $userErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Password:</td>
                    <td style="text-align:left"><input type="password" name="pass" maxlength="32" value=""/><span class="error">* <?php echo $passErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Re-type Password:</td>
                    <td style="text-align:left"><input type="password" name="repass" maxlength="45" value=""/><span class="error">* <?php echo $repassErr;?></span></td>
                </tr>
                <tr><td /></tr>
                <tr>
                    <td style="text-align:center" colspan="2">
                        <input type="submit" name="submit" value="Create Account"/>
                        <br/><span class="error"><?php echo "<br/>*fields are mandatory";?></span>
                    </td>
                </tr>
            </form>
        </table>
    </body>

</html>