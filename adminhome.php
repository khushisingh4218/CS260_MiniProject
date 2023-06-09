<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="tpchome.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
      <div class="bg">
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
          
        <div class="container1" style="margin-top: 2vh;">
            <div class="row">
              <div class="col">
                <div class="card border border-black"  style="width: 20vw;">
                    <img src="dashboard.jpg" class="card-img-top border  border-black" alt="..." style="width: 20vw;height: 13vw;">
                    <div class="card-body">
                     
                      <p class="card-text "></p>
                      <a href="adminstudent.php" class="btn btn-dark">Students Details</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card" style="width: 20vw;">
                    <img src="company.jpeg" class="card-img-top" alt="..." style="width: 20vw;height: 13vw;">
                    <div class="card-body">
                     
                      <p class="card-text"></p>
                      <a href="admincompany.php" class="btn btn-dark">Company Details</a>
                    </div>
                  </div>
              </div><div class="col">
                <div class="card" style="width: 20vw;">
                    <img src="eligible.jpeg" class="card-img-top" alt="..." style="width: 20vw;height: 13vw;">
                    <div class="card-body">
                     
                      <p class="card-text"></p>
                      <a href="admineligible.php" class="btn btn-dark">Student Eligibility</a>
                    </div>
                  </div>
              </div>
              
            </div>
          </div>
          
          <div class="container1" >
            <div class="row">
              <div class="col">
                <div class="card" style="width: 20vw;">
                    <img src="eligible2.jpeg" class="card-img-top" alt="..." style="width: 20vw;height: 13vw;">
                    <div class="card-body">
                      <p class="card-text"></p>
                      <a href="adminplacements.php" class="btn btn-dark">Current Placements</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card" style="width: 20vw;">
                    <img src="alumni.jpeg" class="card-img-top" alt="..." style="width: 20vw;height: 13vw;">
                    <div class="card-body">
                      
                      <p class="card-text"></p>
                      <a href="alumni.php" class="btn btn-dark">Alumni</a>
                    </div>
                  </div>
              </div>
              
              <div class="col">
                <div class="card" style="width: 20vw;">
                    <img src="statistics.jpeg" class="card-img-top" alt="..." style="width: 20vw;height: 13vw;">
                    <div class="card-body">
                      
                      <p class="card-text"></p>
                      <a href="adminstats.html" class="btn btn-dark">Statistics</a>
                    </div>
                  </div>
              </div>
              <div class="col"><div class="card" style="width: 20vw;">
                <img src="sql.jpeg" class="card-img-top" alt="..." style="width: 20vw;height: 13vw;">
                <div class="card-body">
                  
                  <p class="card-text"></p>
                  <a href="queries.php" class="btn btn-dark">Manual SQL Queries</a>
                </div>
              </div></div>
            </div>
          </div>
          </bg>
    </body>
</html>