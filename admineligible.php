<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eligibility</title>
    <link rel="stylesheet" href="eligible.css">
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
                <li class="nav-item">
                  <a class="nav-link" href="queries.php">SQL Queries</a>
                </li>
               
              </ul>
              
            </div>
          </div>
        </nav>
             <div class="head">
    <h1> ELIGIBLE STUDENTS </h1>
</div>
    <div class ="subhead">
<p>Looking for which company?</p>
</div>
<div class="filter">
<form class="row gy-2 gx-3 align-items-center"  method="post" action="<?=$_SERVER['PHP_SELF']?>" method="post">

<div class="col-auto">
<label for="ccode">Company Code: </label>
<input type="text" id="ccode" class="form-control"  name="ccode" required><br>
</div>

<div class="col-auto">
<input type="submit" name="submit" class="btn btn-info" value="submit">
</div>

</form>
</div>
</body>
</html>

<?php
session_start();
$ent = $_SESSION["entity"];
include 'server.h';
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $ccode= $_POST['ccode'];
    $sql = "SELECT * FROM companies where ccode ='$ccode'";
	$result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count < 1) {
        echo '<div class="resulthead">';
		echo "No results found.... Enter the correct company code</p>";
        echo '</div>';
	} else {
    while ($row = $result -> fetch_assoc()){

        $min_sem=$row['min_sem'];
        $min_cpi=$row['min_cpi'];
        $package=$row['package'];

    
    }
    
    $t = "select * from skills where ccode = '$ccode'";
    $res = $conn->query($t);
    $r = $res->fetch_assoc();
    $a = array($r["ml"],$r["cp"],$r["iot"],$r["mng"],$r["ncc"],$r["cybsec"],$r["dsa"],$r["network"],$r["db"],$r["software"]);
    $b = array("ml","cp","iot","mng","ncc","cybsec","dsa","network","db","software");


    

    $sql = "SELECT A.*, B.ccode, B.ctc FROM student_details A LEFT JOIN placements B ON A.rollno=B.rollno where cpi >= '$min_cpi' and semester >= '$min_sem'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	if ($count < 1) {
        echo '<div class="resulthead">';
		echo "<p>No results found</p>";
        echo '</div>';
	} else {
        echo '<div class="resulthead">';
        echo "<p>Showing results for the given filters...</p>";
        echo '</div>';
        $count1 =0;
        $count2 =0;
        while ($row = $result -> fetch_assoc()){

            $x = 0;
            $present = false;
            foreach($b as $val){

                if($val== $row["interest"]){
                    if($a[$x]==true){
                        $present = true;
                    }   
                }
                $x++;
            }

            
            if($present){
                $count1=$count1+1;
                if($count1==1){
                    echo ' <div class="container">
                    <div class="row">
                      <div class="col">';
             echo 'Roll No';
             echo '</div>
                      <div class="col">';
             echo 'Name';
             echo '</div>
                      <div class="col">
                        Semester
                      </div>';
             echo '<div class="col">
                        CPI
                      </div>';

             echo '<div class="col">
                        Grade 10th marks
                      </div>';
             echo ' <div class="col">
                       Grade 12th marks
                      </div>';
             echo '<div class="col">
                        Branch
                      </div>';
             echo '<div class="col">
                         Age
                     </div>'
             ;
             echo '<div class="col">
                 Interest
                 
             </div>';
             echo '<div class="col">
             Batch Year
         
     </div>';
             echo '<div class="col">
                     Placed status
                     </div>
                 </div>
                 </div>';

             echo '<br>';
                }
                if ($row['placed']=="Y" and $row['ctc']<= $package)
            {
            //     printf("%s , %s , %d, %f, %d, %d, %s, %d, %s , %d, %s", $row["rollno"], $row['name'], $row['semester'], $row['cpi'], $row['grade10'], $row['grade12'], $row['branch'],$row['age'], $row['interest'],$row['batch_year'], $row['placed']);
			// echo "<br>";
            $count2=$count2+1;
            echo '<div class="container">
                            <div class="row">
                            <div class="col">';
                        echo $row['rollno'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['name'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['semester'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['cpi'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['grade10'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['grade12'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['branch'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['age'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['interest'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['batch_year'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['placed'];
                        echo '</div>';
                        echo '</div></div>';



            }
            else
            {
            if($row['placed'] == "N")
            {
            // printf("%s , %s , %d, %f, %d, %d, %s, %d, %s , %d, %s", $row["rollno"], $row['name'], $row['semester'], $row['cpi'], $row['grade10'], $row['grade12'], $row['branch'],$row['age'], $row['interest'],$row['batch_year'], $row['placed']);
			// echo "<br>";
            $count2=$count2+1;
            echo '<div class="container">
                            <div class="row">
                            <div class="col">';
                        echo $row['rollno'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['name'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['semester'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['cpi'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['grade10'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['grade12'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['branch'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['age'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['interest'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['batch_year'];
                        echo '</div>';
                        echo '
                            <div class="col">';
                        echo $row['placed'];
                        echo '</div>';
                        echo '</div></div>';

            }
            }

            }
            
            
            

           
            
        }

	}
    echo '<div class="newcontainer">';
    echo $count2;
    echo ' record(s) found!!';
    echo '</div>';
}
}
?>