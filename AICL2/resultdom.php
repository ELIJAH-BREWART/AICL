<html>
    <body style="background-color:#ADD8E6">
    <img src="TNEB.jpeg">
    <h1 style="color:#800000" >
    <label for="Previous units">
        PREVIOUS UNIT CONSUMED:
</label>
<?php
echo $_POST['previousunits'];
?>
</h1>
<h1 style="color:#800000" >
    <label for="Previous units">
       CURRENT UNIT CONSUMED:
</label>
<?php
echo $_POST['currentunits'];
?>
</h1>
<h1 style="color:#800000" >
    <label for="Previous units">
        UNIT CONSUMED:
</label>
<?php
 $pre_unit = $_POST['previousunits'];
 $cur_unit = $_POST['currentunits'];
 $cons_unit=$pre_unit-$cur_unit;
 echo $cons_unit
?>
</h1>
<h1 style="color:#800000" >
    <label for="Previous units">
        START DATE:
</label>
<?php
  echo $_POST['startdate'];
?>
</h1>
<h1 style="color:#800000" >
    <label for="Previous units">
        END DATE:
</label>
<?php
  echo $_POST['enddate'];
?>
</h1>
<h1 style="color:#800000" >
    <label for="Previous units">
        SANCTION LOAD:
</label>
<?php
  echo $_POST['SanctionLoad'];
?>
</h1>
<?php
    $result_str = $result = '';
    if (isset($_POST['unit-submit'])) {
        $pre_unit = $_POST['previousunits'];
        $cur_unit = $_POST['currentunits'];
        $cons_unit=$pre_unit-$cur_unit;
        if (!empty($cons_unit)) {
            $result = calculate_bill($cons_unit);
            $result_str = 'Total amount of ' . $cons_unit . ' - ' . $result;
        }
    }
function calculate_bill($cons_unit)
 {
    $ur1 = 4.50;
    $ur2 = 6.00;
    $ur3 = 8.00;
    $ur4 = 9.00;
    $ur5 = 10.00;
    $ur6 = 11.00;
    $fcr = 0;
    $tr=5;
$sl = 2;
    if($cons_unit <= 100) {
        $ed = 0;
    }
    else if($cons_unit> 100 && $cons_unit <= 400) {
        $ec=$cons_unit*$ur1;
    $fc=$sl*$fcr;
    $ed=($ec+$fc)*$tr/100;
    }
    else if($cons_unit > 400 && $cons_unit <= 500) {
        $ec=$cons_unit*$ur2;
    $fc=$sl*$fcr;
    $ed=($ec+$fc)*$tr/100;
    }
    else if($cons_unit > 500 && $cons_unit <= 600) {
        $ec=$cons_unit*$ur3;
    $fc=$sl*$fcr;
    $ed=($ec+$fc)*$tr/100;
    }
    else if($cons_unit > 600 && $cons_unit <= 800) {
        $ec=$cons_unit*$ur4;
    $fc=$sl*$fcr;
    $ed=($ec+$fc)*$tr/100;
    }
    else if($cons_unit> 800 && $cons_unit <= 1000) {
        $ec=$cons_unit*$ur5;
    $fc=$sl*$fcr;
    $ed=($ec+$fc)*$tr/100;
    }
    else {
        $ec=$cons_unit*$ur6;
       $fc=$sl*$fcr;
      $ed=($ec+$fc)*$tr/100;
    }
    return number_format((float)$ed, 2, '.', '');
}
?>
<a href="webpage.html">
<h1 style="color:#800000;text-align:center" >
    <label for="Previous units">
       THE BILL AMOUNT IS:
</label>
<?php
  echo $result;
?>
</h1>
</a>
<h1 style="color:#800000;text-align:center">
<?php
if($result<1000)
echo "DOMESTIC CATEGORY";
else
echo "COMMERCIAL CATEGORY";
?>
</h1>
<?php
session_start();
$user='root';
$pass='';
$dbserver='localhost';
$dbname='eb';
$dbconnect=mysqli_connect($dbserver,$user,$pass,$dbname);
$dbquery1="UPDATE `eb_bill` SET `PREVIOUS_UNIT`='".$_POST['previousunits']."',`CURRENT_UNIT`='".$_POST['currentunits']."',`START_DATE`='".$_POST['startdate']."',`END_DATE`='".$_POST['enddate']."',`ENERGY`='".$_POST['SanctionLoad']."',`TOTAL_AMOUNT`='$result' WHERE `USERNAME`='".$_SESSION['name'] ."'";
$dbconnect->query($dbquery1);
?>
</body>
</html>
