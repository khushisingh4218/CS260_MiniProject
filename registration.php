<html>
<head>



</head>
<body>


<?php
session_start();
include 'server.php';



?> 


<h1> Welcome!</h1>
<br>
<!-- <h3> If tpc member, login via passcode</h3> -->
<form method = "post">
<input type = "text" value = "Enter user id" name = "userid">
<br>
    <label for = "userpass" value = "Enter password">Enter password: </label>
    <input type = "password"  name = "userpass"><br>

    <label for = "confpass" value = "Confirm password">Confirm password: </label>
    <input type = "password" name = "confpass"><br>
    <label for = "entity">You are: </label>
  <select  name="entity">
  <option value="comp">Company</option>
    <option value="stud">Student</option>
    <option value="tpcm">TPC Official</option>
    <option value="alum">Alumnus</option>
</select>

    <input type = "submit" value = "Register" name = "userregister">
    
</form>

<form method = "post">

<input type = "submit" value = "Login" name = "login">
</form>
<br>



<?php
if(isset($_POST["userregister"])){
    
    $id = $_POST["userid"];
    $passw = $_POST["userpass"];
    $conf = $_POST["confpass"];
    $entity = $_POST["entity"];
    //echo $entity;

    if($conf ==$passw){
    $sql = "insert into login values('$id', '$passw', '$entity')";
    $result = $conn->query($sql);

    if($entity == "comp"){
    $sql = "insert into companies values('$id', '',0,0,0,'',0)";
    $result = $conn->query($sql);
    }else if($entity == "stud"){
        $sql = "insert into student_details values('$id', '',0,0,0,0,'',0,'',0,false)";
        $result = $conn->query($sql);
    }
    else if($entity == "alum"){
       $sql = "insert into alumnus values('$id','GGL', 0,'', 0,0,0)";
       $result = $conn->query($sql);
       //echo "new alumnus";
        }

    }else{

        echo "Mismatching passwords";
    }
    

}
if (isset($_POST["login"])){
    header("Location: http://localhost/CS260_MiniProject/index.php");

}
?>


</body>

</html>