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
//$rollno = "2101CS71";
$sql = "select * from student_details where rollno = '$rollno'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?> 


<h1> Welcome!</h1>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post">
    
    Name:
    <input type = "text" value = '<?php echo $row["name"]?>' name = "name" required>
    <br> 
    Semester:
    <input type = "number" value = '<?php echo $row["semester"]?>' name = "semester" required>
    <br>
    CPI:
    <input type = "number" value = <?php echo $row["cpi"]?> name = "cpi" required>
    <br> 
    10th grade marks: 
    <input type = "number" value = <?php echo $row["grade10"]?> name = "grade10" required>
    <br>
    12th grade marks:
    <input type = "number" value = <?php echo $row["grade12"]?> name = "grade12" required>
    <br>
    Branch: 
    <input type = "text" value = '<?php echo $row["branch"]?>' name = "branch" required>
    <br>
    Age: 
    <input type = "number" value = <?php echo $row["age"]?> name = "age" required>
    <br>
    Interest: 
    <select  name="interest">
  <option value="ml">Machine Learning</option>
    <option value="cp">Competitive Programming</option>
    <option value="ncc">NCC</option>
    <option value="mng">Management</option>
    <option value="dsa">Data Structures and Algorithms</option>
    <option value="iot">Internet of Things</option>
    <option value="network">Networking</option>
    <option value="cybsec">Cybersecurity</option>
    <option value="db">Database</option>
    <option value="software">Software</option>

</select>
    <!-- <input type = "text" value = '<?php echo $row["interest"]?>' name = "interest" required> -->
    <br>
    Batch year: 
    <input type = "number" value = <?php echo $row["batch_year"]?> name = "batch_year" required>
    <br>
    Transcript link: 
    <input type = "text" value = '<?php echo $row["transcript"]?>' name = "transcript" required>
    <br>
    <!-- Placed: 
    <select name = "placed">
    <br> -->
    
    <input type = "submit" value = "SUBMIT" name = "submit" required>
</form>
<br>


<?php

if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $semester = (int)$_POST["semester"];
    $cpi = (double)$_POST["cpi"];
    $transcript = $_POST["transcript"];
    $batch_year = (int)$_POST["batch_year"];
    $interest = $_POST["interest"];
    $branch = $_POST["branch"];
    $grade10 = (int)$_POST["grade10"];
    $grade12 = (int)$_POST["grade12"];
    $age = (int)$_POST["age"];

    $sql = "update student_details set name = '$name',semester = $semester,cpi = $cpi ,transcript = '$transcript', batch_year = $batch_year,interest = '$interest',age = $age,
    branch ='$branch', grade10 = $grade10, grade12 = $grade12 where rollno = '$rollno'";
   
    if( $conn->query($sql)){
        echo "Values inerted successfully";
    }else{
        echo "Unsuccessful attempt";
    }
}
?>

</body>

</html>
