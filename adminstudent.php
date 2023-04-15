<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student</title>
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
                
              </div>
            </div>
          </nav>  
    <div class="head">
        <h2>STUDENTS</h2>
    </div>
    <div class="subhead">
        <p>Apply filter to your search:</p>
    </div>

    <div class="filter">
        <form class="row gy-2 gx-3 align-items-center" method="post" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <div class="col-auto">
                <label for="placed">Placed?</label>
                <select class="form-select" id="placed" name="placed">
                    <option value="sel">--select--</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
            </div>

            <div class="col-auto">
                <label for="semester">Semester number:</label>
                <input type="number" step=1 class="form-control" id="semester" name="semester" value="0">
            </div>

            <div class="col-auto">
                <label for="batch_year">Batch year:</label>
                <input type="text" class="form-control" id="batch_year" name="batch_year" value="2025">
            </div>



            <div class="col-auto">
                <label for="CPI">CPI Range:</label>
                <input type="number" step=0.01 class="form-control" id="CPI" name="CPI" value="0">
                <label for="CPI2"></label>
                <input type="number" step=0.01 class="form-control" id="CPI2" name="CPI2" value="10">
            </div>

            <div class="col-auto">
                <input type="submit" class="btn btn-info" name="submit" value="Search">
            </div>

        </form>
    </div>
</body>

</html>

<?php
session_start();
$ent = $_SESSION["entity"];
include 'server.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $placed = $_POST['placed'];
    $semester = (int) $_POST['semester'];
    $CPI = (int) $_POST['CPI'];
    $CPI2 = (int) $_POST['CPI2'];
    $batch_year = (int) $_POST['batch_year'];

    $sql = "SELECT * FROM student_details where placed ='$placed' and semester ='$semester' and cpi>='$CPI' and cpi<='$CPI2' and batch_year='$batch_year'";
    $result = mysqli_query($conn, $sql);
    $count = 0;


    echo '<div class="result">';
    echo "<p>Showing results for the given filters...</p>";
    echo '</div>';

    while ($row = $result->fetch_assoc()) {

        if ($placed == "sel" || $row['placed'] == $placed) {
            if ($row['semester'] == $semester || $semester == 0) {
                if ($batch_year == 0 || $row['batch_year'] == $batch_year) {
                    if ($row['cpi'] >= $CPI && $row['cpi'] <= $CPI2) {
                        $count = $count + 1;
                        if ($count == 1) {
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
            // printf("%s , %s , %d, %f, %d, %d, %s, %d, %s , %d, %s", $row["rollno"], $row['name'], $row['semester'], $row['cpi'], $row['grade10'], $row['grade12'], $row['branch'],$row['age'], $row['interest'],$row['batch_year'], $row['placed']);
            // echo "<br>";


        }

    }

    echo '<div class="newcontainer">';
    echo $count;
    echo ' record(s) found!!';
    echo '</div>';
}



?>