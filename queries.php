


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hi.
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" method="post">

		<label for="query">Type your query without semicolon:</label>
		<input type="text" id="query" name="query" required><br><br>


		<input type="submit" name="login" value="login">

	</form>
</body>
</html>


<?php
session_start();
// echo "hi";
$db = mysqli_connect("localhost", "root", "PASSWORD", "tpc");


if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $sql = $_POST['query'];
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
    echo $sql;
    // echo "<br>";
    echo $count;
    if ($count <1)
    {
        echo "No results found";
    }
    else
    { 
    while ($row = $result -> fetch_assoc())
    {
        foreach ($row as $value) {
            echo $value;
            echo "  ";
        }
        echo "<br>";
    }
    }

}
?>

