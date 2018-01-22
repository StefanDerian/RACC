<?php
include ('session.php');
include ('editAppt-backend.php');
include ('header2.php');
include ('editDate-backend.php');
include_once('notes-backend.php');
?>

<?php 

if(isset($_GET['user'])){
    include('secondary.php');
}else{

}


?>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript" src = "editAppt.js"></script>

<script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
  }
</script>




<div class="container">
    <?php include('message.php'); ?>


    <?php if(!isset($_GET['user'])){ ?>
    <div id="google_translate_element"></div>
    


    
    <a class = "btn btn-sm btn-primary" id="english-button" href = "#"> English</a>
    <a  class = "btn btn-sm btn-primary" id="chinese-button" href = "#">Chinese</a>

    <?php } ?>
    <div class="col-lg-12 well">

        <div class="row">
            <form method="post" name="form" action="<?php echo $action;?>">
                <input type="hidden" name="client" value="client" />
                <div class="<?php echo isset($_GET['user'])?'col-md-12': 'col-md-12';?>"  style="width:100%; margin-left: 180px; margin-right: auto;">
                    <h2 class="title2 translate" data-translate="personalInformation">Personal Information</h2>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label class = "translate" data-translate = "firstname">First Name</label>
                            <input placeholder = "As it is written in your passport" type="text" id = "fname" name = "fname" maxlength = "255" value = "<?php echo isset($fname)?$fname:"";  ?>" class="form-control">
                            <span class="error"><?php echo isset($fnameError)?$fnameError:"";?></span>
                        </div>


                        <div class="col-sm-4 form-group">
                            <label class = "translate" data-translate = "surname" >Surname</label>
                            <input placeholder = "As it is written in your passport" type="text" id="lname" name="lname" maxlength="255" value = "<?php echo isset($lname)?$lname:"";  ?>" class="form-control">
                            <span class="error"><?php echo isset($lnameError)?$lnameError:"";?>
                            </span>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-sm-4 form-group">
                            <label class = "translate" data-translate = "nationality">Nationality</label>
                            <input type="text" id="nationality" name="nationality" maxlength="255"  value = "<?php echo isset($nationality)?$nationality:"";  ?>" class="form-control">
                            <span class="error"><?php echo isset($nationalityError)?$nationalityError:"";?>
                            </span>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label class = "translate" data-translate = "dob">Date of Birth</label>
                            <input type="date" id = "dob" name="dob" value = "<?php echo isset($dob)?$dob:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                            <span class="error"><?php echo isset($dobError)?$dobError:"";?>
                            </span>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label class = "translate" data-translate = "mobile">Mobile Number</label>
                            <input type="text"  id="mobile" name="mobile" maxlength="45" value = "<?php echo isset($mobile)?$mobile:"";  ?>" class="form-control">
                            <span class="error"><?php echo isset($mobileError)?$mobileError:"";?></span>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label class = "translate" data-translate = "email">Email Address</label>
                            <input type="text"id="email" name="email" maxlength="255" value = "<?php echo isset($email)?$email:"";  ?>" class="form-control">
                            <span class="error"><?php echo isset($emailError)?$emailError:"";?>
                            </span>
                        </div>  
                    </div> 

                    <div class = "row">
                        <div class="col-sm-8 form-group">
                            <label class = "translate" data-translate = "caddress">Current Address</label>
                            <input type="text" class="form-control" id="caddress" name="caddress" maxlength="255" value = "<?php echo isset($caddress)?$caddress:"";  ?>">
                            <span class="error">
                                <?php echo isset($caddressError)?$caddressError:"";?>
                            </span>
                        </div>
                    </div>

                    <div class = "row">
                        <div class="col-sm-8 form-group">
                            <label class = "translate" data-translate = "haddress">Home Country Address</label>
                            <input type="text" class="form-control" id="haddress" name="haddress" maxlength="255" value = "<?php echo isset($haddress)?$haddress:"";  ?>">
                            <span class="error"><?php echo isset($haddressError)?$haddressError:"";?>
                            </span>
                        </div>
                    </div> 

                    <h2 class="title2" >Education Background</h2>
                    <h4><b class = "translate" data-translate = "CurrentHeading">Current Study</b></h4>
                    <div class = "row">
                       <div class="col-sm-4 form-group">
                        <label class = "translate" data-translate = "university">University</label>
                        <input type="text" class="form-control" id="uni" name="uni" maxlength="255" value = "<?php echo isset($uni)?$uni:"";  ?>">
                        <span class="error"><?php echo isset($uniError)?$uniError:"";?>
                        </span>
                    </div>      
                    <div class="col-sm-4 form-group">
                        <label class = "translate" data-translate = "ccam">Course and Major</label>
                        <input type="text" class="form-control" id="cam" name="cam" maxlength="255" value = "<?php echo isset($cam)?$cam:"";  ?>">
                        <span class="error"><?php echo isset($camError)?$camError:"";?>
                        </span>
                    </div>
                </div>

                <div class = "row">
                    <div class="col-sm-4 form-group">
                        <label class = "translate" data-translate = "ccomp">Estimated Completion Date</label>
                        <input type="date" id="comp" name="comp" value = "<?php echo isset($comp)?$comp:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                        <span class="error"><?php echo isset($compError)?$compError:"";?>
                        </span>
                    </div> 
                </div>

                <!-- Need modification part start -->
                <h4><b class = "translate" data-translate = "PrevHeading">Previous Study</b></h4>
                <div class = "row">
                   <div class="col-sm-4 form-group">
                    <label class = "translate" data-translate = "puni">University/ High School</label>
                    <input type="text" class="form-control" id="prevUni" name="prevUni" maxlength="255" value = "<?php echo isset($prevUni)?$prevUni:"";  ?>">
                    <span class="error"><?php echo isset($prevUniError)?$prevUniError:"";?>
                    </span>
                </div>      
                <div class="col-sm-4 form-group">
                    <label class = "translate" data-translate = "pcam">Course and Major</label>
                    <input type="text" class="form-control" id="prevStudy" name="prevStudy" maxlength="255" value = "<?php echo isset($prevStudy)?$prevStudy:"";  ?>">
                    <span class="error"><?php echo isset($prevStudyError)?$prevStudyError:"";?>
                    </span>
                </div>
            </div>

            <div class = "row">
                <div class="col-sm-4 form-group">
                    <label class = "translate" data-translate = "pcomp">Completion Date</label>
                    <input type="date" id="comp" name="prevComp" value = "<?php echo isset($prevComp)?$prevComp:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                    <span class="error"><?php echo isset($prevCompError)?$prevCompError:"";?>
                    </span>
                </div> 
            </div>
            <!-- Need modification part end -->
            <?php if(isset($_SESSION["userID"])){ ?>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <label>Due Date:</label>
                    <input type="date" id="duedate" name="duedate" value = "<?php echo isset($duedate)?$duedate:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <label class = "translate" data-translate = "service">Service needed:</label>
                    <select id="service" name="service" class = "form-control">
                        <option value= "migration" <?php echo isset($service)&&$service=="migration"?"selected":"" ?>>Migration</option>
                        <option value= "education" <?php echo isset($service)&&$service=="education"?"selected":"" ?>>Education</option>
                    </select>

                </div>
                <?php if(!isset($_SESSION['userID'])){?>
           <!--  <div class="row">


                <div class="col-sm-4 form-group">
                    <label>Where did you hear about us:</label>
                    <input type="text" class="form-control" id="know" name="know" maxlength="255" value = "<?php echo isset($know)?$know:"";  ?>">
                </span>
            </div> -->

            <!-- Need modification part start -->
            
            <!-- Need modification part end -->



            <!-- </div> -->
            <?php } ?>
            


            <div class="col-sm-4 form-group">
                <label class = "translate" data-translate = "know">Where did you hear about us:</label>
                <input type="text" class="form-control" id="know" name="know" maxlength="255" value = "<?php echo isset($know)?$know:"";  ?>">
                <span class="error"><?php echo isset($knowError)?$knowError:"";?>
                </span>
            </div>

            <!-- Need modification part start -->

            <!-- Need modification part end -->



        </div>
        <div class = "row">
           <div class="col-sm-4 form-group">
            <label class = "translate" data-translate = "visa">Current Visa:</label>
            <input class="form-control" type="text" id="visa" name="visa" maxlength="255" value = "<?php echo isset($visa)?$visa:"";  ?>"/>
            <span class="error"><?php echo isset($visaError)?$visaError:"";?></span>
        </div>
        <div class="col-sm-4 form-group">
            <label class = "translate" data-translate = "vexpiry">Visa Expiry Date:</label>
            <input class="form-control" type="date" id="vexpiry" name="vexpiry" value = "<?php echo isset($vexpiry)?$vexpiry:"";  ?>"/>
            <span class="error"><?php echo isset($vexpiryError)?$vexpiryError:"";?></span>
        </div>
    </div>
    <!-- this form only available when users are logged in -->
    <?php if(isset($_SESSION['userID'])){?>



    <div class = "row">
        <div class="col-sm-4 form-group">
         <label class = "translate" data-translate = "passport">Passport No.:</label>
         <input class="form-control" type="text" id="passport" name="passport" maxlength="255" value = "<?php echo isset($passport)?$passport:"";  ?>" />
         <span class="error"><?php echo isset($passportError)?$passportError:"";?></span>
     </div>
     <div class="col-sm-4 form-group">
        <label class = "translate" data-translate = "pexpiry">Passport Expiry Date:</label>
        <input class="form-control" type="date" id="pexpiry" name="pexpiry" value = "<?php echo isset($pexpiry)?$pexpiry:"";  ?>" />
        <span class="error"><?php echo isset($pexpiryError)?$pexpiryError:"";?></span>
    </div>
</div>




<?php } ?>
<!-- Need modification part start -->
<div class = "row">
    <div class="col-sm-4 form-group">
        <label class = "translate" data-translate = "wechat">Wechat:</label>
        <input placeholder = "leave it if you don't have one" class="form-control" type="text" id="wechat" name="wechat" value = "<?php echo isset($wechat)?$wechat:"";  ?>" />
    </div>
    <!-- Need modification part end -->
    <?php if(!isset($_SESSION['userID']) || $_SESSION['userType'] != "AGENT" ){?>
    <div class="col-sm-4 form-group">
        <label class = "translate" data-translate = "consultant">Consultant:</label>

        <select id="consultant" name="consultant" class = "form-control">
            <?php foreach($agents as $agent) { ?>
            <option value="<?php echo $agent["UserID"]; ?>" <?php echo isset($consultant)&&$consultant==$agent["UserID"]?"selected":"" ?>><?php echo $agent["DisplayName"]; ?></option>
            <?php } ?>
        </select>
    </div>             
    <?php } ?>
</div>

<?php if(isset($_SESSION['userID'])){?>
<div class="row">
    <div class="col-sm-4 form-group">
        <label>Status:</label>

        <select id="status" name="status" class = "form-control">

            <option value= "new client" <?php echo isset($status)&&$status=="new client"?"selected":"" ?>>new client</option>
            <option value= "on progress" <?php echo isset($status)&&$status=="on progress"?"selected":"" ?>> app on progress</option>
            <option value= "successfull" <?php echo isset($status)&&$status=="successfull"?"selected":"" ?>> Successfull</option>
            <!--  <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option> -->

        </select>
    </div>



</div>


<?php } ?>
</div>
<br>
<div class="row">
    <input type="submit" class="btn btn-primary btn-lg activ pull-left" id = "submit-button" name="submitBtn" style = "margin-left: 38%;" value="<?php echo isset($_GET['user'])?'Save':'Submit' ?>">

    <input type="submit" class="btn btn-danger btn-lg activ pull-left"  id = "cancel-button" name="submitBtn" style = "margin-left: 3%;"  value="Cancel">
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