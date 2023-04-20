<?php
 require("dbfiles/connect.php");

 if (isset($_POST['submit'])) {
   $name= $_POST['leadername'];
   $compid = $_POST['componentid'];
   $datefrom = $_POST['datefrom'];
   $dateto = $_POST['dateto'];
   $date=date("Y-m-d");
 
 
 $sql = "INSERT INTO leaders (name, date_from,dateto,componentId,created_at)
 VALUES ('$name', '$datefrom', '$dateto',$compid,'$date')";
 
 if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Leader is added suceesfully!');
     location.href='index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
 }
 

?>