<html>
    <head>
        <title>EB BILL CALCULATOR
</title>
</head>
<body style="background-color:#ADD8E6;text-align:center">
<img src="TNEB.jpeg">
<br>
<h3><b style="color:blue">
WELCOME
    <?php
    echo $_POST['name'];
        ?>
        </b>
        </h3>
<h1 style="text-align:center">
ELECTRICITY BILL CALCULATOR
</ins>
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
<div id="page-wrap">
<table class="center"> 
<form action="resultdom.php" method="post" id="quiz-form" style="text-align:center">
<tr>   
<td>
    <h1 style="color:#800000" >
    <label for="Previous units">
        PREVIOUS UNIT CONSUMED:
</label>
</h1>
</td>
<td>
 <input type="number" name=" previousunits" id="previousunits" placeholder="previous value" />
</td>
</tr>
<tr>
    <td>
<h1 style="color:#800000" >
    <label for="current units">
        CURRENT UNIT CONSUMED:
</label>
</h1>
</td>
<td>
<input type="number" name=" currentunits" id="currentunits" placeholder="current value" />
</td>
</tr>
<tr>
    <td>
<h1 style="color:#800000" >
    <label for="Start date">
    START DATE :
</label>
</h1>
</td>
<td>
<input type="date" name=" startdate" id="start date"  placeholder="dd-mm-yyyy"/>
</td>
</tr>
<tr>
    <td>
<h1 style="color:#800000" >
    <label for="end date">
    END DATE:
</label>
</h1>
</td>
<td>
<input type="date" name=" enddate" id="end date" placeholder="dd-mm-yyyy"/>
</td>
</tr>
<tr>
    <td>
<h1 style="color:#800000" >
    <label for="Sanction Load">
    ENERGY CALCULATION:
</label>
</h1>
</td>
<td>
<input type="number" name=" SanctionLoad" id="Sanction Load" />
</td>
</tr>
</table>
</br>
 <button type="submit" name="unit-submit" id="unit-submit"  style="color:red">
 CALCULATE
</button>
<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['pass'] = $_POST['pass'];
?>
</form>
</h1>
</div>
</body>
</html>
