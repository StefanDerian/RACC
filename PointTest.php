<?php
include('session.php');
include ('PointTest-backend.php');

include ('header.php');
?>


<?php if(!empty($msg)){ ?>
<div class = "p-3 mb-2 bg-success text-white message">




    <?php echo $msg; ?>

    

</div>
<?php } ?>


<?php if(isset($_SESSION['userID']) && isset($_GET['user'])){
    ?>
    <nav class="nav nav-tabs" id="myTab" role="tablist">
        <a href=<?php echo "editAppt.php?user=$id"; ?> class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" >Edit Data</a>
        <a href=<?php echo "PointTest.php?user=$id"; ?> class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Point Test</a>
    </nav>
    <?php } ?>

    <table width="100%" style="border-collapse:collapse" cellpadding="13">
        <form method="post">
            <tr>
                <th></th>
                <th>Skills</th>
                <th>Current Points</th>
                <th>Notes</th>
                <th>Goal Points</th>
            </tr>


            <?php foreach ($forms as $key => $value) {?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><input id="Cage" name="<?php echo $key.'[current]';?>" type="number" value="<?php echo $formValue[$key]['current'];?>"/></td>
                <td><?php echo $value['note']; ?></td>
                <td><input name="<?php echo $key.'[goal]'; ?>" type="number" value="<?php echo $formValue[$key]['goal'];?>" /></td>
                <td><input name="<?php echo $key.'[id]'; ?>" type="hidden" value=<?php echo $value['id']; ?> /></td>
            </tr>



            <?php } ?>

           <!--  <tr>
                <td>1</td>
                <td>Age</td>
                <td><input id="Cage" name="Age[current]" type="number" value="<?php echo $Age['current'];?>"/></td>
                <td>25-32 = 30 points;<br/>18-24 / 33-39 = 25 points;<br/>40-44 = 15 points</td>
                <td><input name="Age[goal]" type="number" value="<?php echo $formValue['Age']['goal'];?>" /></td>
                <td><input name="Age[id]" type="hidden" value="1" /></td>
            </tr>
            <tr>
                <td>2</td>
                <td>English language (IELTS / PTE / OET / TOBBLiBT / CAE)</td>
                <td><input id="Cenglish" name="English[current]" type="number" value="<?php echo $English['current'];?>"/></td>
                <td>IELTS 6 / PTE 50 = 0 points;<br/>IELTS 7 / PTE 65 = 10 points;<br/>IELTS 8 / PTE 65 = 20 points</td>
                <td><input name="English[goal]" type="number" value="<?php echo $English['goal'];?>" /></td>
                <td><input name="English[id]" type="hidden" value="2" /></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Work experience</td>
                <td><input name="Work[current]" type="number" value="<?php echo $Work['current'];?>" /></td>
                <td>Australia: 1 year = 5 points;<br/>Overseas: 3 years = 5 points</td>
                <td><input name="Work[goal]" type="number" value="<?php echo $Work['goal'];?>" /></td>
                <td><input name="Work[id]" type="hidden" value="3" /></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Qualification</td>
                <td><input name="qua[current]" type="number" value="<?php echo $qua['current'];?>" /></td>
                <td>Trade / Diploma = 10 points;<br/>Bachelor / Master = 15 points;<br/>PHD = 20 points</td>
                <td><input name="qua[goal]" type="number" value="<?php echo $qua['goal'];?>" /></td>
                <td><input name="qua[id]" type="hidden" value="4" /></td>
            </tr>
            <tr>
                <td>5</td>
                <td>2 Years full time study in Australia</td>
                <td><input name="study[current]" type="number" value="<?php echo $study['current'];?>" /></td>
                <td>5 points</td>
                <td><input name="study[goal]" type="number" value="<?php echo $study['goal'];?>" /></td>
                <td><input name="study[id]" type="hidden" value="5" /></td>
            </tr>
            <tr>
                <td>6</td>
                <td>NAATI</td>
                <td><input name="naati[current]" type="number" value="<?php echo $naati['current'];?>" /></td>
                <td>5 points</td>
                <td><input name="naati[goal]" type="number" value="<?php echo $naati['goal'];?>" /></td>
                <td><input name="naati[id]" type="hidden" value="6" /></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Partner skills</td>
                <td><input name="partner[current]" type="number" value="<?php echo $partner['current'];?>" /></td>
                <td>5 points</td>
                <td><input name="partner[goal]" type="number" value="<?php echo $partner['goal'];?>" /></td>
                <td><input name="partner[id]" type="hidden" value="7" /></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Professional Year (Accounting / IT / Engineering)</td>
                <td><input name="py[current]" type="number" value="<?php echo $py['current'];?>" /></td>
                <td>5 points</td>
                <td><input name="py[goal]" type="number" value="<?php echo $py['goal'];?>" /></td>
                <td><input name="py[id]" type="hidden" value="8" /></td>
            </tr>
            <tr>
                <td>9</td>
                <td>State government sponsorship</td>
                <td><input name="state[current]" type="number" value="<?php echo $state['current'];?>" /></td>
                <td>5 points</td>
                <td><input name="state[goal]" type="number" value="<?php echo $state['goal'];?>" /></td>
                <td><input name="state[id]" type="hidden" value="9" /></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Family sponsorship / regional Australia or Territory sponsorship</td>
                <td><input name="family[current]" type="number" value="<?php echo $family['current'];?>" /></td>
                <td>10 points</td>
                <td><input name="family[goal]" type="number" value="<?php echo $family['goal'];?>" /></td>
                <td><input name="family[id]" type="hidden" value="10" /></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Study 2 years in Regional area</td>
                <td><input name="area[current]" type="number" value="<?php echo $area['current'];?>" /></td>
                <td>5 points</td>
                <td><input name="area[goal]" type="number" value="<?php echo $area['goal'];?>" /></td>
                <td><input name="area[id]" type="hidden" value="11" /></td>
            </tr> -->
            <tr>
                <td></td>
                <td style="text-align:right">Total</td>
                <td>
                    <?php echo isset($totals['current'])?$totals['current']:"0";?>
                </td>
                <td> 
                    Total Goal
                </td>
                <td>
                    <?php echo isset($totals['goal'])?$totals['goal']:"0";?> 
                </td>
            </tr>
            <tr>
                <td>
                    <input type = "submit" value = "submit" class = "btn btn-lg btn-primary pull-right">
                </td>
            </tr>
        </form>
    </table>

    <!-- <script type="text/javascript">

        function calculateTotal() {
            age = parseInt(document.getElementById("Cage").value);
            english = parseInt(document.getElementById("Cenglish").value);

            total = document.getElementById("Csum");

            calculatedValue = (age + english);
            total.value = calculatedValue;

        }
    </script> -->
</body>