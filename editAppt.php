<?php
include ('session.php');
include ('editAppt-backend.php');
include ('header.php');
?>

 
<div>
    <p> <span class = "message"><?php echo $statusmsg; ?></span></p></div>
    <table width="100%" style="border-collapse:collapse" cellpadding="5">
        <form method="post" name="form" action="<?php echo $action;?>" onsubmit="return confirm('Do you really want to submit the form?');">
            <tr>
                <td style="text_align:right">First Name:</td>
                <td style="text_align:left"><input type="text" id="fname" name="fname" maxlength="255"
                    value = "<?php echo isset($fname)?$fname:"";  ?>"

                    /><span class="error"><?php echo isset($fnameError)?$fnameError:"";?></span></td>
                </tr>
                <tr>
                    <td style="text_align:right">Last Name:</td>
                    <td style="text_align:left"><input type="text" id="lname" name="lname" maxlength="255" value = "<?php echo isset($lname)?$lname:"";  ?>" /><span class="error"

                        ><?php echo isset($lnameError)?$lnameError:"";?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Prefer Name:</td>
                        <td style="text_align:left"><input type="text" id="pname" name="pname" maxlength="255" value = "<?php echo isset($pname)?$pname:"";  ?>"/><span class="error"

                            ><?php echo isset($pnameError)?$pnameError:"";?></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:right">Gender:</td>
                            <td style="text-align:left"><input type="radio" id="male" name="gender" maxlength="45" value="Male" <?php echo isset($gender)&&$gender=="Male"?"checked":"";?>/>Male <input type="radio" id="female" name="gender"    maxlength="45" value="Female" <?php echo isset($gender)&&$gender=="Female"?"checked":"";?>/>Female <span class="error"><?php echo isset($genderError)?$genderError:"";?></span></td>
                        </tr>
                        <tr>
                            <td style="text_align:right">Date of Birth:</td>
                            <td style="text_align:left"><input type="date" id="dob" name="dob"
                                value = "<?php echo isset($dob)?$dob:"";  ?>"
                                /><span class="error"><?php echo isset($dobError)?$dobError:"";?></span></td>
                            </tr>
                            <tr>
                                <td style="text_align:right">Nationality:</td>
                                <td style="text_align:left"><input type="text" id="nationality" name="nationality" maxlength="255"  value = "<?php echo isset($nationality)?$nationality:"";  ?>"/><span class="error"

                                    ><?php echo isset($nationalityError)?$nationalityError:"";?></span></td>
                                </tr>
                                <tr>
                                    <td style="text_align:right">Mobile:</td>
                                    <td style="text_align:left"><input type="tel" id="mobile" name="mobile" maxlength="45" value = "<?php echo isset($mobile)?$mobile:"";  ?>" /><span class="error"

                                        ><?php echo isset($mobileError)?$mobileError:"";?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="text_align:right">Email:</td>
                                        <td style="text_align:left"><input type="email" id="email" name="email" maxlength="255"
                                            value = "<?php echo isset($email)?$email:"";  ?>" /><span class="error"><?php echo isset($emailError)?$emailError:"";?></span></td>
                                        </tr>
                                        <tr>
                                            <td style="text_align:right">Course and Major:</td>
                                            <td style="text_align:left"><input type="text" id="cam" name="cam" maxlength="255" 
                                                value = "<?php echo isset($cam)?$cam:"";  ?>"
                                                /><span class="error"><?php echo isset($camError)?$camError:"";?></span></td>
                                            </tr>
                                            <tr>
                                                <td style="text_align:right">University:</td>
                                                <td style="text_align:left"><input type="text" id="uni" name="uni" maxlength="255"
                                                    value = "<?php echo isset($uni)?$uni:"";  ?>" /><span class="error"><?php echo isset($uniError)?$uniError:"";?></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="text_align:right">Course Completion Date:</td>
                                                    <td style="text_align:left"><input type="date" id="comp" name="comp" 
                                                        value = "<?php echo isset($comp)?$comp:"";  ?>"
                                                        /><span class="error"><?php echo isset($compError)?$compError:"";?></span></td>
                                                    </tr>

                                                    <!-- this form only available when users are logged in -->
                                                    <?php if(isset($_SESSION['userID'])){?>
                                                    <tr>
                                                        <td style="text_align:right">Current Visa:</td>
                                                        <td style="text_align:left"><input type="text" id="visa" name="visa" maxlength="255" value = "<?php echo isset($visa)?$visa:"";  ?>"/><span class="error"><?php echo isset($visaError)?$visaError:"";?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text_align:right">Visa Expiry Date:</td>
                                                        <td style="text_align:left"><input type="date" id="vexpiry" name="vexpiry" value = "<?php echo isset($vexpiry)?$vexpiry:"";  ?>"/><span class="error"><?php echo isset($vexpiryError)?$vexpiryError:"";?></span></td>
                                                    </tr>e
                                                    <tr>
                                                        <td style="text_align:right">Passport No.:</td>
                                                        <td style="text_align:left"><input type="text" id="passport" name="passport" maxlength="255" value = "<?php echo isset($passport)?$passport:"";  ?>" /><span class="error"><?php echo isset($passportError)?$passportError:"";?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text_align:right">Passport Expiry Date:</td>
                                                        <td style="text_align:left"><input type="date" id="pexpiry" name="pexpiry" value = "<?php echo isset($pexpirry)?$pexpiry:"";  ?>" /><span class="error"><?php echo isset($pexpiryError)?$pexpiryError:"";?></span></td>
                                                    </tr>


                                                    <?php } ?>
                                                    <tr>
                                                        <td style="text_align:right">Current Address:</td>
                                                        <td style="text_align:left"><input type="text" id="caddress" name="caddress" maxlength="255" value = "<?php echo isset($caddress)?$caddress:"";  ?>" /><span class="error"><?php echo isset($caddressError)?$caddressError:"";?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text_align:right">Home Country Address:</td>
                                                        <td style="text_align:left"><input type="text" id="haddress" name="haddress" maxlength="255" value = "<?php echo isset($haddress)?$haddress:"";  ?>"/><span class="error"><?php echo isset($haddressError)?$haddressError:"";?></span></td>
                                                    </tr>

                                                    <?php if(isset($_SESSION['userID'])){?>
                                                    <tr>
                                                       <td style="text_align:right">
                                                        Status:
                                                    </td>
                                                    <td>
                                                        <select id="status" name="status">

                                                            <option value= "not even in progress" <?php echo isset($status)&&$status=="not even in progress"?"selected":"" ?>>Not even in progress</option>
                                                            <option value= "contacted" <?php echo isset($status)&&$status=="contacted"?"selected":"" ?>>Not even in progress</option>
                                                            <option value= "on progress" <?php echo isset($status)&&$status=="on progress"?"selected":"" ?>> on progress</option>
                                                            <option value= "successfull" <?php echo isset($status)&&$status=="successfull"?"selected":"" ?>> Successfull</option>
                                                            <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option>

                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                                
                                                <tr>
                                                    
                                                    <select id="consultant" name="consultant" value = 6>
                                                        <?php foreach($agents as $agent) { ?>
                                                        <option value="<?php echo $agent["UserID"]; ?>" <?php echo isset($consultant)&&$consultant==$agent["UserID"]?"selected":"" ?>><?php echo $agent["DisplayName"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </tr>
                                               



                                                <?php if(isset($_SESSION['userID'])){?>
                                                <tr>
                                                    <td style="text_align:right">Skill Migration - Point Test:</td>
                                                    <td style="text_align:left"><input type="button" id="point" name="point" /><span class="error"><?php echo $pointError;?></span></td>
                                                </tr>
                                                <?php } ?>

                                                <input type = "submit" value = "submit" >



                                            </form>
                                        </table>
                                    </div>
                                </body>
                                </html>