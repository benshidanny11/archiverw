<?php
 require("dbfiles/connect.php");

 if (isset($_POST['submit'])) {

   $name= str_replace("'", "\'", $_POST['levelname']);
   $componentid = $_POST['parentlevel'];
   $structreid = $_POST['levelstructre'];
 
 
 $sql = "UPDATE  components SET name='$name',structureId='$structreid',componentId='$componentid' WHERE id=".$_GET['id'];
 
 if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Level is updated suceesfully!');
     location.href='index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
 }
 

?>