<html>
<head>
<link rel="stylesheet" href="index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</head>
<body>
<div class="home">

<?php
include 'server.php';
//$email = $_SESSION["user_email_delete"];
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   } 



?> 



<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post">
<div class="loginbox">
<div class="col d-flex justify-content-center">
<div class="card" style="height: 23rem; ">
  <ul class="list-group list-group-flush">
 <div class="headcontainer>   
  <li class="list-group-item">
  <div class="headwelcome" >
    <h1> IIT PATNA</h1>
</div>
</li>
</div>


    <li class="list-group-item  border border-white " id="id1"><div class="input-group mb-3">
        
  <span class="input-group-text" id="inputGroup-sizing-default">User ID</span>

  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name= "userid">
</div>
</li>

    <li class="list-group-item border border-white" id="id2"><div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
  <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name= "userpass">
</div></li>
    <li class="list-group-item border border-white" id="id3"> 
    <div class="input-group mb-3">   <span class="input-group-text" id="inputGroup-sizing-default">You are</span>
  <select  name="entity" class="btn btn-secondary dropdown-toggle" >
    <option value="sel">--select--</option>
  <option value="comp">Company</option>
    <option value="stud">Student</option>
    <option value="tpcm">TPC Official</option>
    <option value="alum">Alumnus</option>
</select></div></li>

<div class="col d-flex justify-content-center ">
<li class="list-group-item border styleborder-white" style="margin-top 15vw"><input type = "submit" class="btn btn-primary" value = "Login" name = "userlogin"></li>


</div>

  </ul>
</div>


</div>

    
</form>
<div class="newcontainer">
Don't have an account? <a href="registration.php">Register</a><br><br>
</div>
</div>
<br>



<?php
if(isset($_POST["userlogin"])){
    $id = $_POST["userid"];
    $passw = $_POST["userpass"];
    $entity = $_POST["entity"];
    $sql = "select * from login where id = '$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if($row["id"]==$id){
            if($row["passw"]==$passw && $row["entity"]==$entity){
                $_SESSION["entity"] = $entity;
                $_SESSION["id"] = $id;
                header("Location: http://localhost/CS260_MiniProject/tpchome.php");
            }else{
                echo "Invalid login";
            }
        }
        
    }

}
// if (isset($_POST["allogin"])){

//     $alroll = $_POST["alroll"];
//     $alpass = $_POST["alpass"];

//     $sql = "select rollno from alumnus where rollno = '$alroll'";
//     $result = $conn->query($sql);
//     $row = $result->fetch_assoc();
//     if($row["rollno"]==$alroll){
//         header("Location: http://localhost/CS260_MiniProject/alumni.php");
//     }else{
//         echo "Invalid login";
//     }
    
// }
?>
</div>
</body>

</html>