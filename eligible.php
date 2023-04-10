<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> ELIGIBLE STUDENTS </h1>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" method="post">

<label for="ccode">Company Code: </label>
<input type="text" id="ccode" name="ccode" required><br><br>


<input type="submit" name="submit" value="submit">

</form>
</body>
</html>

<?php
session_start();
$db = mysqli_connect("localhost", "root", "PASSWORD", "tpc");
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $ccode= $_POST['ccode'];
    $sql = "SELECT * FROM companies where ccode ='$ccode'";
	$result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count < 1) {
		echo "<p>No results found.... Enter the correct company code</p>";
	} else {
    while ($row = $result -> fetch_assoc()){

        $min_sem=$row['min_sem'];
        $min_cpi=$row['min_cpi'];
        $package=$row['package'];

    
    }

    $sql = "SELECT A.*, B.ccode, B.ctc FROM student_details A LEFT JOIN placements B ON A.rollno=B.rollno where cpi >= '$min_cpi' and semester >= '$min_sem'";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);

	if ($count < 1) {
		echo "<p>No results found</p>";
	} else {
        echo "<p>Showing results for the given filters...</p>";

        while ($row = $result -> fetch_assoc()){

           
            if ($row['placed']=="Y" and $row['ctc']<= $package)
            {
                printf("%s , %s , %d, %f, %d, %d, %s, %d, %s , %d, %s", $row["rollno"], $row['name'], $row['semester'], $row['cpi'], $row['grade10'], $row['grade12'], $row['branch'],$row['age'], $row['interest'],$row['batch_year'], $row['placed']);
			echo "<br>";

            }
            else
            {
            if($row['placed'] == "N")
            {
            printf("%s , %s , %d, %f, %d, %d, %s, %d, %s , %d, %s", $row["rollno"], $row['name'], $row['semester'], $row['cpi'], $row['grade10'], $row['grade12'], $row['branch'],$row['age'], $row['interest'],$row['batch_year'], $row['placed']);
			echo "<br>";
            }
            }
        }

	}
}
}
?>