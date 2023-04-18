<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="dashboard.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="bg" >
        <?php 

    session_start();
  include 'server.php';
    $rollno = $_SESSION["id"];
    //$rollno = "2101CS71";
    //$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


        ?>
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
            <h2> STUDENT DASHBOARD </h2>
</div>

    <?php

    $sql = "select * from student_details where rollno = '$rollno'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $semester = $row["semester"];
    $cpi = $row["cpi"];
    $name = $row["name"];
    $grade10 = $row["grade10"];
    $grade12 = $row["grade12"];
    $branch = $row["branch"];
    $age = $row["age"];
    $interest = $row["interest"];
    $batch_year = $row["batch_year"];
    $placed = $row["placed"];
    $transcript = $row["transcript"];

    ?>


<div class = "det" >
<span class = "b">
<label class = "a" for  = "userid">User ID:</label>
<input class = "a" type = "text" value=" <?php echo $rollno ?>" name = "userid" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "name">Name:</label>
<input  class = "a" type = "text" value=" <?php echo $name ?>" name = "name" size = "50" readonly>
</span>
<span class = "b">
<label class = "a" for  = "cpi">CPI:</label>
<input  class = "a" type = "text" value=" <?php echo $cpi ?>" name = "cpi" size = "40" readonly>
</span>
<span class = "b">
<label class = "a" for  = "grade10">10th grade marks:</label>
<input class = "a"  type = "text" value=" <?php echo $grade10 ?>" name = "grade10" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "grade12">12th grade marks:</label>
<input  class = "a" type = "text" value=" <?php echo $grade12 ?>" name = "grade12" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "batch">Batch year:</label>
<input class = "a"  type = "text" value=" <?php echo $batch_year ?>" name = "batch" size = "38" readonly>
</span>
<span class = "b">
</span>
<label class = "a" for  = "interest">Interests:</label>
<input class = "a"  type = "text" value=" <?php echo $interest?>" name = "interest" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "semester">Semester:</label>
<input class = "a"  type = "text" value=" <?php echo $semester ?>" name = "semester" size = "50" readonly>
</span>
<span class = "b">
<label class = "a" for  = "placed">Placed:</label>
<input  class = "a" type = "text" value=" <?php echo $placed ?>" name = "placed" size = "36" readonly>
</span>
<span class = "b">
<label class = "a" for  = "transcript">Transcript link:</label>
<input class = "a"  type = "text" value=" <?php echo $transcript ?>" name = "transcript" size = "70" readonly>
</span>
<!-- aria-label="Disabled input example"  -->
</div>   
</div>
    </body>
</html>