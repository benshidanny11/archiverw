<?php
 require("dbfiles/connect.php");

 if (isset($_POST['submit'])) {
   $timelnid= $_POST['timeline'];
   $structreid = $_POST['parentstr'];
   $strname = $_POST['strname'];
   $date=date("Y-m-d");
 
 
 $sql = "INSERT INTO structures (name, structureId,timeLineId ,created_at)
 VALUES ('$strname', '$structreid', '$timelnid','$date')";
 
 if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Structre is added suceesfully!');
     location.href='registerstructre.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
 }
 

?>