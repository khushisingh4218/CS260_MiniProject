<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <link rel="stylesheet" href="registration_company.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">       
               
               <div class="container-fluid">
                   <img src="hello.jpg" alt="" width="30" height="24">
                 <a class="navbar-brand" href="index.php">Login</a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     
                     <li class="nav-item">
                       <a class="nav-link" href="registration_student.php">Student Registration</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link" href="registration_company.php">Company Registration</a>
                     </li>
                     
                    
                   </ul>
                   
                 </div>
               </div>
             </nav>
<body>
    <div class="reg_head">
	<h2>REGISTER YOUR COMPANY</h2>
</div>
    
	<form method="post" class="row g-3"  action="">
    <div class="col-md-4">
    <label for="ccode" class="form-label">Company Code:</label>
		<input type="text" name="ccode" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label for="cname" class="form-label">Company Name:</label>
		<input type="text" name="cname" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="email" class="form-label">Email:</label>
		<input type="email" class="form-control"  name="email" required>
    </div>

    <div class="col-md-2">
		<label for="min_sem" class="form-label">Minimum semester eligibility:</label>
		<input type="number" name="min_sem" class="form-control"required>
    </div>

    <div class="col-md-2">
        <label for="min_cpi" class="form-label">Minimum CPI eligibility:</label>
		<input type="number" step="0.01" name="min_cpi" class="form-control" required>
    </div>

    <div class="col-md-2">
        <label for="package" class="form-label">Package:</label>
		<input type="number"  name="package" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="mode" >Mode of recruitment:</label>
        <select name="mode" class="form-select">
        <option value="offline">Offline</option>
        <option value="online">Online</option>
        </select>
</div>

<div class="col-md-4">
        <label for="yor" >YOR:</label>
		<input type="int"  class="form-control" name="yor" required>
</div>

<div class="col-md-4">
        <label for = "userpass" value = "Enter password">Enter password: </label>
    <input type = "password" class="form-control" name = "userpass">
</div>

<div class="col-md-2">
    <label for = "confpass" value = "Confirm password">Confirm password: </label>
    <input type = "password" class="form-control" name = "confpass">
    </div>

    <div margin = "40px" padding = "10px">
    <h2>Choose skills which you would like the candidate to have: </h2>
    <input class="form-check-input" type="checkbox" value="ml" name = "ml" checked>
  <label class="form-check-label" for="ml">
    Machine Learning
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="cp" id = "cp" checked>
  <label class="form-check-label" for="cp">
    Competitive Programming
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="iot" id = "iot" checked>
  <label class="form-check-label" for="iot">
    Internet of Things
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="cybsec" id = "cybsec" checked>
  <label class="form-check-label" for="cybsec">
    Cybersecurity
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="mng" id = "mng" checked>
  <label class="form-check-label" for="mng">
    Management
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="ncc" id = "ncc" checked>
  <label class="form-check-label" for="ncc">
    NCC
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="dsa" id = "dsa" checked>
  <label class="form-check-label" for="dsa">
    Data Structures and Algorithms
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="nt" id = "nt" checked>
  <label class="form-check-label" for="nt">
   Networking
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="db" id = "db" checked>
  <label class="form-check-label" for="db">
    Database
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="software" id = "software" checked>
  <label class="form-check-label" for="software">
    Software
  </label>
  <br>

</div>


    <div class="col-12">
        
		<button type="submit"  name="submit" class="btn btn-primary"  >Register</button>
        
            <!-- <input type = "submit" name = "register" value = "Register"> -->
        <!-- </form> -->
        </div>



</div>


        </form>
        <div class="reg">
            Already have an account? 
            <a href="index.php">Login</a>
</div>
</body>
</html>
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass="mysql_pass_23";
$dbname = "tpc";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);




if(isset($_POST["submit"])){

    $ccode=$_POST['ccode'];
$id = $_POST["ccode"];
$passw = $_POST["userpass"];
$conf = $_POST["confpass"];
$entity = "comp";
$cname=$_POST['cname'];
$min_sem=(int)$_POST['min_sem'];
$min_cpi=(double)$_POST['min_cpi'];
$package=(int)$_POST['package'];
$mode=$_POST['mode'];
$yor=$_POST['yor'];



$a = array();
array_push($a, $_POST["ml"]);
array_push($a, $_POST["cp"]);
array_push($a, $_POST["iot"]);
array_push($a, $_POST["mng"]);
array_push($a, $_POST["ncc"]);
array_push($a, $_POST["cybsec"]);
array_push($a, $_POST["dsa"]);
array_push($a, $_POST["network"]);
array_push($a, $_POST["db"]);
array_push($a, $_POST["software"]);

    if($conf ==$passw){
        $sql = "insert into login values('$ccode', '$passw', '$entity')";
        $result = $conn->query($sql);
    
       
       
        $sql1 ="insert into companies values ('$ccode','$cname',$min_sem,$min_cpi,$package,'$mode','$yor')";
        $result=$conn->query($sql1);

        
        $sql2 = "insert into skills values($a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6],$a[7],$a[8],$a[9])";
        $result=$conn->query($sql1);
        
    
        }
        else{
    
            echo "Mismatching passwords";
        }
}




// Close database connection
mysqli_close($conn);
?>