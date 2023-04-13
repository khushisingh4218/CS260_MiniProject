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

    <div class="col-12">
		<button type="submit"  name="submit" class="btn btn-primary"  >Register</button>
        </div>
        </form>
        
</body>
</html>
<?php
include 'server.php';
$ccode=$_POST['ccode'];
$id = $_POST["ccode"];
$passw = $_POST["userpass"];
$conf = $_POST["confpass"];
$entity = "comp";
$cname=$_POST['cname'];
$min_sem=$_POST['min_sem'];
$min_cpi=$_POST['min_cpi'];
$package=$_POST['package'];
$mode=$_POST['mode'];
$yor=$_POST['yor'];

if($conf ==$passw){
    $sql = "insert into login values('$id', '$passw', '$entity')";
    $result = $conn->query($sql);

   
   
    $sql1 ="insert into companies values ('$ccode','$cname','$min_sem','$min_cpi','$package','$mode','$yor')";
    $result=$conn->query($sql1);
    
    

    }
    else{

        echo "Mismatching passwords";
    }



// Close database connection
mysqli_close($conn);
?>
