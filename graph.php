<?php
include 'server.php';
 if (!$conn) {
     # code...
   
 }else{
         $sql ="SELECT avg(ctc), pyear from placements GROUP BY pyear";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $pyear[]  = $row['pyear']  ;
            $avg[] = $row['avg(ctc)'];
            // echo $productname[$a];
            // $a=$a+1;
        }

        $sql ="SELECT count(rollno), ccode from placements GROUP BY ccode";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
        //  $a=0;
         while ($row = mysqli_fetch_array($result)) { 
 
            $ccode[]  = $row['ccode']  ;
            $cr[] = $row['count(rollno)'];
            // echo $productname[$a];
            // $a=$a+1;
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
</script>

</body>
</html>