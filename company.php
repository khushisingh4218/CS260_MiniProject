<html>
<head>
<link rel="stylesheet" href="placements.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
               
              </ul>
              
            </div>
          </div>
        </nav>
<?php
include 'server.php';
?>
<div class="head">
<h2>COMPANIES</h2>
</div>

<div class ="subhead">
<p>Apply filter to your search:</p>
</div>
<div class="filter">
<form class="row gy-2 gx-3 align-items-center" method ="post" >
   
<div class="col-auto">
  <label for = "ccode" for="autoSizingInput">Company name</label>
  <select  name="ccode" class="form-select" id="autoSizingInput">
  
    <option value="sel">--SELECT--</option>
    <?php
    $sq = "select distinct cname from companies";
    $res=$conn->query($sq); 
    while($rowl=$res->fetch_assoc()){  
      $cc = $rowl["cname"];
      
    ?>

      <option value = "<?php echo $cc?>"><?php echo $cc?></option>
<?php
    }  
    ?>
  </select>
    <br><br>
  </div>
  <div class="col-auto">
  <label for = "cpi">Enter cpi range: </label>
  <input type = "number" class="form-control" name = "min_cpi" value = 0> 
  <input type = "number" class="form-control" name = "max_cpi" value = 10>
  <br><br>
  </div>
  <div class="col-auto">
  <label for = "sem">Enter semester range: </label>
  <input type = "number" class="form-control" name = "min_sem" value = 1> 
  <input type = "number" class="form-control" name = "max_sem" value = 8>
  <br><br>
  </div>
  <div class="col-auto">
  <label for = "package">Enter package range: </label>
  <input type = "number" class="form-control" name = "min_pkg" value = 0> 
  <input type = "number" class="form-control" name = "max_pkg" value = 10000000>
  <br><br>
  </div>
  
  <div class="col-auto">
    <label for = "yor">Year of recruitment: </label>
  <input type = "number" class="form-control" name = "min_yor" value=1950> 
  <input type = "number" class="form-control" name = "max_yor" value=2050>
  <br><br>
  </div>
  <div class="col-auto">

  <label for = "mode">Mode of recruitment:</label>
  <select  name="mode" class="form-select">
  <option value="sel">--SELECT--</option>
    <option value="offline">Offline</option>
    <option value="online">Online</option>
  </select>
  <br><br>
  </div>
  <div class="col-auto">
  <input type="submit"  class="btn btn-info" value = "Search" name = "alumni">
  </div>
 
</form>
  </div>
<div class="newcontainer">
Want to add a new company? <a href="company_register.php">Click here</a><br><br>
</div>



<?php
if(isset($_POST['alumni'])){

    //echo "Hello";

    $min_cpi = $_POST['min_cpi'];
    $max_cpi = $_POST['max_cpi'];
    $min_pkg = $_POST['min_pkg'];
    $max_pkg = $_POST['max_pkg'];
    $max_sem = $_POST['max_sem'];
    $min_sem = $_POST['min_sem'];
    $max_yor = $_POST['max_yor'];
    $min_yor = $_POST['min_yor'];
    $mode = $POST['mode'];
    $ccode = $_POST['ccode'];
    

    //echo $rollno." ".$ccode;
    
    $count=0;
    $sql = "select * from companies";
    $result = $conn->query($sql);
    //echo $result;
//     $result=mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()){
    //echo "Roll no ".$row["rollno"];
    if($ccode=="sel" || $row["cname"]==$ccode){
        
        if($row["package"]>=$min_pkg  && $row["package"]<=$max_pkg){
                
            if($row["min_sem"]>=$min_sem  && $row["min_sem"]<=$max_sem){
                if($row["min_cpi"]>=$min_cpi  && $row["min_cpi"]<=$max_cpi){
                 
                    if( ($row["yor"]>=$min_yor  && $row["yor"]<=$max_yor)){ //salary
                        if($row["mode"]=="sel"||$row["mode"]>=$mode ){ //tenure
                          
                            $count=$count+1;
                            if($count==1){
                             echo' <div class="container">
                                <div class="row">
                                  <div class="col">';
                                    echo 'Company Code';
                                  echo'</div>
                                  <div class="col">';
                                    echo 'Company name';
                                  echo '</div>
                                  <div class="col">
                                    Minimum Semester required
                                  </div>';
                                  echo'<div class="col">
                                    Minimum CPI required
                                  </div>';
                                  
                                  echo '<div class="col">
                                    Package
                                  </div>';
                                 echo ' <div class="col">
                                    Mode
                                  </div>';
                                  echo '<div class="col">
                                    Year of Recruitment
                                  </div>
                                </div>
                              </div>';
                              echo '<br>';
                            }
                            echo '<div class="container">
                            <div class="row">
                              <div class="col">';
                               echo $row["ccode"];
                              echo '</div>
                              <div class="col">';
                              echo $row["cname"];
                              echo '</div>
                              <div class="col">';
                              echo $row["min_sem"];
                              echo '</div>
                              <div class="col">';
                              echo $row["min_cpi"];
                              echo '</div>
                              <div class="col">';
                              echo $row["package"];
                              echo '</div>
                              <div class="col">';
                              echo $row["mode"];
                              echo '</div>
                              <div class="col">';
                              echo $row["yor"];
                              echo '</div>
                            </div>
                          </div>';
                                  
                            echo "<br>";
                           
                        }
                    }
                }
            }
        }
        
    
    }
   
}

// mysqli_fetch_all($result, MYSQLI_ASSOC);

}

?>
<div class="newcontainer">
<?php   if($count==0){
    
echo 'No record found!!';
  }
  else{
 echo $count;
echo ' record(s) found!!';}
?>
</div>

</body>

</html>