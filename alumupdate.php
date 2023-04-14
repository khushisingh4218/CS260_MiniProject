<html>
<head>
<title>Update</title>
    <link rel="stylesheet" href="update.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          
                 
               
          <div class="container-fluid">
              <img src="hello.jpg" alt="" width="30" height="24">
            <a class="navbar-brand" href="alumnihome.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                  <a class="nav-link" href="alumni_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumupdate.php">Update</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="alumni_alumni.php">Alumni</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumni_company.php">Companies</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumni_placement.php">Placements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumni_stats.php">Statistics</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>

<?php
session_start();

include 'server.php';

$rollno = $_SESSION["id"];

$sql = "select * from alumnus where rollno = '$rollno'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?> 


<div class="heading">
<h1>UPDATE</h1>
</div>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post" class="row g-3">
<div class="col-md-4">
<label for="ccode" class="form-label">
Company Code:</label>
    <input type = "text" value = '<?php echo $row["ccode"]?>' name = "ccode" class="form-control" required>
    
    </div>

    <div class="col-md-4">
    <label for="position" class="form-label">
    Position:</label>
    <input type = "text" value = '<?php echo $row["position"]?>' name = "position" class="form-control" required>
</div>

<div class="col-md-4">
<label for="ctc" class="form-label">
    Package: </label>
    <input type = "number" value = '<?php echo $row["ctc"]?>' class="form-control" name = "ctc" required>
</div>

<div class="col-md-4">
<label for="area" class="form-label">
    Area:</label>
    <input type = "text" value = '<?php echo $row["area"]?>' class="form-control" name = "area" required>
    </div>

<div class="col-md-4">
<label for="tenure" class="form-label">
    Tenure: </label>
    <input type = "number" value = '<?php echo $row["tenure"]?>' class="form-control" name = "tenure" required>
    </div>

<div class="col-md-4">
<label for="pyear" class="form-label">
    Placement year: </label>
    <input type = "number" value = '<?php echo $row["pyear"]?>' class="form-control" name = "pyear" required>
    </div>

    <div class="col-12">
		<button type="submit"  name="submit" class="btn btn-primary"  >Update</button>
        </div>


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
        echo "Updation Successful";
    }else{
        echo "Unsuccessful attempt";
    }
}
?>

</body>

</html>