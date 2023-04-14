<?php
session_start();


$conn = mysqli_connect("localhost", "root", "PASSWORD", "tpc");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $mypackage = 0;
    $mycpi = 0;
    $mysem = 0;
    $interest = "";
    $id= $_SESSION['id'];

    $sql = "select * from placements where rollno = '$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if($row["rollno"]==$id){
            $mypackage = (int)$row["ctc"];
            // $mycpi = (double)$row["cpi"];
            // $mysem = (int)$row["semester"];
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


  
    $sql = "select * from companies ";
   
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){


            $ccode = $row["ccode"];
            $tv= "select * from skills where ccode = '$ccode'";
            $present = false;
            $res = $conn->query($tv);
            while($r = $res->fetch_assoc()){

                if($r[$interest]){
                    $present = true;
            }
            }
            if($present && $row["package"] > $mypackage){
               
                if($row["min_cpi"] <= $mycpi){
                    if($row["min_sem"] <= $mysem){
                    echo $row["ccode"]."   ".$row["cname"]."   ".$row["min_sem"]."   ".$row["min_cpi"]."   ".$row["package"]."   ".$row["mode"]."   ".$row["yor"];
                echo "<br>";
                    }
                }
                
            }
        
            
        
        
    }

}
?>