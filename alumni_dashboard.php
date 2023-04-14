<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="dashboard.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php 

    session_start();
  include 'server.php';
  $rollno = $_SESSION["id"];

        ?>
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          
                 
               
          <div class="container-fluid">
              <img src="hello.jpg" alt="" width="30" height="24">
            <a class="navbar-brand" href="alumnihome.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                  <a class="nav-link" href="alumni_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumupdate.php">Update</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="alumni_alumni.php">Alumni</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumni_company.php">Companies</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumni_placement.php">Placements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alumni_stats.php">Statistics</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
        <div class="heading">
            <h2> ALUMNI DASHBOARD </h2>
        </div>
    <?php

    $sql = "select * from alumnus where rollno = '$rollno'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $ctc = $row["ctc"];
    $ccode = $row["ccode"];
    $area = $row["area"];
    $position = $row["position"];
    $tenure = $row["tenure"];
    $pyear = $row["pyear"];
    

    ?>


<div class = "det" >
<span class = "b">
<label class = "a" for  = "userid">User ID:</label>
<input class = "a" type = "text" value=" <?php echo $rollno ?>" name = "userid" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "name">Company Name:</label>
<input  class = "a" type = "text" value=" <?php echo $ccode ?>" name = "name" size = "40" readonly>
</span>
<span class = "b">
<label class = "a" for  = "ctc">CTC:</label>
<input  class = "a" type = "text" value=" <?php echo $ctc ?>" name = "ctc" size = "40" readonly>
</span>
<span class = "b">
<label class = "a" for  = "area">Area of work:</label>
<input class = "a"  type = "text" value=" <?php echo $area ?>" name = "area" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "position">Position in company:</label>
<input  class = "a" type = "text" value=" <?php echo $position ?>" name = "position" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "tenure">Tenure:</label>
<input class = "a"  type = "text" value=" <?php echo $tenure ?>" name = "tenure" size = "41" readonly>
</span>
<span class = "b">
</span>
<label class = "a" for  = "pyear">Plcaement Year:</label>
<input class = "a"  type = "text" value=" <?php echo $pyear ?>" name = "pyear" size = "30" readonly>
</span>

       
</div>
    </body>
</html>