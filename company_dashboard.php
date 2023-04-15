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
    $ccode = $_SESSION["id"];
    //$ccode = "GGL";
    //$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


        ?>
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
        <div class="heading">
            <h2> COMPANY DASHBOARD </h2>
        </div>

    <?php

    $sql = "select * from companies where ccode = '$ccode'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $min_sem = $row["min_sem"];
    $min_cpi = $row["min_cpi"];
    $cname = $row["cname"];
    $yor = $row["yor"];
    $package = $row["package"];
    $mode = $row["mode"];
    

    ?>


<div class = "det" >
<span class = "b">
<label class = "a" for  = "userid">User ID:</label>
<input class = "a" type = "text" value=" <?php echo $ccode ?>" name = "userid" size = "20" readonly>
</span>
<span class = "b">
<label class = "a" for  = "cname">Company Name:</label>
<input  class = "a" type = "text" value=" <?php echo $cname ?>" name = "cname" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "min_cpi">Minimum CPI required:</label>
<input  class = "a" type = "text" value=" <?php echo $min_cpi ?>" name = "min_cpi" size = "40" readonly>
</span>
<span class = "b">
<label class = "a" for  = "min_sem">Minimum semester requirement:</label>
<input class = "a"  type = "text" value=" <?php echo $min_sem ?>" name = "min_sem" size = "30" readonly>
</span>
<span class = "b">
<label class = "a" for  = "package">Package offered:</label>
<input  class = "a" type = "text" value=" <?php echo $package ?>" name = "package" size = "20" readonly>
</span>
<span class = "b">
<label class = "a" for  = "mode">Interview Mode:</label>
<input class = "a"  type = "text" value=" <?php echo $mode ?>" name = "mode" size = "30" readonly>
</span>
<span class = "b">
</span>
<label class = "a" for  = "yor">Year of recruitment:</label>
<input class = "a"  type = "text" value=" <?php echo $yor ?>" name = "yor" size = "30" readonly>
</span>

       
</div>
    </body>
</html>