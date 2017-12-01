<?php
include ('PointTest-backend.php')
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Point Test</title>
</head>
    
<body>
    <header>
        <div>
            <h1>Skilled Migration - Point Test</h1>
        </div>
    </header>
    
    <table width="100%" style="border-collapse:collapse" cellpadding="13">
        <form method="post">
            <tr>
                <th></th>
                <th>Skills</th>
                <th>Current Points</th>
                <th>Notes</th>
                <th>Goal Points</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Age</td>
                <td><input id="Cage" name="Cage" type="number" value="<?php echo $Cage;?>" onChange="calculateTotal();" /></td>
                <td>25-32 = 30 points;<br/>18-24 / 33-39 = 25 points;<br/>40-44 = 15 points</td>
                <td><input name="Gage" type="number" value="<?php echo $Gage;?>" /></td>
            </tr>
            <tr>
                <td>2</td>
                <td>English language (IELTS / PTE / OET / TOBBLiBT / CAE)</td>
                <td><input id="Cenglish" name="Cenglish" type="number" value="<?php echo $Cenglish;?>" onChange="calculateTotal();" /></td>
                <td>IELTS 6 / PTE 50 = 0 points;<br/>IELTS 7 / PTE 65 = 10 points;<br/>IELTS 8 / PTE 65 = 20 points</td>
                <td><input name="Genglish" type="number" value="<?php echo $Genglish;?>" /></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Work experience</td>
                <td><input name="Cwork" type="number" value="<?php echo $Cwork;?>" /></td>
                <td>Australia: 1 year = 5 points;<br/>Overseas: 3 years = 5 points</td>
                <td><input name="Gwork" type="number" value="<?php echo $Gwork;?>" /></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Qualification</td>
                <td><input name="Cqua" type="number" value="<?php echo $Cqua;?>" /></td>
                <td>Trade / Diploma = 10 points;<br/>Bachelor / Master = 15 points;<br/>PHD = 20 points</td>
                <td><input name="Gqua" type="number" value="<?php echo $Gqua;?>" /></td>
            </tr>
            <tr>
                <td>5</td>
                <td>2 Years full time study in Australia</td>
                <td><input name="Cstudy" type="number" value="<?php echo $Cstudy;?>" /></td>
                <td>5 points</td>
                <td><input name="Gstudy" type="number" value="<?php echo $Gstudy;?>" /></td>
            </tr>
            <tr>
                <td>6</td>
                <td>NAATI</td>
                <td><input name="Cnaati" type="number" value="<?php echo $Cnaati;?>" /></td>
                <td>5 points</td>
                <td><input name="gnaati" type="number" value="<?php echo $Gnaati;?>" /></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Partner skills</td>
                <td><input name="Cpartner" type="number" value="<?php echo $Cpartner;?>" /></td>
                <td>5 points</td>
                <td><input name="Gpartner" type="number" value="<?php echo $Gpartner;?>" /></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Professional Year (Accounting / IT / Engineering)</td>
                <td><input name="Cpy" type="number" value="<?php echo $Cpy;?>" /></td>
                <td>5 points</td>
                <td><input name="Gpy" type="number" value="<?php echo $Gpy;?>" /></td>
            </tr>
            <tr>
                <td>9</td>
                <td>State government sponsorship</td>
                <td><input name="Cstate" type="number" value="<?php echo $Cstate;?>" /></td>
                <td>5 points</td>
                <td><input name="Gstate" type="number" value="<?php echo $Gstate;?>" /></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Family sponsorship / regional Australia or Territory sponsorship</td>
                <td><input name="Cfamily" type="number" value="<?php echo $Cfamily;?>" /></td>
                <td>10 points</td>
                <td><input name="Gfamily" type="number" value="<?php echo $Gfamily;?>" /></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Study 2 years in Regional area</td>
                <td><input name="Carea" type="number" value="<?php echo $Carea;?>" /></td>
                <td>5 points</td>
                <td><input name="Garea" type="number" value="<?php echo $Garea;?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:right">Total</td>
                <td><input id="Csum" name="Csum" value="<?php $C=array('Cage', 'Cenglish', 'Cwork', 'Cqua', 'Cstudy', 'Cnaati', 'Cpartner', 'Cpy', 'Cstate', 'Cfamily', 'Carea'); echo array_sum($C);?>" /></td>
                <td></td>
                <td><input name="Gsum" value="<?php $G=array('Gage', 'Genglish', 'Gwork', 'Gqua', 'Gstudy', 'Gnaati', 'Gpartner', 'Gpy', 'Gstate', 'Gfamily', 'Garea'); echo array_sum($G);?>" />
                </td>
            </tr>
        </form>
    </table>
    
    <script type="text/javascript">
    
    function calculateTotal() {
        age = parseInt(document.getElementById("Cage").value);
        english = parseInt(document.getElementById("Cenglish").value);
        
        total = document.getElementById("Csum");
        
        calculatedValue = (age + english);
        total.value = calculatedValue;
        
    }
    </script>
</body>