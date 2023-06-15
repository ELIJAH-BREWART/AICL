
<html>
        <body style="background:#ADD8E6">
    <body>
   <center><img  src="img.png" alt="Nav" style="width:1500px height: 50px;margin-c:-200px;"><img  src="img.png" alt="Nav" style="width:850px height: 400px;margin-c:-200px;">
    <img src="TNEB.jpeg" alt="Nav" style="width:850px height: 400px;margin-c:-200px;">
    <img  src="img.png" alt="Nav" style="width:1500px height: 50px;margin-c:-200px;"><img  src="img.png" alt="Nav" style="width:850px height: 400px;margin-c:-200px;">
</center>
<form action="assignch.php" method="post" style="text-align:center">
    <h1>Account Created Successfully!!!<br></h1>
    <h3><a href="assignch.php">Welcome to TNEB </h3></a>
    <?php
    $user='root';
    $pass='';
    $dbserver="localhost";
    $dbname="eb";
    $dbconnect=mysqli_connect($dbserver,$user,$pass,$dbname);
    $dbquery="INSERT INTO `eb_bill`(`New_Username`, `New_Password`) VALUES ('".$_POST['newusername']."','".$_POST['newpass']."')";
    $dbconnect->query($dbquery);
    ?>
</body>
</html>
