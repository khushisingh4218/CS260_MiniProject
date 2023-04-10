<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" method="post">

<label for="placed">Placed Y/N:</label>
<input type="text" id="placed" name="placed" required><br><br>

<label for="semester">Semester number:</label>
<input type="text" id="semester" name="semester" value="8" required><br><br>

<label for="CPI">CPI Range:</label>
<input type="text" id="CPI" name="CPI" value="0" required>
<label for="CPI2">to:</label>
<input type="text" id="CPI2" name="CPI2" value ="10" required><br><br>

<label for="batch_year">Batch year:</label>
<input type="text" id="batch_year" name="batch_year" value="2025" required><br><br>


<input type="submit" name="submit" value="submit">

</form>
</body>
</html>

<?php
session_start();
$db = mysqli_connect("localhost", "root", "PASSWORD", "tpc");
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $placed= $_POST['placed'];
    $semester=(int)$_POST['semester'];
    $CPI=(int)$_POST['CPI'];
    $CPI2=(int)$_POST['CPI2'];
    $batch_year=(int)$_POST['batch_year'];
  
    $sql = "SELECT * FROM student_details where placed ='$placed' and semester ='$semester' and cpi>='$CPI' and cpi<='$CPI2' and batch_year='$batch_year'";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);

	if ($count < 1) {
		echo "<p>No results found</p>";
	} else {
        echo "<p>Showing results for the given filters...</p>";

        while ($row = $result -> fetch_assoc()){

            printf("%s , %s , %d, %f, %d, %d, %s, %d, %s , %d, %s", $row["rollno"], $row['name'], $row['semester'], $row['cpi'], $row['grade10'], $row['grade12'], $row['branch'],$row['age'], $row['interest'],$row['batch_year'], $row['placed']);
			echo "<br>";

        
        }

	}
}

?>