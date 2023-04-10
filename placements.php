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

<label for="ccode">Company Code:</label>
<input type="text" id="ccode" name="ccode" ><br><br>

<label for="CPI">CTC Range:</label>
<input type="text" id="CTC" name="CTC" value="0">
<label for="CPI2">to:</label>
<input type="text" id="CTC2" name="CTC2" value ="10000000"><br><br>

<label for="psem">Placed in sem:</label>
<input type="text" id="psem" name="psem" value="8"><br><br>


<input type="submit" name="submit" value="submit">
<br>

<input type = "submit" name = "pladd" value = "Add new placements">

</form>
</body>
</html>

<?php
session_start();
$db = mysqli_connect("localhost", "root", "mysql_pass_23", "tpc");
if ($_SERVER['REQUEST_METHOD'] == "POST")

{
<<<<<<< HEAD

    if(isset($_POST["pladd"])){
        header("Location: http://localhost/CS260_MiniProject/placementadd.php");
    }{
        $ccode= $_POST['ccode'];
        $CTC=$_POST['CTC'];
        $CTC2=$_POST['CTC2'];
        $psem=$_POST['psem'];
      
        $sql = "SELECT * FROM placements NATURAL JOIN student_details";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
    
        if ($count < 1) {
            echo "<p>No results found</p>";
        } else {
            echo "<p>Showing results for the given filters...</p>";
    
            while ($row = $result -> fetch_assoc()){
                if ($ccode== $row['ccode'] || $ccode== "")
=======
    $ccode= $_POST['ccode'];
    $CTC=$_POST['CTC'];
    $CTC2=$_POST['CTC2'];
    $psem=$_POST['psem'];
  
    $sql = "SELECT A.*, B.name, C.cname FROM placements A NATURAL JOIN student_details B NATURAL JOIN companies C";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
    $a=0;

	if ($count < 1) {
		echo "<p>No results found</p>";
	} else {
        echo "<p>Showing results for the given filters... </p>";

        while ($row = $result -> fetch_assoc()){
            if ($ccode== $row['ccode'] || $ccode== "")
            {
                if( $row['ctc'] >= (int)$CTC || $CTC =="")
>>>>>>> 5f631595e5c5bc3b370b9dfd1cf8669ee924f909
                {
                    if( $row['ctc'] >= (int)$CTC || $CTC =="")
                    {
                        if ($row['ctc'] <= (int)$CTC2 || $CTC2=="")
                        {
<<<<<<< HEAD
                            if ($row['psem'] == (int)$psem || $psem =="")
                            {
                                printf("%s ,%s , %s , %s , %s", $row["rollno"], $row['name'], $row['ccode'], $row['ctc'], $row['psem']);
                                echo "<br>";
                            }
=======
                            $a= $a+1;
                            printf("%s ,%s , %s , %s , %s", $row["rollno"], $row['name'], $row['cname'], $row['ctc'], $row['psem']);
			                echo "<br>";
>>>>>>> 5f631595e5c5bc3b370b9dfd1cf8669ee924f909
                        }
                    }
                }
            }
        }
<<<<<<< HEAD
    }
    
=======
        echo "<br>$a records found";
	}
>>>>>>> 5f631595e5c5bc3b370b9dfd1cf8669ee924f909
}

?>