<?php 
    include('register-backend.php');
?>


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