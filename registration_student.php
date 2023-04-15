<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <link rel="stylesheet" href="registration_student.css">
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
	<h2>REGISTER AS A STUDENT</h2>
</div>
    
	<form method="post" class="row g-3"  action="">
    <div class="col-md-4">
    <label for="rollno" class="form-label">Roll No:</label>
		<input type="text" name="rollno" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label for="name" class="form-label">Student Name:</label>
		<input type="text" name="name" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="age" class="form-label">Age:</label>
		<input type="number" step="1" class="form-control"  name="age" required>
    </div>

    <div class="col-md-4">
        <label for="semester" class="form-label">Semester:</label>
		<input type="number" step="1" class="form-control"  name="semester" required>
    </div>

    <div class="col-md-2">
		<label for="cpi" class="form-label">CPI</label>
		<input type="number" name="cpi" step="0.01" class="form-control"required>
    </div>

    <div class="col-md-2">
        <label for="grade10" class="form-label">X marks:</label>
		<input type="number" name="grade10" class="form-control" required>
    </div>

    <div class="col-md-2">
        <label for="grade12" class="form-label">XII marks:</label>
		<input type="number"  name="grade12" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="placed" >Placed?</label>
        <select name="mode" class="form-select">
        <option value="sel">--select--</option>
        <option value="Y">Yes</option>
        <option value="N">No</option>
        </select>
</div>

<div class="col-md-4">
        <label for="branch" >Branch:</label>
		<input type="text"  class="form-control" name="branch" required>
</div>
<div class="col-md-4">
        <label for="interest" >Interest:</label>
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
</div>
<div class="col-md-4">
        <label for="batch_year" >Batch Year:</label>
		<input type="text"  class="form-control" name="batch_year" required>
</div>

<div class="col-md-4">
        <label for="transcript" >Transcript Link:</label>
		<input type="text"  class="form-control" name="transcript" required>
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
        <div class="reg">
            Already have an account? 
            <a href="index.php">Login</a>
</div>
</body>
</html>
<?php
include 'server.php';

if(isset($_POST["submit"])){
$rollno=$_POST['rollno'];
$name = $_POST["name"];
$passw = $_POST["userpass"];
$conf = $_POST["confpass"];
$entity = "stud";
$semester=$_POST['semester'];
$cpi=$_POST['cpi'];
$grade10=$_POST['grade10'];
$grade12=$_POST['grade12'];
$branch=$_POST['branch'];
$age=$_POST['age'];
$interest=$_POST['interest'];
$batch_year=$_POST['batch_year'];
$placed=$_POST['placed'];
$transcript=$_POST['transcript'];

if($conf ==$passw){
    $sql = "insert into login values('$rollno', '$passw', '$entity')";
    $result = $conn->query($sql);

   
   
    $sql1 ="insert into student_details values ('$rollno','$name','$semester','$cpi','$grade10','$grade12','$branch','$age','$interest','$batch_year','$placed','$transcript')";
    $result=$conn->query($sql1);
    
    

    }
    else{

        echo "Mismatching passwords";
    }


  }
// Close database connection
mysqli_close($conn);
?>
