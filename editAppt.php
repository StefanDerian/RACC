<?php
include ('editAppt-backend.php');
//include ('header.php');
?>


        <div>
            <p><?php echo $statusmsg; ?></p>
            <table width="100%" style="border-collapse:collapse" cellpadding="5">
                <form method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return confirm('Do you really want to submit the form?');">
                    <tr>
                        <td style="text_align:right">First Name:</td>
                        <td style="text_align:left"><input type="text" id="fname" name="fname" maxlength="255" /><span class="error"><?php echo $fnameError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Last Name:</td>
                        <td style="text_align:left"><input type="text" id="lname" name="lname" maxlength="255" /><span class="error"><?php echo $lnameError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Prefer Name:</td>
                        <td style="text_align:left"><input type="text" id="pname" name="pname" maxlength="255" /><span class="error"><?php echo $pnameError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Date of Birth:</td>
                        <td style="text_align:left"><input type="date" id="dob" name="dob"/><span class="error"><?php echo $dobError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Nationality:</td>
                        <td style="text_align:left"><input type="text" id="nationality" name="nationality" maxlength="255" /><span class="error"><?php echo $nationalityError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Mobile:</td>
                        <td style="text_align:left"><input type="number" id="mobile" name="mobile" maxlength="45" /><span class="error"><?php echo $mobileError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Email:</td>
                        <td style="text_align:left"><input type="email" id="email" name="email" maxlength="255" /><span class="error"><?php echo $emailError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Course and Major:</td>
                        <td style="text_align:left"><input type="text" id="cam" name="cam" maxlength="255" /><span class="error"><?php echo $camError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">University:</td>
                        <td style="text_align:left"><input type="text" id="uni" name="uni" maxlength="255" /><span class="error"><?php echo $uniError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Course Completion Date:</td>
                        <td style="text_align:left"><input type="date" id="comp" name="comp" /><span class="error"><?php echo $compError;?></span></td>
                    </tr>


                    <?php if(isset($_SESSION['UserID'])){?>
                    <tr>
                        <td style="text_align:right">Current Visa:</td>
                        <td style="text_align:left"><input type="text" id="visa" name="visa" maxlength="255" /><span class="error"><?php echo $visaError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Visa Expiry Date:</td>
                        <td style="text_align:left"><input type="date" id="vexpiry" name="vexpiry" /><span class="error"><?php echo $vexpiryError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Passport No.:</td>
                        <td style="text_align:left"><input type="text" id="passport" name="passport" maxlength="255" /><span class="error"><?php echo $passportError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Passport Expiry Date:</td>
                        <td style="text_align:left"><input type="date" id="pexpiry" name="pexpiry" /><span class="error"><?php echo $pexpiryError;?></span></td>
                    </tr>


                    <?php } ?>
                    <tr>
                        <td style="text_align:right">Current Address:</td>
                        <td style="text_align:left"><input type="text" id="caddress" name="caddress" maxlength="255" /><span class="error"><?php echo $caddressError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Home Country Address:</td>
                        <td style="text_align:left"><input type="text" id="haddress" name="haddress" maxlength="255" /><span class="error"><?php echo $haddressError;?></span></td>
                    </tr>
                    <tr>
                        <td style="text_align:right">Skill Migration - Point Test:</td>
                        <td style="text_align:left"><input type="button" id="point" name="point" /><span class="error"><?php echo $pointError;?></span></td>
                    </tr>
                </form>
            </table>
        </div>
    </body>
</html>