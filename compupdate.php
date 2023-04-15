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
            <a class="navbar-brand" href="companyhome.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                  <a class="nav-link" href="company_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="compupdate.php">Update</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="company_eligible.php">Eligible Students</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="company_alumni.php">Alumni</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="company_placement.php">Placements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="company_stats.php">Statistics</a>
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

$ccode = $_SESSION["id"];
//$ccode = "GGL";
$sql = "select * from companies where ccode = '$ccode'";
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
    <label for="cname" class="form-label">
    Company name:</label>
    <input type = "text" value = '<?php echo $row["cname"]?>' name = "cname" class="form-control" required>
</div>

<div class="col-md-4">
<label for="min_sem" class="form-label">
    Minimum cpi required:</label>
    <input type = "number" value = '<?php echo $row["min_cpi"]?>' name = "min_cpi" class="form-control" required>
</div>

<div class="col-md-4">
<label for="min_sem" class="form-label">
    Minimum semester to reach: </label>
    <input type = "number" value = <?php echo $row["min_sem"]?> name = "min_sem" class="form-control" required>
</div>

<div class="col-md-4">
        <label for="package" class="form-label">
    Package:</label>
    <input type = "number" value = '<?php echo $row["package"]?>' name = "package" class="form-control" required>
</div>

<div class="col-md-4">
        <label for="mode" class="form-label" >
        Mode of recruitment: </label>
    <input type = "text" value = <?php echo $row["mode"]?> name = "mode" class="form-control" required>
</div>

<div class="col-md-4">
        <label for="yor" class="form-label">
    Company registration year in institute: </label>
    <input type = "text" value = <?php echo $row["yor"]?> name = "yor" class="form-control"  required>
</div>

<div padding = "20px" margin = "20px">
Choose skills which you would like the candidate to have: <br>
    <input class="form-check-input" type="checkbox" value="ml" name = "ml" checked>
  <label class="form-check-label" for="ml">
    Machine Learning
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="cp" name = "cp" checked>
  <label class="form-check-label" for="cp">
    Competitive Programming
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="iot" name = "iot" checked>
  <label class="form-check-label" for="iot">
    Internet of Things
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="cybsec" name = "cybsec" checked>
  <label class="form-check-label" for="cybsec">
    Cybersecurity
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="mng" name = "mng" checked>
  <label class="form-check-label" for="mng">
    Management
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="ncc" name = "ncc" checked>
  <label class="form-check-label" for="ncc">
    NCC
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="dsa" name = "dsa" checked>
  <label class="form-check-label" for="dsa">
    Data Structures and Algorithms
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="nt" name = "nt" checked>
  <label class="form-check-label" for="nt">
   Networking
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="db" name = "db" checked>
  <label class="form-check-label" for="db">
    Database
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="software" name = "software" checked>
  <label class="form-check-label" for="software">
    Software
  </label>
  <br>
</div>
<div class="col-12">
		<button type="submit"  name="submit" class="btn btn-primary"  >Update</button>
        </div>
</form>
<br>


<?php


if(isset($_POST["submit"])){

    $ml = 0;
    $cp =0;
    $iot =0;
    $mng = 0;
    $ncc = 0;
    $cybsec = 0;
    $dsa = 0;
    $network = 0;
    $db = 0;
    $software = 0;
    
    
    if(isset($_POST["ml"])){
        $ml = 1;
    }else{
       $ml = 0;
    }
    
    if(isset($_POST["cp"])){
        $cp =1;
    }else{
        $cp =0;
    }
    if(isset($_POST["iot"])){
        $iot =1;
    }else{
        $iot =0;
    }
    if(isset($_POST["mng"])){
        $mng = 1;
    }else{
        $mng = 0;
    }
    if(isset($_POST["ncc"])){
        $ncc = 1;
    }else{
        $ncc = 0;
    }
    if(isset($_POST["cybsec"])){
        $cybsec = 1;
    }else{
        $cybsec = 0;
    }
    if(isset($_POST["dsa"])){
        $dsa = 1;
    }else{
        $dsa = 0;
    }
    if(isset($_POST["nt"])){
        $network = 1;
    }else{
        $network = 0;
    }
    if(isset($_POST["db"])){
        $db = 1;
    }else{
        $db = 0;
    }
    if(isset($_POST["software"])){
        $software = 1;
    }else{
        $software = 0;
    }
    
    

    
    $cname = $_POST["cname"];
    $min_cpi = (double)$_POST["min_cpi"];
    //$package = (int)$_POST["package"];
    $min_sem = $_POST["min_sem"];
    $package = (int)$_POST["package"];
    $mode = $_POST["mode"];
    $yor = (int)$_POST["yor"];

    $sql = "update companies set cname =  '$cname',package = $package,mode =  '$mode',yor = $yor,min_cpi= $min_cpi, min_sem = $min_sem where ccode = '$ccode'";
    
    $sql1 = "update skills set ml = $ml, cp = $cp, iot = $iot, ncc = $ncc, software = $software, dsa = $dsa, network = $network, mng = $mng, db = $db, cybsec = $cybsec where ccode = '$ccode'";
    // , cp = $a[1],iot = $a[2],mng = $a[3],ncc = $a[4], cybsec = $a[5],dsa = $a[6],network = $a[7],db = $a[8],software = $a[9]
    if( $conn->query($sql)){
       //echo $a[0];
        if( $conn->query($sql1)){
            echo "Updation successful";
        }else{
            echo "Unsuccessful attempt";
        }
    }else{
        echo "Unsuccessful attempt";
    }
    
}
?>

</body>

</html>