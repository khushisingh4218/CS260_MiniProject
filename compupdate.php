<html>
<head>



</head>
<body>


<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass="mysql_pass_23";
$dbname = "tpc";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//$email = $_SESSION["user_email_delete"];
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   } 

$ccode = $_SESSION["id"];

$sql = "select * from companies where ccode = '$ccode'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?> 


<h1> Welcome!</h1>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post">
    
    Company name:
    <input type = "text" value = '<?php echo $row["cname"]?>' name = "cname" required>
    <br> 
    Minimum cpi required:
    <input type = "number" value = '<?php echo $row["min_cpi"]?>' name = "min_cpi" required>
    <br>
    Minimum semester to reach: 
    <input type = "number" value = <?php echo $row["min_sem"]?> name = "min_sem" required>
    <br>
    Package:
    <input type = "number" value = '<?php echo $row["package"]?>' name = "package" required>
    <br>
    Mode: 
    <input type = "text" value = <?php echo $row["mode"]?> name = "mode" required>
    <br>
    Company registration year in institute: 
    <input type = "text" value = <?php echo $row["yor"]?> name = "yor" required>
    <br>
    <input type = "submit" value = "SUBMIT" name = "submit" required>
</form>
<br>


<?php

if(isset($_POST["submit"])){
    
    $cname = $_POST["cname"];
    $min_cpi = (double)$_POST["min_cpi"];
    //$package = (int)$_POST["package"];
    $min_sem = $_POST["min_sem"];
    $package = (int)$_POST["package"];
    $mode = $_POST["mode"];
    $yor = (int)$_POST["yor"];

    $sql = "update companies set cname =  '$cname',package = $package,mode =  '$mode',yor = $yor,min_cpi= $min_cpi, min_sem = $min_sem where ccode = '$ccode'";
   
    if( $conn->query($sql)){
        echo "Values inerted successfully";
    }else{
        echo "Unsuccessful attempt";
    }
}
?>

</body>

</html>
