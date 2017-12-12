<?php
include ('session.php');
include ('editAppt-backend.php');
include ('header.php');
include ('editDate-backend.php');
include_once('notes-backend.php');
?>

<?php if(isset($_GET['msg'])){ ?>
<div class = "alert <?php echo $_GET['flag']==1?'alert-success':'alert-danger';?>">
    <?php echo $_GET['msg']; ?>
</div>

<?php } ?> 
<?php if(!empty($statusmsg)){ ?>
<div class = "alert <?php echo $statusFlag==1?'alert-success':'alert-danger';?>">
    <?php echo $statusmsg; ?>
</div>

<?php } ?> 


<?php if(isset($_SESSION['userID']) && isset($_GET['user'])){
    ?>
    <nav class="navbar navbar-inverse">
      <div class="container">

          <ul class="nav navbar-nav">
             <li class = "active">
                <a href=<?php echo "editAppt.php?user=$id"; ?>   >Edit Data</a>
            </li>
            <li >
             <a href=<?php echo "PointTest.php?user=$id"; ?>  >Point Test</a>
         </li>
     </ul>
 </div>
</nav>
<!-- <div class="btn-group">
    <li class = "active">
        <a href=<?php echo 'editAppt.php?user=$id'; ?> class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" >Edit Data</a>
    </li>
    <li >
       <a href=<?php echo "PointTest.php?user=$id"; ?> class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Point Test</a>
   </li>
</div> -->
<?php } ?>


<!--     <!DOCTYPE html>
    <head>
      <title>Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href = "css/editAppt.css" type = "text/css" rel = "stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body> -->

    <div class="container">
        <div class="col-lg-12 well">
            <h2 class="title2">Personal Information</h2>
            <div class="row">
                <form method="post" name="form" action="<?php echo $action;?>" >
                    <input type="hidden" name="client" value="client" />
                    <div class="<?php echo isset($_GET['user'])?'col-md-5': 'col-md-12';?>">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input type="text" id = "fname" name = "fname" maxlength = "255" value = "<?php echo isset($fname)?$fname:"";  ?>" class="form-control">
                            </div>
                            <span class="error"><?php echo isset($fnameError)?$fnameError:"";?>
                            </span>

                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input type="text" id="lname" name="lname" maxlength="255" value = "<?php echo isset($lname)?$lname:"";  ?>" class="form-control">
                            </div>
                            <span class="error"><?php echo isset($lnameError)?$lnameError:"";?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Prefer Name</label>
                                <input type="text" class="form-control"  name="pname" value = "<?php echo isset($lname)?$lname:"";?>">
                            </div>
                            <span class="error"><?php echo isset($pnameError)?$pnameError:"";?>
                            </span>
                        </div>
                        <div class="radio col-sm-6 form-group">
                            <label>Gender:</label>
                            <label>
                                <input type="radio" id="male" name="gender" maxlength="45" value="Male" <?php echo isset($gender)&&$gender=="Male"?"checked":"";?>/>Male 
                            </label>
                            <label>
                                <input type="radio" id="female" name="gender"    maxlength="45" value="Female" <?php echo isset($gender)&&$gender=="Female"?"checked":"";?>/>Female 
                            </label>
                            <span class="error"><?php echo isset($genderError)?$genderError:"";?></span>
                        </div>                   
                        <div class="row"> 
                            <div class="col-sm-6 form-group">
                                <label>Nationality</label>
                                <input type="text" id="nationality" name="nationality" maxlength="255"  value = "<?php echo isset($nationality)?$nationality:"";  ?>" class="form-control">
                                <span class="error"><?php echo isset($nationalityError)?$nationalityError:"";?>
                                </span>
                            </div>       
                        </div>
                        <div class="row"> 
                            <div class="col-sm-6 form-group">
                                <label>Date of Birth</label>
                                <input type="date" id = "dob" name="dob" value = "<?php echo isset($dob)?$dob:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                                <span class="error"><?php echo isset($dobError)?$dobError:"";?>
                                </span>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Phone Number</label>
                                <input type="text"  id="mobile" name="mobile" maxlength="45" value = "<?php echo isset($mobile)?$mobile:"";  ?>" class="form-control">
                            </div>
                            <span class="error"><?php echo isset($mobileError)?$mobileError:"";?>
                            </span>     
                            <div class="col-sm-6 form-group">
                                <label>Email Address</label>
                                <input type="text"id="email" name="email" maxlength="255" value = "<?php echo isset($email)?$email:"";  ?>" class="form-control">
                                <span class="error"><?php echo isset($emailError)?$emailError:"";?>
                                </span>
                            </div>  
                        </div>  

                        <div class="form-group">
                            <label>Current Address</label>
                            <input type="text" class="form-control" id="caddress" name="caddress" maxlength="255" value = "<?php echo isset($caddress)?$caddress:"";  ?>">
                            <span class="error"><?php echo isset($caddressError)?$caddressError:"";?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Home Country Address</label>
                            <input type="text" class="form-control" id="haddress" name="haddress" maxlength="255" value = "<?php echo isset($haddress)?$haddress:"";  ?>">
                            <span class="error"><?php echo isset($haddressError)?$haddressError:"";?>
                            </span>
                        </div>
                        <h2 class="title2">Education Background</h2>

                        <div class="form-group">
                            <label>University</label>
                            <input type="text" class="form-control" id="uni" name="uni" maxlength="255" value = "<?php echo isset($uni)?$uni:"";  ?>">
                            <span class="error"><?php echo isset($uniError)?$uniError:"";?>
                            </span>
                        </div>      
                        <div class="form-group">
                            <label>Course and Major</label>
                            <input type="text" class="form-control" id="cam" name="cam" maxlength="255" value = "<?php echo isset($cam)?$cam:"";  ?>">
                            <span class="error"><?php echo isset($camError)?$camError:"";?>
                            </span>

                        </div>  
                        <div class="form-group">
                            <label>Completion Date</label>
                            <input type="date" id="comp" name="comp" value = "<?php echo isset($comp)?$comp:"";  ?>" placeholder="dd/mm/yyyy" class="form-control">
                            <span class="error"><?php echo isset($compError)?$compError:"";?>
                            </span>
                        </div>

                        <!-- this form only available when users are logged in -->
                        <?php if(isset($_SESSION['userID'])){?>
                        <div class="form-group">
                            <label>Current Visa:</label>
                            <input class="form-control" type="text" id="visa" name="visa" maxlength="255" value = "<?php echo isset($visa)?$visa:"";  ?>"/>
                            <span class="error"><?php echo isset($visaError)?$visaError:"";?></span>
                        </div>
                        <div class="form-group">
                            <label>Visa Expiry Date:</label>
                            <input class="form-control" type="date" id="vexpiry" name="vexpiry" value = "<?php echo isset($vexpiry)?$vexpiry:"";  ?>"/>
                            <span class="error"><?php echo isset($vexpiryError)?$vexpiryError:"";?></span>
                        </div>
                        <div class="form-group">
                         <label>Passport No.:</label>
                         <input class="form-control" type="text" id="passport" name="passport" maxlength="255" value = "<?php echo isset($passport)?$passport:"";  ?>" />
                         <span class="error"><?php echo isset($passportError)?$passportError:"";?></span>
                     </div>
                     <div class="form-group">
                        <label>Passport Expiry Date:</label>
                        <input class="form-control" type="date" id="pexpiry" name="pexpiry" value = "<?php echo isset($pexpiry)?$pexpiry:"";  ?>" />
                        <span class="error"><?php echo isset($pexpiryError)?$pexpiryError:"";?></span>
                    </div>


                    <?php } ?>

                    <?php if(isset($_SESSION['userID'])){?>
                    
                    
                    <div class="form-group">
                        <label>Status:</label>

                        <select id="status" name="status" class = "form-control">

                            <option value= "not even in progress" <?php echo isset($status)&&$status=="not even in progress"?"selected":"" ?>>Not even in progress</option>
                            <option value= "contacted" <?php echo isset($status)&&$status=="contacted"?"selected":"" ?>>Not even in progress</option>
                            <option value= "on progress" <?php echo isset($status)&&$status=="on progress"?"selected":"" ?>> on progress</option>
                            <option value= "successfull" <?php echo isset($status)&&$status=="successfull"?"selected":"" ?>> Successfull</option>
                            <option value= "cancelled/failed" <?php echo isset($status)&&$status=="cancelled/failed"?"selected":"" ?>> Cancelled/Failed</option>

                        </select>
                    </div>

                    <?php } ?>

                    <div class="form-group">
                        <label>Consultant:</label>
                        
                        <select id="consultant" name="consultant" class = "form-control">
                            <?php foreach($agents as $agent) { ?>
                            <option value="<?php echo $agent["UserID"]; ?>" <?php echo isset($consultant)&&$consultant==$agent["UserID"]?"selected":"" ?>><?php echo $agent["DisplayName"]; ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>
                </form>
                <input type="submit" class="btn btn-lg btn-info" value=" submit">   


                <?php 
                if(isset($_SESSION['userID']) && isset($_GET['user'])){
                    $url = $_SERVER['PHP_SELF'];
                    new editDate($id, "$url?user=$id");
                } 
                ?>               
            </div>

            <?php if(isset($_SESSION['userID']) && isset($_GET['user']) ){?>
            <div class = "col-md-7">



                <?php 

                $noter = new Note($_GET['user']);
                $noter->displayNotes();
                ?>


            </div>
            <?php } ?>



        </div>
    </div>
</body>
</html>