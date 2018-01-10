
<?php
include('session.php');
include ('header.php');
include('createAccount-backend.php');


?>

<link rel="stylesheet" type="text/css" href="css/create-account.css">




<?php if(!empty($queryStatus)){ ?>
<div class = "alert <?php echo $queryFlag==1?'alert-success':'alert-danger';?>">
    <p><?php echo $queryStatus; ?></p>
</div>
<?php } ?>






<div class = "container jumbotron create-account-container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <H2><?php echo isset($_GET['id'])?'Update Agent':'Create a new user account'; ?></H2>
        <div class = "form-group">
            <label>Display name:</label>
            <div style="text-align:left">
                <input type="text" class = "form-control" name="display" maxlength="255"  width="50%" value = "<?php echo $display; ?>" />
                <span class="error">* <?php echo $displayErr;?></span>
            </div>
        </div>
        <div class = "form-group">
            <label>User name:</label>
            <div style="text-align:left">
                <input type="text" class = "form-control" name="user" maxlength="255"  width="50%" value = "<?php echo $user; ?>" />
                <span class="error">* <?php echo $userErr;?></span>
            </div>
        </div>
        <!-- <div class = "form-group">
            <label>Phone Number:</label>
            <div style="text-align:left">
                <input type="tel" class = "form-control" name="phone" maxlength="255" value="" width="50%" value = "<?php echo $phone; ?>"/>
                <span class="error">* <?php echo $phoneErr;?></span>
            </div>
        </div>
        <div class = "form-group">
            <label>Email:</label>
            <div style="text-align:left">
                <input type="email" class = "form-control" name="email" maxlength="255" value="" width="50%" value = "<?php echo $email; ?>"/>
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
        </div> -->
        <div class = "form-group">
            <label>Spoken Language:</label>
            <div style="text-align:left">
                <input type="text" class = "form-control" name="lang" maxlength="255"  width="50%" value = "<?php echo $lang; ?>"/>
                <span class="error">* <?php echo $langErr;?></span>
            </div>
        </div> 
        <?php if(!isset($_GET)){ ?>
        <div class = "form-group">
            <label>Role:</label>
            <div style="text-align:left">
                <select class = "form-control" width="50%" >
                    <option value  = "AGENT" <?php echo $role=='AGENT'?'selected':''; ?>> AGENT </option>
                    <option value  = "MANAGER" <?php echo $role=='MANAGER'?'selected':''; ?>> MANAGER </option>
                </select>
            </div>
        </div>
        <?php } ?>




        <div class = "form-group">
            <label>Password:</label>
            <div style="text-align:left">
                <input type="password" class = "form-control" name="pass" maxlength="255" value="" width="50%" />
                <span class="error">* <?php echo $passErr;?></span>
            </div>
        </div>
        <div class = "form-group">
            <label>Re-Type Password:</label>
            <div style="text-align:left">
                <input type="password" class = "form-control" name="repass" maxlength="255" value="" width="50%" />
                <span class="error">* <?php echo $repassErr;?></span>
            </div>
        </div>
      <!--   <tr>
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
        <tr><td /></tr> -->
        <tr>
            <td style="text-align:center" colspan="2">
                <input type="submit" class = "btn btn-lg btn-primary" name="submit" value="<?php echo isset($_GET)?'Update Account':'Create Account'?>"/>
                <br/><span class="error"><?php echo "<br/>*fields are mandatory";?></span>
            </td>
        </tr>
    </form>
</div>
</body>

</html>