<?php
session_start();
echo "hi";

$conn = mysqli_connect("localhost", "root", "PASSWORD", "dblab");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $mypackage = 0;
    $mycpi = 0;
    $mysem = 0;
    $interest = "";
    $id=$_SESSION['id'];
    echo $id;

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