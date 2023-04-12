<?php
$con  = mysqli_connect("localhost","root","PASSWORD","tpc");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT avg(ctc), pyear from placements GROUP BY pyear";
         $result = mysqli_query($con,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $pyear[]  = $row['pyear']  ;
            $avg[] = $row['avg(ctc)'];
            // echo $productname[$a];
            // $a=$a+1;
        }
        $sql ="SELECT avg(ctc), pyear from alumnus GROUP BY pyear";
         $result = mysqli_query($con,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $pyear[]  = $row['pyear']  ;
            $avg[] = $row['avg(ctc)'];
            // echo $productname[$a];
            // $a=$a+1;
        }

        $sql ="SELECT count(rollno), ccode from placements GROUP BY ccode";
         $result = mysqli_query($con,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $ccode[]  = $row['ccode']  ;
            $cr[] = $row['count(rollno)'];
            // echo $productname[$a];
            // $a=$a+1;
        }
        $sql ="SELECT avg(ctc), ccode from placements GROUP BY ccode";
        $result = mysqli_query($con,$sql);
        $chart_data="";
        // $a=0;
        while ($row = mysqli_fetch_array($result)) { 

           $ccode2[]  = $row['ccode']  ;
           $avg2[] = $row['avg(ctc)'];
          //  echo $avg2[$a];
          //  $a=$a+1;
       }
 
 }
?>


<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<br>
<canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
<br>
<canvas id="myChart3" style="width:100%;max-width:600px"></canvas>



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
      text: "Number of students per company this year"
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
      text: "Average ctc per company this year"
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
