<?php
include 'server.php';
 if (!$conn) {
     # code...
    
 }else{
         $sql ="SELECT avg(ctc), pyear from alumnus GROUP BY pyear";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $pyear[]  = $row['pyear']  ;
            $avg[] = $row['avg(ctc)'];
            // echo $productname[$a];
            // $a=$a+1;
        }

        $sql ="SELECT count(rollno), ccode from alumnus GROUP BY ccode";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $ccode[]  = $row['ccode']  ;
            $cr[] = $row['count(rollno)'];
            // echo $productname[$a];
            // $a=$a+1;
        }

        $sql ="SELECT count(rollno), position from alumnus GROUP BY position";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $position[]  = $row['position']  ;
            $cr2[] = $row['count(rollno)'];
            // echo $productname[$a];
            // $a=$a+1;
        }

        $sql ="SELECT avg(ctc), ccode from alumnus GROUP BY ccode";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $ccode2[]  = $row['ccode']  ;
            $avg2[] = $row['avg(ctc)'];
            // echo $avg2[$a];
            // echo $ccode2[$a];
            // $a=$a+1;
        }
 
 }
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="compstats.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

<div class="container">
    <div class="row">
        <div class="col">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<br>
</div>



<canvas id="myChart3" style="width:100%;max-width:600px"></canvas>


</div>
</div>
<script>
var xValues = <?php echo json_encode($pyear); ?>;
var yValues = <?php echo json_encode($avg); ?>;
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Average CTC yearwise"
    },
    scales: {

                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                stepValue: 100000

                            }
                        }]
                }
  }
});

var xValues = <?php echo json_encode($ccode); ?>;
var yValues = <?php echo json_encode($cr); ?>;
var barColors = ["red", "green","blue","orange","brown"];


new Chart("myChart2", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Number of students per company"
    },
    scales: {

                    yAxes: [{
                            display: true,
                            ticks: {
                            min: 0,
                            // max: 10,

                            // forces step size to be 5 units
                            stepSize: 1// <----- This prop sets the stepSize
                            }
                        }]
                }
  }
});

var xValues = <?php echo json_encode($position); ?>;
var yValues = <?php echo json_encode($cr2); ?>;
var barColors = ["red", "green","blue","orange","brown"];


new Chart("myChart3", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Number of students per role"
    },
    scales: {

                    yAxes: [{
                            display: true,
                            ticks: {
                            min: 0,
                            // max: 10,

                            // forces step size to be 5 units
                            stepSize: 1// <----- This prop sets the stepSize
                            }
                        }]
                }
  }
});

var xValues = <?php echo json_encode($ccode2); ?>;
var yValues = <?php echo json_encode($avg2); ?>;
var barColors = ["red", "green","blue","orange","brown"];


new Chart("myChart4", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Average Salary per company"
    },
    scales: {

                    yAxes: [{
                            display: true,
                            ticks: {
                            min: 0,
                            // max: 10,

                            // forces step size to be 5 units
                            stepSize: 1000000// <----- This prop sets the stepSize
                            }
                        }]
                }
  }
});
</script>

</body>
</html>