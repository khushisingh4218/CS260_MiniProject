<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="queries.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="p-3 mb-3 text-center bg-dark text-white"  >
    <h2>MANUAL QUERY ENTRY </h2>

    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" method="post" >

		<label for="query" class="form-label">Type your query without semicolon:</label>
		<input type="text" class="form-control" id="query" name="query" required><br>


		<input type="submit" name="show results" value="show results" class="btn btn-info">

	</form>

</div>
</body>
</html>


<?php
session_start();
// echo "hi";
include 'server.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $sql = $_POST['query'];
    // $test = $sql;

    // $n = str_word_count($test);
    // $t = str_split($test);
    // print_r($t);

    echo '<div class="query">';
	$result = mysqli_query($conn, $sql);
   // echo mysqli_num_fields($result);
	$count = mysqli_num_rows($result);
    
    echo "Your query is: $sql <br>";
    // echo "<br>";
    
    if ($count <1)
    {
        echo "No results found";
    }
    else
    { 
        echo "$count row(s) found: <br>";
        echo "<table class='table table-bordered'> ";

            $i =0;
        while ($i < mysqli_num_fields($result))
	{
		$meta = mysqli_fetch_field($result);
		echo '<td>' . $meta->name . '</td>';
		$i = $i + 1;
	}
    while ($row = $result -> fetch_assoc())
    {   echo " <tr>";
        foreach ($row as $value) {
            echo "<td>$value </td>";

        }

        echo " </tr>";
    }
    }
        echo"</table>";

        echo '</div>';
}
?>