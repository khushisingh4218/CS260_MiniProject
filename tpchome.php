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

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$ent = $_SESSION["entity"];
//echo $ent;
$_SESSION["entity"] = $ent;
$id = $_SESSION["id"];
?> 


<h1> Where do you want to go?</h1>
<br>

<form method = "post">
    
    <input type = "submit" value = "Student Placements" name = "gotostudent"><br>
    <input type = "submit" value = "Alumni page" name = "gotoalumni"><br>
    <input type = "submit" value = "Company details" name = "gotocompany"><br>
    <input type = "submit" value = "Student eligibility" name = "gotoeligibility"><br>
    <input type = "submit" value = "Student Details" name = "gotostudentdet"><br>
    <input type = "submit" value = "Update Details" name = "updatedetails"><br>
    <?php

    if($ent=="stud"){
    ?>
    <input type = "submit" value = "Check your eligibility" name = "myeligible"><br>
    <?php
    }
    ?>

</form>
<br>



<?php
if(isset($_POST["gotostudent"])){
    header("Location: http://localhost/CS260_MiniProject/placements.php");
}
if(isset($_POST["gotostudentdet"])){
    header("Location: http://localhost/CS260_MiniProject/student.php");
}
if(isset($_POST["gotocompany"])){
    header("Location: http://localhost/CS260_MiniProject/company.php");
}
if(isset($_POST["gotoalumni"])){
    header("Location: http://localhost/CS260_MiniProject/alumni.php");
}
if(isset($_POST["gotoeligibility"])){
    header("Location: http://localhost/CS260_MiniProject/eligible.php");
}
if(isset($_POST["updatedetails"])){
    if($ent == "alum"){

        header("Location: http://localhost/CS260_MiniProject/alumupdate.php");
    }else if($ent =="stud"){
        header("Location: http://localhost/CS260_MiniProject/studupdate.php");

    }else if($ent = "comp"){
        header("Location: http://localhost/CS260_MiniProject/compupdate.php");

    }
    
}
if(isset($_POST["myeligible"])){
    $mypackage = 0;
    $mycpi = 0;
    $mysem = 0;
    $interest = "";

    $sql = "select * from placements where rollno = '$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if($row["rollno"]==$id){
            $mypackage = (int)$row["ctc"];
            // $mycpi = (double)$row["ctc"];
            // $mysem = (int)$row["ctc"];
        }
    } 

    

        $sql = "select * from student_details where rollno = '$id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
        if($row["rollno"]==$id){
           $interest = $row["interest"];
            $mycpi = (double)$row["cpi"];
            $mysem = (int)$row["semester"];
        }
    

        }

    //echo $mypackage." ".$mycpi." ".$mysem;
  
    $sql = "select * from companies where package > $mypackage and min_sem <= $mysem and min_cpi <= $mycpi";
    //  and min_sem <= $mysem and min_cpi <= $mycpi
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){

            $ccode = $row["ccode"];
            $tv= "select * from skills where ccode = '$ccode'";
            $present = false;
            $res = $conn->query($tv);
            while($r = $res->fetch_assoc()){
                if($r[$interest]==true){
                    $present = true;
                }
            }
            if($present){
                echo $row["ccode"]."   ".$row["cname"]."   ".$row["min_sem"]."   ".$row["min_cpi"]."   ".$row["package"]."   ".$row["mode"]."   ".$row["yor"];
        echo "<br>";
            }
        
            
        
        
    }
}

?>

</body>

</html>
