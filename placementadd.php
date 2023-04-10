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



?> 


<h1> Welcome!</h1>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post">
    Roll No: 
    <input type = "text" value = "" name = "rollno">
    <br>
    Company code:
    <input type = "text" value = "" name = "ccode">
    <br> 
    Position:
    <input type = "text" value = "" name = "position">
    <br>
    Package: 
    <input type = "text" value = "" name = "ctc">
    <br>
    Area:
    <input type = "text" value = "" name = "area">
    <br>
    Tenure: 
    <input type = "text" value = "" name = "tenure">
    <br>
    <input type = "submit" value = "SUBMIT" name = "submit">
</form>
<br>


<?php

if(isset($_POST["submit"])){
    $rollno = $_POST["rollno"];
    $position = $_POST["position"];
    $ctc = (int)$_POST["ctc"];

    $area = $_POST["area"];
    $tenure = (int)$_POST["tenure"];
    $ccode = $_POST["ccode"];

    $sql = "insert into alumnus values('$rollno', '$ccode','$ctc', '$area','$position', '$tenure')";
   
    if( $conn->query($sql)){
        echo "Values inerted successfully";
    }else{
        echo "Unsuccessful attempt";
    }
}
?>

</body>

</html>
