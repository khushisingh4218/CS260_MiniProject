<html>
<head>
<link rel="stylesheet" href="registration_student.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          
                 
               
          <div class="container-fluid">
              <img src="hello.jpg" alt="" width="30" height="24">
            <a class="navbar-brand" href="studenthome.html">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studupdate.php">Update</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studenteligible.php">Eligibility</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studcompany.php">Companies</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studplacements.php">Placements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studalumni.php">Alumni</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studstats.html">Statistics</a>
                </li>
               
              </ul>
              <form class="d-flex" method="post" action="logout.php">
                  <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
            </div>
          </div>
        </nav>  
<?php
session_start();
include 'server.php';
$rollno = $_SESSION["id"];
//$rollno = "2101CS71";
$sql = "select * from student_details where rollno = '$rollno'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?> 

<div class="reg_head">
<h2> UPDATE </h2>
</div>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post" class="row g-3"  action="">
<div class="col-md-4">
        <label for="name" class="form-label">
    Name:</label>
    <input type = "text" value = '<?php echo $row["name"]?>' class="form-control" name = "name" required>
</div>

    <div class="col-md-4">
        <label for="semester" class="form-label">
    Semester:</label>
    <input type = "number" value = '<?php echo $row["semester"]?>' class="form-control" name = "semester" required>
    </div>

    <div class="col-md-2">
		<label for="cpi" class="form-label">
    CPI:</label>
    <input type = "number" class="form-control" value = <?php echo $row["cpi"]?> name = "cpi" required>
    </div> 

    <div class="col-md-2">
        <label for="grade10" class="form-label">
    10th grade marks:</label> 
    <input type = "number" class="form-control" value = <?php echo $row["grade10"]?> name = "grade10" required>
    </div>
    
    <div class="col-md-2">
        <label for="grade12" class="form-label">
    12th grade marks:</label>
    <input type = "number" class="form-control" value = <?php echo $row["grade12"]?> name = "grade12" required>
    </div>

    <div class="col-md-4">
        <label for="branch" > 
    Branch: </label>
    <input type = "text" class="form-control" value = '<?php echo $row["branch"]?>' name = "branch" required>
    </div>

    <div class="col-md-4">
        <label for="age" class="form-label">Age:</label>
    Age: </label>
    <input type = "number" class="form-control" value = <?php echo $row["age"]?> name = "age" required>
    </div>

    <div class="col-md-4">
        <label for="interest" >
    Interest: </label>
    <select  name="interest" class="form-select">
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
    </div>

    <div class="col-md-4">
        <label for="batch_year" >
    Batch year: </label>
    <input type = "number" class="form-control" value = <?php echo $row["batch_year"]?> name = "batch_year" required>
    </div>

    <div class="col-md-4">
        <label for="transcript" >
    Transcript link: </label>
    <input type = "text" value = '<?php echo $row["transcript"]?>' class="form-control" name = "transcript" required>
</div>
    <!-- Placed: 
    <select name = "placed">
    <br> -->
    

    <div class="col-12">
		<button type="submit"  name="submit" class="btn btn-primary"  >Update</button>
        </div>
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
        echo "Updation successful";
    }else{
        echo "Unsuccessful attempt";
    }
}
?>

</body>

</html>