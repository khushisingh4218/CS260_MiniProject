<html>
<head>



</head>
<body>


<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass="mysql_pass_23";
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
<input type = "text" value = "User ID" name = "userid">
    <input type = "text" value = "Passcode" name = "userpass">
    <label for = "entity">You are: </label>
  <select  name="entity">
  <option value="comp">Company</option>
    <option value="stud">Student</option>
    <option value="tpcm">TPC Official</option>
    <option value="alum">Alumnus</option>
</select>

    <input type = "submit" value = "Login" name = "userlogin">
</form>
<br>



<?php
if(isset($_POST["userlogin"])){
    $id = $_POST["userid"];
    $passw = $_POST["userpass"];
    $entity = $_POST["entity"];
    $sql = "select * from login where id = '$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if($row["id"]==$id){
            if($row["passw"]==$passw && $row["entity"]==$entity){
                $_SESSION["entity"] = $entity;
                header("Location: http://localhost/CS260_MiniProject/tpchome.php");
            }else{
                echo "Invalid login";
            }
        }
        
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
