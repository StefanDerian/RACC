<?php
include ('session.php');
include ('editAppt-backend.php');
include ('header.php');
include ('editDate-backend.php');
include_once('notes-backend.php');
?>

<?php include('secondary.php'); ?>


<?php if(!empty($statusmsg)){ ?>
<div class = "alert <?php echo $statusFlag==1?'alert-success':'alert-danger';?>">
    <?php echo $statusmsg; ?>
</div>

<?php } ?> 
<div class="container">
    <div class="col-lg-12 well">
        <div class="row">
            <form method="post" name="form" action="<?php echo $action;?>">
                <input type="hidden" name="client" value="client" />
                <div class="<?php echo isset($_GET['user'])?'col-md-12': 'col-md-12';?>"  style="width:100%; margin-left: 180px; margin-right: auto;">
                    <h2 class="title2">Personal Information</h2>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>First Name</label>
                            <input type="text" id = "fname" name = "fname" maxlength = "255" value = "<?php echo isset($fname)?$fname:"";  ?>" class="form-control">
                            <span class="error"><?php echo isset($fnameError)?$fnameError:"";?></span>
                        </div>


                        <div class="col-sm-4 form-group">
                            <label>Last Name</label>
                            <input type="text" id="lname" name="lname" maxlength="255" value = "<?php echo isset($lname)?$lname:"";  ?>" class="form-control">
                            <span class="error"><?php echo isset($lnameError)?$lnameError:"";?>
                            </span>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-sm-3 form-group">
                            <label>Gender:</label>
                            <label class = "maleRadio" style="font-weight: 100">
                                <input type="radio" name="gender" maxlength="45" value="Male" <?php echo isset($gender)&&$gender=="Male"?"checked":"";?>/>Male 
                            </label>
                            <label class = "femaleRadio" style="font-weight: 100">
                                <input type="radio" id="female" name="gender"    maxlength="45" value="Female" <?php echo isset($gender)&&$gender=="Female"?"checked":"";?>/>Female 
                            </label>
                            <div class>
                                <span class="error"><?php echo isset($genderError)?$genderError:"";?></span>
                            </div>

                        </div>
                    </div>
                            <!-- <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Prefer Name</label>
                                    <input type="text" class="form-control"  name="pname" value = "<?php echo isset($lname)?$lname:"";?>">
                                </div>
                                <span class="error"><?php echo isset($pnameError)?$pnameError:"";?>
                                </span>
                            </div> -->

                            <div class="row"> 
                                <div class="col-sm-4 form-group">
                                    <label>Nationality</label>
                                    <input type="text" id="nationality" name="nationality" maxlength="255"  value = "<?php echo isset($nationality)?$nationality:"";  ?>" class="form-control">
                                    <span class="error"><?php echo isset($nationalityError)?$nationalityError:"";?>
                                    </span>
                                </div>

                                <div class="col-sm-4 form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" id = "dob" name="dob" value = "<?php echo isset($dob)?$dob:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                                    <span class="error"><?php echo isset($dobError)?$dobError:"";?>
                                    </span>
                                </div> 
                            </div>

                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Mobile Number</label>
                                    <input type="text"  id="mobile" name="mobile" maxlength="45" value = "<?php echo isset($mobile)?$mobile:"";  ?>" class="form-control">
                                    <span class="error"><?php echo isset($mobileError)?$mobileError:"";?></span>
                                </div>

                                <div class="col-sm-4 form-group">
                                    <label>Email Address</label>
                                    <input type="text"id="email" name="email" maxlength="255" value = "<?php echo isset($email)?$email:"";  ?>" class="form-control">
                                    <span class="error"><?php echo isset($emailError)?$emailError:"";?>
                                    </span>
                                </div>  
                            </div> 

                            <div class = "row">
                                <div class="col-sm-8 form-group">
                                    <label>Current Address</label>
                                    <input type="text" class="form-control" id="caddress" name="caddress" maxlength="255" value = "<?php echo isset($caddress)?$caddress:"";  ?>">
                                    <span class="error">
                                        <?php echo isset($caddressError)?$caddressError:"";?>
                                    </span>
                                </div>
                            </div>

                            <div class = "row">
                                <div class="col-sm-8 form-group">
                                    <label>Home Country Address</label>
                                    <input type="text" class="form-control" id="haddress" name="haddress" maxlength="255" value = "<?php echo isset($haddress)?$haddress:"";  ?>">
                                    <span class="error"><?php echo isset($haddressError)?$haddressError:"";?>
                                    </span>
                                </div>
                            </div> 

                            <h2 class="title2">Education Background</h2>

                            <div class = "row">
                               <div class="col-sm-4 form-group">
                                <label>University</label>
                                <input type="text" class="form-control" id="uni" name="uni" maxlength="255" value = "<?php echo isset($uni)?$uni:"";  ?>">
                                <span class="error"><?php echo isset($uniError)?$uniError:"";?>
                                </span>
                            </div>      
                            <div class="col-sm-4 form-group">
                                <label>Course and Major</label>
                                <input type="text" class="form-control" id="cam" name="cam" maxlength="255" value = "<?php echo isset($cam)?$cam:"";  ?>">
                                <span class="error"><?php echo isset($camError)?$camError:"";?>
                                </span>
                            </div>
                        </div>

                        <div class = "row">
                            <div class="col-sm-4 form-group">
                                <label>Estimated Completion Date</label>
                                <input type="date" id="comp" name="comp" value = "<?php echo isset($comp)?$comp:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                                <span class="error"><?php echo isset($compError)?$compError:"";?>
                                </span>
                            </div> 
                        </div>


                        <!-- this form only available when users are logged in -->
                        <?php if(isset($_SESSION['userID'])){?>

                        <div class = "row">
                           <div class="col-sm-4 form-group">
                            <label>Current Visa:</label>
                            <input class="form-control" type="text" id="visa" name="visa" maxlength="255" value = "<?php echo isset($visa)?$visa:"";  ?>"/>
                            <span class="error"><?php echo isset($visaError)?$visaError:"";?></span>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Visa Expiry Date:</label>
                            <input class="form-control" type="date" id="vexpiry" name="vexpiry" value = "<?php echo isset($vexpiry)?$vexpiry:"";  ?>"/>
                            <span class="error"><?php echo isset($vexpiryError)?$vexpiryError:"";?></span>
                        </div>
                    </div>

                    <div class = "row">
                        <div class="col-sm-4 form-group">
                         <label>Passport No.:</label>
                         <input class="form-control" type="text" id="passport" name="passport" maxlength="255" value = "<?php echo isset($passport)?$passport:"";  ?>" />
                         <span class="error"><?php echo isset($passportError)?$passportError:"";?></span>
                     </div>
                     <div class="col-sm-4 form-group">
                        <label>Passport Expiry Date:</label>
                        <input class="form-control" type="date" id="pexpiry" name="pexpiry" value = "<?php echo isset($pexpiry)?$pexpiry:"";  ?>" />
                        <span class="error"><?php echo isset($pexpiryError)?$pexpiryError:"";?></span>
                    </div>
                </div>




                <?php } ?>
                <div class = "row">
                   <?php if(!isset($_SESSION['userID']) || $_SESSION['userType'] != "AGENT" ){?>
                   <div class="col-sm-4 form-group">
                    <label>Consultant:</label>

                    <select id="consultant" name="consultant" class = "form-control">
                        <option value = "0"> Have not chosen </option>
                        <?php foreach($agents as $agent) { ?>
                        <option value="<?php echo $agent["UserID"]; ?>" <?php echo isset($consultant)&&$consultant==$agent["UserID"]?"selected":"" ?>><?php echo $agent["DisplayName"]; ?></option>
                        <?php } ?>
                    </select>

                </div>
                
                <?php } ?>

                <?php if(isset($_SESSION['userID'])){?>
                <div class="col-sm-4 form-group">
                    <label>Status:</label>

                    <select id="status" name="status" class = "form-control">

                        <option value= "new client" <?php echo isset($status)&&$status=="new client"?"selected":"" ?>>new client</option>
                        <option value= "on progress" <?php echo isset($status)&&$status=="on progress"?"selected":"" ?>> app on progress</option>
                        <option value= "successfull" <?php echo isset($status)&&$status=="successfull"?"selected":"" ?>> Successfull</option>
                        <!--  <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option> -->

                    </select>
                </div>

                <?php } ?>
            </div>
            <br>
            <div class="row">
                <!-- <div align="center"> -->
                    <input type="submit" class="btn btn-primary btn-lg activ pull-left" style = "margin-left: 28%;" value=" Submit">
                    <!--  </div> -->
                </div>

            </form>
        </div>




    </div>



<br>

    <div class = "row">
       <div class = "col-md-12" style="width: 760px; margin-left: 180px">
        <?php if(isset($_SESSION['userID']) && isset($_GET['user']) ){?>
        <?php 

        $noter = new Note($_GET['user']);
        $noter->displayNotes();
        ?>
    </div>
</div>

<?php } ?>



</div>
</div>
</body>
</html>