<html>
<head>



</head>
<body>


<?php
session_start();
include 'server.php';
?> 


<h1> Where do you want to go?</h1>
<br>

<form method = "post">
    
    <input type = "submit" value = "Student Placements" name = "gotostudent">
    <input type = "submit" value = "Alumni page" name = "gotoalumni">
    <input type = "submit" value = "Company details" name = "gotocompany">
    <input type = "submit" value = "Student eligibility" name = "gotoeligibility">
    <input type = "submit" value = "Student Details" name = "gotostudentdet">

</form>
<br>



<?php
if(isset($_POST["gotostudent"])){
    header("Location: http://localhost/CS260_MiniProject/placements.php");
}
if(isset($_POST["gotostudentdet"])){
    header("Location: http://localhost/CS260_MiniProject/student.php");
}
if(isset($_POST["gotocompany"])){
    header("Location: http://localhost/CS260_MiniProject/company.php");
}
if(isset($_POST["gotoalumni"])){
    header("Location: http://localhost/CS260_MiniProject/alumni.php");
}
if(isset($_POST["gotoeligibility"])){
    header("Location: http://localhost/CS260_MiniProject/eligible.php");
}
?>

</body>

</html>