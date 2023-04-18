<html>
<head>

<link rel="stylesheet" href="alumni.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
//$email = $_SESSION["user_email_delete"];
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   } 



?> 


<div class="head">
<h2>ALUMNI</h2>
</div>

<div class ="subhead">
<p>Apply filter to your search:</p>
</div>

<div class="filter">
<form class="row gy-2 gx-3 align-items-center"  method ="post" >

  <!-- <div class="col-auto">
  
  <label for="rollno">Enter roll number</label>
  <input type = "text" class ="form-control" name = "rollno">
  <br><br>
</div> -->






  <div class="col-auto">
  <label for = "area">Enter area of work:</label>
  <input type = "text" value = "" class="form-control" name = "area">

  <br><br>
  </div>

  <div class="col-auto">
  <label for = "position">Position</label>
  <select  class="form-select" name="position">
  <option value="sel">--SELECT--</option>
    <!-- <option value="UX engineer">UX engineer</option>
    <option value="SDE">SDE</option>
    <option value="Data Analyst">Data Analyst</option>
    <option value="Ads">Ads</option>
    <option value="ML Scientist">ML Scientist</option> -->

    <?php
    $sq = "select distinct position from alumnus";
    $res=$conn->query($sq); 
    while($rowl=$res->fetch_assoc()){  
      $cc = $rowl["position"];
      
    ?>

      <option value = "<?php echo $cc?>"><?php echo $cc?></option>
<?php
    }  
    ?>
  </select><br><br>
  </div>

<br><br>

<div class="col-auto">
  <label for = "atenure">Enter tenure in range: </label>
  <input type = "number" class="form-control" name = "atenure" value = 0>
  <input type = "number" class="form-control" name = "btenure" value = 10>
  <br><br>
  </div>

  <div class="col-auto">
  <label for = "asal">Enter salary in range: </label>
  <input type = "number" class="form-control" name = "asal" value = 0>
  <input type = "number" class="form-control" name = "bsal" value = 10000000>
  <br><br>
  </div>
  <div class="col-auto">
  <input type="submit" class="btn btn-info" value = "Search" name = "alumni">
  </div>

  <?php
 
  if($ent =="tpcm" || $ent=="alum"){
  ?>
  <input type = "submit" value = "Add Alumni" name = "addalum">

  <?php
  }
  ?>
</form>
</div>



<?php

if(isset($_POST["addalum"])){
  echo "<script> window.location.href = 'addalum.php';</script>";
}
if(isset($_POST['alumni'])){

    //echo "Hello";


    $ccode = $_SESSION['id'];
    $position = $_POST['position'];
    $atenure = $_POST['atenure'];
    $btenure = $_POST['btenure'];
    $area = $_POST['area'];
    $asal = $_POST['asal'];
    $bsal = $_POST['bsal'];

    //echo $rollno." ".$ccode;
    
    $count=0;
    $sql = "select * from alumnus";
    $result = $conn->query($sql);
    //echo $result;
//     $result=mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()){
    //echo "Roll no ".$row["rollno"];

        
        if( $row["ccode"]==$ccode){
                
            if($position=="sel" || $row["position"]==$position){
                if($area=="" || $row["area"]==$area){
                   
                    if($row["ctc"]>=$asal  && $row["ctc"]<=$bsal){ //salary
                        if($row["tenure"]>=$atenure  && $row["tenure"]<=$btenure){ //tenure
                          $count=$count+1;
                          if($count==1){
                           echo' <div class="container">
                              <div class="row">
                                <div class="col">';
                                  echo 'Roll No';
                                echo'</div>
                                <div class="col">';
                                  echo 'Company Code';
                                echo '</div>
                                <div class="col">
                                  Salary
                                </div>';
                                echo'<div class="col">
                                  Area of work
                                </div>';
                                
                                echo '<div class="col">
                                  Position
                                </div>';
                               echo ' <div class="col">
                                  Tenure
                                </div>';
                                
                               echo '</div>
                            </div>';
                            echo '<br>';
                          }
                          echo '<div class="container">
                          <div class="row">';
                          echo '<div class="col">';
                          echo $row["rollno"];
                          echo '</div>
                              <div class="col">';
                              echo $row["ccode"];
                              echo '</div>
                              <div class="col">';
                              echo $row["ctc"];
                              echo '</div>
                              <div class="col">';
                              echo $row["area"];
                              echo '</div>
                              <div class="col">';
                              echo $row["position"];
                              echo '</div>
                              <div class="col">';
                              echo $row["tenure"];
                              echo '</div>
                              </div>
                            </div>';
                                    
                              echo "<br>";
                            // echo $row["rollno"]."\t".$row["ccode"]."\t".$row["ctc"]."\t".$row["area"]."\t".$row["position"]."\t".$row["tenure"];
                            // echo "<br>";
                           
                        }
                    }
                }
            }
        
    
    }
}

// mysqli_fetch_all($result, MYSQLI_ASSOC);




?>
<div class="newcontainer">
<?php   if($count==0){
    
echo 'No record found!!';
  }
  else{
 echo $count;
echo ' record(s) found!!';}
  }
?>
</div>

</body>

</html>
