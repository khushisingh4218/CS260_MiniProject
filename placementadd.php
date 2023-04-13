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
    Package: 
    <input type = "number" value = 0 name = "ctc">
    <br>
    Placement semester:
    <input type = "number" value = 0 name = "psem">
    <br>
    Placement year: 
    <input type = "number" value = 2023 name = "pyear">
    <br>
    <input type = "submit" value = "SUBMIT" name = "submit">
</form>
<br>


<?php

if(isset($_POST["submit"])){
    $rollno = $_POST["rollno"];
  
    $ctc = (int)$_POST["ctc"];

    $psem = (int)$_POST["psem"];
    $pyear = (int)$_POST["pyear"];
    $ccode = $_POST["ccode"];

    $sql = "insert into placements values('$rollno', '$ccode',$ctc, $psem,$pyear)";
   
    if( $conn->query($sql)){
        echo "Values inerted successfully";
    }else{
        echo "Unsuccessful attempt";
    }

    $sql = "update student_details set placed = 'Y' where rollno = '$rollno'";
   if( $conn->query($sql)){
    echo "<br>Student placed";
   }
}
?>

</body>

</html>
