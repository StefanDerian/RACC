<?php

$authpage = TRUE;
include('dbConnection.php'); //db connection

$statusmsg = "";
?>

<?php
    //set empty values
    $first = $last = $prefer = $dob = $nationality = $gender = $mobile = $email = $who = "";
    $firstErr = $lastErr = $dobErr = $nationalityErr = $genderErr = $mobileErr = $emailErr = $whoErr = "";

    


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
     

        $first = $_POST["first"];
        $last = $_POST["last"];
        $prefer = $_POST["prefer"];
        $dob = $_POST["dob"];
        $nationality = $_POST["nationality"];
        $gender = $_POST["gender"];
        $mobile = $_POST["mobile"];
        $email = $_POST['email'];
        $who = $_POST['who'];
        
        //check if it's empty
        if (empty($_POST["first"])) {
            $firstErr = "<br /> First name is required";
        } else {
            if (!preg_match("/[a-zA-Z ]/",$first)) {
			$firstErr = "<br />First name must contain a letter";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["last"])) {
            $lastErr = "<br /> Last name is required";
        } else {
            if (!preg_match("/[a-zA-Z ]/",$last)) {
			$lastErr = "<br />Last name must contain a letter";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["dob"])) {
            $dobErr = "<br /> Date of Birth is required";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["nationality"])) {
            $nationalityErr = "<br /> Nationality is required";
        } else {
            if (!preg_match("/[a-zA-Z ]/",$nationality)) {
			$nationalityErr = "<br />Nationality must contain a letter";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["gender"])) {
            $genderErr = "<br /> Gender is required";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["mobile"])) {
            $mobileErr = "<br /> Mobile is required";
        } else { 
            if (strpos($mobile, " ") != false) {
			$mobileErr = "<br /> Mobile must not contain spaces";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["email"])) {
            $emailErr = "<br /> Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "<br /> Invalid email format"; 
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["who"])) {
            $whoErr = "<br /> Required";
        }
    }
?>

<?php //store data
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit") {  
        $query = "INSERT INTO userAccount (FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, Who) VALUES ('$first', '$last', '$prefer', '$dob', '$nationality', '$gender', '$mobile', '$email', '$who')";
        echo $query;
        $mysqli->query($query);
}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Register page</title>
        
    </head>
    
    <body>
        <header>
            
        </header>
        
        <div class="main">
            <br/>
            
            <form method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <table width="100%" style="border-collapse:collapse" cellpadding="9">
                    <h2>Please fill in this form<br/></h2>
                    <tr>
                        <td width="50%">First name</td>
                        <td style="text-align:left"><input type="text" name="first" /><span class="error">* <?php echo $firstErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Last name</td>
                        <td><input type="text" name="last" /><span class="error">* <?php echo $lastErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Prefer name</td>
                        <td style="text-align:left"><input type="text" name="prefer" /></td>
                    </tr>
                    <tr>
                        <td>Date of brith</td>
                        <td style="text-align:left"><input type="date" name="dob" value="Dob" /><span class="error">* <?php echo $dobErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td style="text-align:left"><input type="text" name="nationality"  /><span class="error">* <?php echo $nationalityErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td style="text-align:left"><input type="radio" id="male" name="gender" value="Male"/> Male
                            <input type="radio" id="female" name="gender" value="Female" /> Female <span class="error">* <?php echo $genderErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td style="text-align:left"><input type="number" name="mobile" /><span class="error">* <?php echo $mobileErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td style="text-align:left"><input type="email" name="email" /><span class="error">* <?php echo $emailErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Who are you meeting today?</td>
                        <td style="text-align:left"><input type="text" name="who" /><span class="error">* <?php echo $whoErr;?></span></td>
                    </tr>
                    <tr>
                        <td style="text-align:center" colspan="2"><input type="submit" name="submit" value="Submit"/></td>
                    </tr>
                </table>
                
            </form>
        </div>
    </body>
</html>