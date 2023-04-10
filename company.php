<html>
<head>



</head>
<body>


<?php
include 'server.php';
?>

<h2>Companies</h2>

<p>Apply filter to your search:</p>

<form method ="post" >

  <label for = "ccode">Company name</label>
  <select  name="ccode">
  
    <option value="sel">--SELECT--</option>
    <?php
    $sq = "select distinct cname from companies";
    $res=$conn->query($sq); 
    while($rowl=$res->fetch_assoc()){  
      $cc = $rowl["cname"];
      
    ?>

      <option value = "<?php echo $cc?>"><?php echo $cc?></option>
<?php
    }  
    ?>
  </select>
    <br><br>
    
  <label for = "cpi">Enter cpi range: </label>
  <input type = "number" name = "min_cpi" value = 0> to
  <input type = "number" name = "max_cpi" value = 10>
  <br><br>

  <label for = "sem">Enter semester range: </label>
  <input type = "number" name = "min_sem" value = 1> to
  <input type = "number" name = "max_sem" value = 8>
  <br><br>
  <label for = "package">Enter package range: </label>
  <input type = "number" name = "min_pkg" value = 0> to
  <input type = "number" name = "max_pkg" value = 10000000>
  <br><br>


  <label for = "mode">Mode of recruitment:</label>
  <select  name="mode">
  <option value="sel">--SELECT--</option>
    <option value="offline">Offline</option>
    <option value="online">Online</option>
  </select>
  <br><br>
    <label for = "yor">Year of recruitment: </label>
  <input type = "number" name = "min_yor" > to
  <input type = "number" name = "max_yor">
  <br><br>

  <input type="submit" value = "Search" name = "alumni">
</form>


<?php
if(isset($_POST['alumni'])){

    //echo "Hello";

    $min_cpi = $_POST['min_cpi'];
    $max_cpi = $_POST['max_cpi'];
    $min_pkg = $_POST['min_pkg'];
    $max_pkg = $_POST['max_pkg'];
    $max_sem = $_POST['max_sem'];
    $min_sem = $_POST['min_sem'];
    $max_yor = $_POST['max_yor'];
    $min_yor = $_POST['min_yor'];
    $mode = $POST['mode'];
    $ccode = $_POST['ccode'];
    

    //echo $rollno." ".$ccode;
    

    $sql = "select * from companies";
    $result = $conn->query($sql);
    //echo $result;
//     $result=mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()){
    //echo "Roll no ".$row["rollno"];
    if($ccode=="sel" || $row["ccode"]==$ccode){
        
        if($row["package"]>=$min_pkg  && $row["package"]<=$max_pkg){
                
            if($row["min_sem"]>=$min_sem  && $row["min_sem"]<=$max_sem){
                if($row["min_cpi"]>=$min_cpi  && $row["min_cpi"]<=$max_cpi){
                   
                    if($row["yor"]>=$min_yor  && $row["yor"]<=$max_yor){ //salary
                        if($row["mode"]=="sel"||$row["mode"]>=$mode ){ //tenure

                            echo $row["ccode"]."\t".$row["cname"]."\t".$row["package"]."\t".$row["min_sem"]."\t".$row["min_cpi"]."\t".$row["mode"]."\t".$row["yor"];
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

?>

</body>

</html>