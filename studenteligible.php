<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eligble Students</title>
    <link rel="stylesheet" href="studenteligible.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          
                 
               
            <div class="container-fluid">
                <img src="hello.jpg" alt="" width="30" height="24">
              <a class="navbar-brand" href="studenthome.html">Home</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="studupdate.php">Update</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="studenteligible.php">Eligibility</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="studcompany.php">Companies</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="studplacements.php">Placements</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="studalumni.php">Alumni</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="studstats.html">Statistics</a>
                  </li>
                 
                </ul>
                <form class="d-flex" method="post" action="logout.php">
                  <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
              </div>
            </div>
          </nav>
<div class="heading">
    <h2>List Of Companies You Are Eligible For:</h2>
</div>
</body>
</html>
<?php
session_start();

include 'server.php';

    $mypackage = 0;
    $mycpi = 0;
    $mysem = 0;
    $interest = "";
    $interest_grade = 0;
    $id= $_SESSION['id'];
    //$id = "2101CS33";

    $sql = "select * from placements where rollno = '$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if($row["rollno"]==$id){
            $mypackage = (int)$row["ctc"];
            // $mycpi = (double)$row["cpi"];
            // $mysem = (int)$row["semester"];
        }
    } 


    

        $sql = "select * from student_details where rollno = '$id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
        if($row["rollno"]==$id){
           $interest = $row["interest"];
            $mycpi = (double)$row["cpi"];
            $mysem = (int)$row["semester"];
            $interest_grade =(double) $row["interest_grade"];
        }
    

        }


  
    $sql = "select * from companies ";
   
    $result = $conn->query($sql);
    $count=0;
    while($row = $result->fetch_assoc()){


            $ccode = $row["ccode"];
            $tv= "select * from skills_pass_grade where ccode = '$ccode'";
            $present = false;
            $res = $conn->query($tv);
            while($r = $res->fetch_assoc()){

                if($r[$interest]<=$interest_grade){
                    $present = true;
            }
            }
            if($present && $row["package"] > $mypackage){
               
                if($row["min_cpi"] <= $mycpi){
                    if($row["min_sem"] <= $mysem){

                        $count=$count+1;
                        if($count==1){
                            echo ' <div class="container">
                            <div class="row">
                              <div class="col">';
                     echo 'Company Code ';
                     echo '</div>
                              <div class="col">';
                     echo 'Company Name';
                     echo '</div>
                              <div class="col">
                                Semester cutoff
                              </div>';
                     echo '<div class="col">
                                CPI cutoff
                              </div>';
        
                     echo '<div class="col">
                                Package
                              </div>';
                     echo ' <div class="col">
                               Mode of Recruitment
                              </div>';
                     echo '<div class="col">
                               YOR
                              </div>
                     </div>
                         </div>';
        
                     echo '<br>';
                        }
                //     echo $row["ccode"]."   ".$row["cname"]."   ".$row["min_sem"]."   ".$row["min_cpi"]."   ".$row["package"]."   ".$row["mode"]."   ".$row["yor"];
                // echo "<br>";

                echo '<div class="container1">
                            <div class="row">
                            <div class="col">';
                        echo $row['ccode'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row["cname"];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['min_sem'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['min_cpi'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['package'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['mode'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['yor'];
                        echo '</div>';
                        
                        echo '</div></div>';
                    }
                }
                
            }
        
            
        
        
    

}
echo '<div class="result">';

echo 'Number of companies you are eligible to apply at: ';
echo $count;
echo '</div>';
?>

