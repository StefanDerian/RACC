<?php
include('t2-backend.php');
include('session.php');
include ('header.php');
?>



<p> <?php echo $statusmsg; ?>
	<table width="100%" style="border-collapse:collapse" cellpadding="5">
		<form method="post" id="Form" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h2 class="pageheadding">Please fill in this form<br /></h2><tr>
				<td width="50%" style="text-align:right">First Name:</td>
				<td style="text-align:left"><input type="text" name="first"	maxlength="255" value="<?php echo $first; ?>" /> <span class="error">* <?php echo $firstErr;?></span></td>
			</tr>
			<tr>
				<td style="text-align:right">Last Name:</td>
				<td style="text-align:left"><input type="text" name="last"	maxlength="45" value="" /> <span class="error">* <?php echo $lastErr;?></span></td>
			</tr>
            <tr>
                <td style="text-align:right">Prefer Name:</td>
                <td style="text-align:left"><input type="text" name="prefer"	maxlength="45" value="" /></td>
            </tr>
            <tr>
                <td style="text-align:right">Date of Birth:</td>
                <td style="text-align:left"><input type="date" name="dob"	maxlength="45" value="" /> <span class="error">* <?php echo $dobErr;?></span></td>
            </tr>
            <tr>
                <td style="text-align:right">Nationality:</td>
                <td style="text-align:left"><input type="text" name="nationality"	maxlength="45" value="" /> <span class="error">* <?php echo $nationalityErr;?></span></td>
            </tr>
            <tr>
                <td style="text-align:right">Gender:</td>
                <td style="text-align:left"><input type="radio" id="male" name="gender"	maxlength="45" value="Male" />Male <input type="radio" id="female" name="gender"	maxlength="45" value="Female" />Female <span class="error">* <?php echo $genderErr;?></span></td>
            </tr>
            <tr>
                <td style="text-align:right">Mobile:</td>
                <td style="text-align:left"><input type="number" name="mobile"	maxlength="45" value="" /> <span class="error">* <?php echo $mobileErr;?></span></td>
            </tr>
            <tr>
                <td style="text-align:right">Email:</td>
                <td style="text-align:left"><input type="email" name="email"	maxlength="45" value="" /> <span class="error">* <?php echo $emailErr;?></span></td>
            </tr>
            <tr>
                <td style="text-align:right">Who are you going to meet today:</td>
                <td style="text-align:left">
                    
                    <select id="who" name="who">
                        <?php foreach($agents as $agent) { ?>
                        <option value="<?php echo $agent["UserID"]; ?>"><?php echo $agent["DisplayName"]; ?></option>
                        <?php } ?>
                        
                    <!--<select id="who" name="who">
                        <option value="">Select</option>
                        <option value="micheal">Micheal Moeidjiantho</option>
                        <option value="angela">Angela Vo</option>
                        <option value="jewel">Jelwel Wang</option>
                        <option value="elaine">Elaine Yu</option>
                        <option value="queenie">Queenie Liu</option>
                        <option value="jenny">Jenny</option>
                        <option value="martin">Martin Lai</option>
                        <option value="lucas">Lucas Pham</option>
                        <option value="marinor">Marinor Felipe</option>
                    </select><span class="error">* <?php //echo $whoErr;?></span>--></td>
                </tr>
                <tr><td /></tr>
                <tr>
                    <td style="text-align:center" colspan="2"><input type="submit" name="submit" value="Submit"/>
                       <input type="button" onclick="return resetForm(this.form);" name="reset" value="Reset" />
                       <br/><span class="error"> <?php echo "<br />*fields are mandatory";?></span></td>
                   </tr>
               </form>
           </table>
           <br />

           <script type="text/javascript">
            function resetForm(form) {
    // clearing inputs
    var inputs = form.getElementsByTagName('input');
    for (var i = 0; i<inputs.length; i++) {
        switch (inputs[i].type) {
            // case 'hidden':
            case 'text':
            inputs[i].value = '';
            break;
            case 'radio':
            case 'checkbox':
            inputs[i].checked = false;   
        }
    }

    // clearing selects
    var selects = form.getElementsByTagName('select');
    for (var i = 0; i<selects.length; i++)
        selects[i].selectedIndex = 0;

    // clearing textarea
    var text= form.getElementsByTagName('textarea');
    for (var i = 0; i<text.length; i++)
        text[i].innerHTML= '';

    return false;
}
</script>