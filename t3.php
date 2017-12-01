<?php
include('dbConnection.php');
$authpage = TRUE;

$statusmsg = "";
?>

<?php
//defining variables and setting empty values
$first = $last = $prefer = $dob = $nationality = $gender = $mobile = $email = $who = "";
$firstErr = $lastErr = $dobErr = $nationalityErr = $genderErr = $mobileErr = $emailErr = $whoErr = "";


if(isset($_GET["success"]) && $_GET["success"] == 1) {
    $statusmsg = "You have been received, Thank you.";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if it's empty
    if(empty($_POST["first"])){
        $firstErr = "<br /> First name is required";
    } else {
        $first = $_POST["first"];
        // check if name contains a letter
		if (!preg_match("/[a-zA-Z ]/",$first)) {
			$firstErr = "<br />First name must contain a letter";
		}
    }
    
    if(empty($_POST["last"])) {
        $lastErr = "<br /> Last name is required";
    } else {
        $last = $_POST["last"];
        if (!preg_match("/[a-zA-Z ]/",$last)) { //check if username contains a letter
			$userErr = "<br />Last name must contain a letter";
        }
    }
    
    $prefer = $_POST["prefer"];
    
    if(empty($_POST["dob"])) {
        $dobErr = "<br /> Date of Birth is required";
    } else {
        $dob = $_POST["dob"];
    }
    
    if(empty($_POST["nationality"])) {
        $nationalityErr = "<br /> Nationality is required";
    } else {
        $nationality = $_POST["nationality"];
        if (!preg_match("/[a-zA-Z ]/",$nationality)) { //check if nationality contains a letter
			$nationalityErr = "<br />Nationality must contain a letter";
        }
    }
    
    if(empty($_POST["gender"])) {
        $genderErr = "<br /> Gender is required.";
    } else {
        $gender = $_POST["gender"];
    }
    
    if(empty($_POST["mobile"])) {
        $mobileErr = "<br /> Mobile is required";
    } else {
        $mobile = $_POST["mobile"];
        // check if mobile contains a letter
		if (strpos($mobile, " ") != false) {
            $error++;
			$mobileErr = "<br /> Mobile must not contain spaces";
            }
    }
    
    if(empty($_POST["email"])) {
        $emailErr = "<br /> Email is required";
    } else {
        $email = $_POST["email"];
        // check if email contains a letter
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error++;
            $emailErr = "<br /> Invalid email format"; 
        }
    }
    
    if(empty($_POST["who"])) {
        $whoErr = "<br /> Name is required.";
    } else {
        $who = $_POST["who"];
    }
}
?>

<?php //store data
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit") {  
    $query = "INSERT INTO client (FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, Who) VALUES ('$first', '$last', '$prefer', '$dob', '$nationality', '$gender', '$mobile', '$email', '$who')";
    echo $query;
    $mysqli->query($query);
}?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Register</title>
        
    </head>
    
    <header>
    
    </header>
    
    <body>
        <p> <?php echo $statusmsg; ?></p>
        <table width="100%" style="border-collapse:collapse" cellpadding="5">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <H2>Please fill in this form</H2>
                <tr>
                    <td width="50%" style="text-align:right">First name:</td>
                    <td style="text-align:left"><input type="text" name="first" maxlength="255" value=""/><span class="error">* <?php echo $firstErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Last Name:</td>
                    <td style="text-align:left"><input type="text" name="last" maxlength="45" value=""/><span class="error">* <?php echo $lastErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Prefer Name:</td>
                    <td style="text-align:left"><input type="text" name="prefer" maxlength="45" value=""/></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Date of Birth:</td>
                    <td style="text-align:left"><input type="date" name="dob" maxlength="32" value=""/><span class="error">* <?php echo $dobErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Nationality:</td>
                    <td style="text-align:left"><input type="text" name="nationality" maxlength="45" value=""/><span class="error">* <?php echo $nationalityErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Gender:</td>
                    <td style="text-align:left"><input type="radio" id="male" name="gender" maxlength="45" value="Male"/>Male <input type="radio" id="female" name="gender" maxlength="45" value="Female"/>Female<span class="error">* <?php echo $genderErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Mobile:</td>
                    <td style="text-align:left"><input type="number" name="mobile" maxlength="45" value=""/><span class="error">* <?php echo $mobileErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Email:</td>
                    <td style="text-align:left"><input type="email" name="email" maxlength="45" value=""/><span class="error">* <?php echo $emailErr;?></span></td>
                </tr>
                <tr>
                    <td width="50%" style="text-align:right">Who are you going to meet today:</td>
                    <td style="text-align:left">
                        <select id="who" name="who">
                            <option value="">Select</option>
                            <option value="michael">Michael</option>
                            </select>
                            <span class="error">* <?php echo $whoErr;?></span></td>
                </tr>
                <tr><td /></tr>
                <tr>
                    <td style="text-align:center" colspan="2">
                        <input type="submit" name="submit" value="Submit"/>
                        <br/><span class="error"><?php echo "<br/>*fields are mandatory";?></span>
                    </td>
                </tr>
            </form>
        </table>
    </body>

</html>