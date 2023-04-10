<html>
<head>



</head>
<body>


<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass="";
$dbname = "tpc";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//$email = $_SESSION["user_email_delete"];
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   } 



?> 


<h1> Welcome!</h1>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post">
    <input type = "text" value = "Passcode" name = "tpcpass">
    <input type = "submit" value = "Login" name = "tpclogin">
</form>
<br>
<!-- <h3> If an alumni of the institute, enter details</h3>
<form method = "post">
    <label for  ="alroll" >Roll no: </label>
    <input type = "text" value = "Roll No" name = "alroll">
    <br>
    <label for  ="alpass" >Password:  </label>
    <input type = "text" value = "Password" name = "alpass">
    <br>
    <input type = "submit" value = "Login" name = "allogin">
</form> -->


<?php
if(isset($_POST["tpclogin"])){
    if($_POST["tpcpass"]=="tpc"){
        header("Location: http://localhost/CS260_MiniProject/tpchome.php");
    }

}
// if (isset($_POST["allogin"])){

//     $alroll = $_POST["alroll"];
//     $alpass = $_POST["alpass"];

//     $sql = "select rollno from alumnus where rollno = '$alroll'";
//     $result = $conn->query($sql);
//     $row = $result->fetch_assoc();
//     if($row["rollno"]==$alroll){
//         header("Location: http://localhost/CS260_MiniProject/alumni.php");
//     }else{
//         echo "Invalid login";
//     }
    
// }
?>

</body>

</html>
