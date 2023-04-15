<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placements</title>
    <link rel="stylesheet" href="company.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          
                 
               
            <div class="container-fluid">
                <img src="hello.jpg" alt="" width="30" height="24">
              <a class="navbar-brand" href="adminhome.php">Admin</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="adminstudent.php">Students</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="admincompany.php">Companies</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="admineligible.php">Eligibility</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="adminplacements.php">Placements</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="adminalumni.php">Alumni</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="adminstats.html">Statistics</a>
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

<div class="head">
<h2>PLACEMENTS</h2>
</div>

<div class ="subhead">
<p>Apply filter to your search:</p>
</div>
<div class="filter">
<form class="row gy-2 gx-3 align-items-center" method="post" action="<?=$_SERVER['PHP_SELF']?>" method="post">

<div class="col-auto">
<label for="ccode">Company Code:</label>
<input type="text" class="form-control" id="ccode" name="ccode" ><br><br>
</div>

<div class="col-auto">
<label for="psem">Placed in sem:</label>
<input type="text" class="form-control" id="psem" name="psem" value="8"><br><br>
</div>

<div class="col-auto">
<label for="CPI">CTC Range:</label>
<input type="text" class="form-control" id="CTC" name="CTC" value="0">
<label for="CPI2"></label>
<input type="text" class="form-control" id="CTC2" name="CTC2" value ="10000000"><br><br>
</div>



<div class="col-auto">
<input type="submit" class="btn btn-info" name="submit" value="submit">
<br>
</div>
<?php
session_start();
include 'server.php';
$ent = $_SESSION["entity"];
if($ent=="tpcm"){
?>
<div class="col-auto">
<input type = "submit"  class="btn btn-info" name = "pladd" value = "Add new placements">
</div>
<?php
}
?>
</form>
</div>


<div class="newcontainer">
<?php echo 'Showing results for the given filters...';
?>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")

{
    if(isset($_POST["pladd"])){
        header("Location: http://localhost/CS260_MiniProject/placementadd.php");
    }else{
        $ccode= $_POST['ccode'];
        $CTC=$_POST['CTC'];
        $CTC2=$_POST['CTC2'];
        $psem=$_POST['psem'];
        
      
        $sql = "SELECT A.*, B.name, C.cname FROM placements A NATURAL JOIN student_details B NATURAL JOIN companies C";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $a=0;
    
        if ($count < 1) {
            echo "<p>No results found</p>";
        } else {
            
    
            while ($row = $result -> fetch_assoc()){
                if ($row['psem'] ==(int)$psem || $psem== "")
                {
                    if( $row['ccode'] == $ccode || $ccode =="")
                    {
                        if( $row['ctc'] >= (int)$CTC || $CTC =="")
                        {
                            if ($row['ctc'] <= (int)$CTC2 || $CTC2=="")
                            {
                                $a= $a+1;
                                if($a==1){
                                    echo' <div class="container">
                                       <div class="row">
                                         <div class="col">';
                                           echo 'Roll No';
                                         echo'</div>
                                         <div class="col">';
                                           echo 'Name';
                                         echo '</div>
                                         <div class="col">
                                           Company
                                         </div>';
                                         echo'<div class="col">
                                          Salary
                                         </div>';
                                         
                                         echo '<div class="col">
                                           Placed in semester
                                         </div>';
                                        echo ' 
                                         
                                       </div>
                                     </div>';
                                     echo '<br>';
                                   }
                                   echo '<div class="container">
                            <div class="row">
                              <div class="col">';
                               echo $row["rollno"];
                              echo '</div>
                              <div class="col">';
                              echo $row["name"];
                              echo '</div>
                              <div class="col">';
                              echo $row["cname"];
                              echo '</div>
                              <div class="col">';
                              echo $row["ctc"];
                              echo '</div>
                              <div class="col">';
                              echo $row["psem"];
                              
                              echo '</div>
                            </div>
                          </div>';
                                  
                            echo "<br>";
                                // printf("%s ,%s , %s , %s , %s", $row["rollno"], $row['name'], $row['cname'], $row['ctc'], $row['psem']);
                                // echo "<br>";
                            }
                        }
                    }
                }
            }
            
        }
    }

}

?>
<div class="newcontainer">
<?php   if($a==0){
    
echo 'No record found!!';
  }
  else{
 echo $a;
echo ' record(s) found!!';}
?>
</div>
</body>
</html>