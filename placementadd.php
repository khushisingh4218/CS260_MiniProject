<html>
<head>
<link rel="stylesheet" href="placementadd.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>


</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          
                 
               
          <div class="container-fluid">
              <img src="hello.jpg" alt="" width="30" height="24">
            <a class="navbar-brand" href="tpchome.php">TPC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="student.php">Students</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="company.php">Companies</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="eligible.php">Eligibility</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="placements.php">Placements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumni.php">Alumni</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="stats.html">Statistics</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="queries.php">SQL Queries</a>
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


?> 

<div class="heading">
<h1> ADD A NEW PLACEMENT</h1>
</div>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<div class="box">
<form method = "post" class="row g-3">
<div class="col-md-4">
<label for="rollno" class="form-label">
    Roll No: </label>
    <input type = "text" class="form-control" value = "" name = "rollno">
</div>
    <div class="col-md-4">
    <label for="ccode" class="form-label">
    Company code:</label>
    <input type = "text" class="form-control" value = "" name = "ccode">
    </div>
    <div class="col-md-4">
    <label for="position" class="form-label">
    Position:</label>
    <input type = "text" class="form-control" value = "" name = "position">
    </div>
    <div class="col-md-4">
    <label for="ctc" class="form-label">
    Package: </label>
    <input type = "text" class="form-control" value = "" name = "ctc">
    </div>
    <div class="col-md-4">
    <label for="area" class="form-label">
    Area:</label>
    <input type = "text" class="form-control" value = "" name = "area">
    </div>
    <div class="col-md-4">
    <label for="tenure" class="form-label">
    Tenure: </label>
    <input type = "text" value = "" class="form-control" name = "tenure">
    </div>
    <div class="col-12">
		<button type="submit"  name="submit" class="btn btn-primary"  >Add Placement</button>
        </div>
</form>
</div>
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