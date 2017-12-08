<?php
include ('session.php');
include ('editAppt-backend.php');
include ('header.php');
include_once('notes-backend.php');
?>

<?php if(isset($_GET['msg'])){ ?>
<div class = "p-3 mb-2 bg-success text-white message">




    <?php echo $statusmsg; ?>

    

</div>

<?php } ?> 


<?php
if(isset($_SESSION['userID']) && isset($_GET['user'])){
    ?>
    <nav class="nav nav-tabs" id="myTab" role="tablist">
        <a href=<?php echo "editAppt.php?user=$id"; ?> class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" >Edit Data</a>
        <a href=<?php echo "PointTest.php?user=$id"; ?> class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Point Test</a>
    </nav>
    <?php } ?>


<!DOCTYPE html>
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href = "css/editAppt.css" type = "text/css" rel = "stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-lg-12 well">
    <h2 class="title2">Personal Information</h2>
    <div class="row">
        <form method="post" name="form" action="<?php echo $action;?>" onsubmit="return confirm('Do you really want to submit the form?');">
            <input type="hidden" name="client" value="client" />
            <div class="col-sm-12">
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
                        <input type="text" class="form-control">
                    </div>
                    <span class="error"><?php echo isset($pnameError)?$pnameError:"";?>
                    </span>
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
                        <input type="text"  id="mobile" name="mobile" maxlength="45" value = "<?php echo isset($mobile)?$mobile:"";  ?>" placeholder="Enter Your Phone Number Here.." class="form-control">
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
                <button type="button" class="btn btn-lg btn-info">Submit</button>                   
                </div>
            </form>
            <!-- Content below only available when users are logged in --> 
            <?php if(isset($_SESSION['userID'])){?>
            
            <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Current Visa Type</label>
                        <input type="text"  id="visa" name="visa" maxlength="255" value = "<?php echo isset($visa)?$visa:"";  ?>"  class="form-control">
                    </div>
                    <span class="error"><?php echo isset($visaError)?$visaError:"";?>
                    </span>    
                    <div class="col-sm-6 form-group">
                        <label>Visa Expiry Date</label>
                        <input type="text"id="email" name="email" maxlength="255" value = "<?php echo isset($email)?$email:"";  ?>" placeholder="Enter Your Email Address Here.." class="form-control">
                        <span class="error"><?php echo isset($emailError)?$emailError:"";?>
                        </span>
                    </div>  
                </div>
            </div>





        </div>
    </div>
</div>
</body>
</html>