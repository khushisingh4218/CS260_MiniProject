<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<h2>Register your company!</h2>
	<form method="post" action="">

    <label for="ccode">Company Code:</label>
		<input type="text" name="ccode" required><br><br>

        <label for="cname">Company Name:</label>
		<input type="text" name="cname" required><br><br>

        <label for="email">Email:</label>
		<input type="email" name="email" required><br><br>

		<label for="min_sem">Minimum semester eligibility:</label>
		<input type="number" name="min_sem" required><br><br>
		
        <label for="min_cpi">Minimum CPI eligibility:</label>
		<input type="number" step="0.01" name="min_cpi" required><br><br>

        <label for="package">Package:</label>
		<input type="number"  name="package" required><br><br>

        <label for="mode">Mode of recruitment:</label>
        <select name="mode">
        <option value="offline">Offline</option>
        <option value="online">Online</option>
        </select><br><br>

        <label for="yor">YOR:</label>
		<input type="int"  name="yor" required><br><br>


		<input type="submit" name="submit" value="Register"><br><br>
      
        


  
	</form>
</body>
</html>
<?php
session_start();
$ent = $_SESSION["entity"];
$dbhost = "localhost";
$dbuser = "root";
$dbpass="mysql_pass_23";
$dbname = "tpc";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$ccode=$_POST['ccode'];
	$cname=$_POST['cname'];
	$min_sem=$_POST['min_sem'];
	$min_cpi=$_POST['min_cpi'];
	$package=$_POST['package'];
	$mode=$_POST['mode'];
	$yor=$_POST['yor'];
	$sql ="insert into companies values ('$ccode','$cname','$min_sem','$min_cpi','$package','$mode','$yor')";
$result=$conn->query($sql);
}



// Close database connection
mysqli_close($conn);
?>
