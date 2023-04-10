<html>
<head>



</head>
<body>


<?php
session_start();
$ent = $_SESSION["entity"];
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


<h2>Alumni specifications: </h2>



<form method ="post" >
  <label for="rollno">Enter roll number</label>
  <input type = "text" name = "rollno"><br>

  <label for = "ccode">Company code</label>
  <select  name="ccode">
  <!-- <option value="sel">--SELECT--</option>
    <option value="MCB">Mercedes Benz</option>
    <option value="GGL">Google India</option>
    <option value="JPMC">J.P. Morgan</option>
    <option value="ATL">Atlassian</option> -->
    <option value="sel">--SELECT--</option>
    <?php
    $sq = "select distinct ccode from alumnus";
    $res=$conn->query($sq); 
    while($rowl=$res->fetch_assoc()){  
      $cc = $rowl["ccode"];
      
    ?>

      <option value = "<?php echo $cc?>"><?php echo $cc?></option>
<?php
    }  
    ?>
  </select>
    <br>
    
  <label for = "asal">Enter salary in range: </label>
  <input type = "number" name = "asal" value = 0>
  <input type = "number" name = "bsal" value = 10000000>
  <br>

  <label for = "area">Enter area of work:</label>
  <input type = "text" value = "" name = "area">

  <br>

  <label for = "position">Position</label>
  <select  name="position">
  <option value="sel">--SELECT--</option>
    <!-- <option value="UX engineer">UX engineer</option>
    <option value="SDE">SDE</option>
    <option value="Data Analyst">Data Analyst</option>
    <option value="Ads">Ads</option>
    <option value="ML Scientist">ML Scientist</option> -->

    <?php
    $sq = "select distinct position from alumnus";
    $res=$conn->query($sq); 
    while($rowl=$res->fetch_assoc()){  
      $cc = $rowl["position"];
      
    ?>

      <option value = "<?php echo $cc?>"><?php echo $cc?></option>
<?php
    }  
    ?>
  </select>

<br>
  <label for = "atenure">Enter tenure in range: </label>
  <input type = "number" name = "atenure" value = 0>
  <input type = "number" name = "btenure" value = 10>
  <br>

  <input type="submit" value = "Search" name = "alumni">

  <?php
  if($ent =="tpcm" || $ent=="alum"){
  ?>
  <input type = "submit" value = "Add Alumni" name = "addalum">

  <?php
  }
  ?>
</form>




<?php
if(isset($_POST['alumni'])){

    //echo "Hello";

    $rollno = $_POST['rollno'];
    $ccode = $_POST['ccode'];
    $position = $_POST['position'];
    $atenure = $_POST['atenure'];
    $btenure = $_POST['btenure'];
    $area = $_POST['area'];
    $asal = $_POST['asal'];
    $bsal = $_POST['bsal'];

    //echo $rollno." ".$ccode;
    

    $sql = "select * from alumnus";
    $result = $conn->query($sql);
    //echo $result;
//     $result=mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()){
    //echo "Roll no ".$row["rollno"];
    if( $rollno==""  || $row["rollno"]==$rollno){
        
        if($ccode=="sel" || $row["ccode"]==$ccode){
                
            if($position=="sel" || $row["position"]==$position){
                if($area=="" || $row["area"]==$area){
                   
                    if($row["ctc"]>=$asal  && $row["ctc"]<=$bsal){ //salary
                        if($row["tenure"]>=$atenure  && $row["tenure"]<=$btenure){ //tenure

                            echo $row["rollno"]."\t".$row["ccode"]."\t".$row["ctc"]."\t".$row["area"]."\t".$row["position"]."\t".$row["tenure"];
                            echo "<br>";
                           
                        }
                    }
                }
            }
        }
        
    
    }
}

// mysqli_fetch_all($result, MYSQLI_ASSOC);

}

if(isset($_POST["addalum"])){
  header("Location: http://localhost/CS260_MiniProject/addalum.php ");
}

?>

</body>

</html>
