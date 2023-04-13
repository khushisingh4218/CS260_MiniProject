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

$rollno = $_SESSION["id"];

$sql = "select * from alumnus where rollno = '$rollno'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?> 


<h1> Welcome!</h1>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post">
    
    Company code:
    <input type = "text" value = '<?php echo $row["ccode"]?>' name = "ccode" required>
    <br> 
    Position:
    <input type = "text" value = '<?php echo $row["position"]?>' name = "position" required>
    <br>
    Package: 
    <input type = "number" value = <?php echo $row["ctc"]?> name = "ctc" required>
    <br>
    Area:
    <input type = "text" value = '<?php echo $row["area"]?>' name = "area" required>
    <br>
    Tenure: 
    <input type = "number" value = <?php echo $row["tenure"]?> name = "tenure" required>
    <br>
    Placement year: 
    <input type = "number" value = <?php echo $row["pyear"]?> name = "pyear" required>
    <br>
    <input type = "submit" value = "SUBMIT" name = "submit" required>
</form>
<br>


<?php

if(isset($_POST["submit"])){
    
    $position = $_POST["position"];
    $ctc = (int)$_POST["ctc"];
    //$package = (int)$_POST["package"];
    $area = $_POST["area"];
    $tenure = (int)$_POST["tenure"];
    $ccode = $_POST["ccode"];
    $pyear = $_POST["pyear"];

    $sql = "update alumnus set ccode =  '$ccode',ctc = $ctc,area =  '$area',position = '$position',tenure = $tenure, pyear = $pyear where rollno = '$rollno'";
   
    if( $conn->query($sql)){
        echo "Values inerted successfully";
    }else{
        echo "Unsuccessful attempt";
    }
}
?>

</body>

</html>
