<?php
 require("dbfiles/connect.php");

 if (isset($_POST['submit'])) {

   $name= $_POST['leadername'];
   $compid = $_POST['componentid'];
   $datefrom = $_POST['datefrom'];
   $dateto = $_POST['dateto'];
   
 
 
 $sql = "UPDATE  leaders SET name='$name', date_from='$datefrom',dateto='$dateto',componentId='$compid' WHERE id=".$_GET['id'];
 
 if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Leader is updated suceesfully!');
     location.href='index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
 }
 

?>