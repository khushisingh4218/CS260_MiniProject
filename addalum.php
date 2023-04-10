<html>
<head>



</head>
<body>


<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass="";
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
    <input type = "text" value = "" name = "rollno">
    <input type = "text" value = "" name = "ccode">
    <input type = "text" value = "" name = "position">
    <input type = "text" value = "" name = "rollno">
    <input type = "text" value = "" name = "rollno">
    <input type = "text" value = "" name = "tenure">
    <input type = "submit" value = "SUBMIT" name = "submit">
</form>
<br>


<?php

?>

</body>

</html>
