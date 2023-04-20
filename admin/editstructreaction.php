<?php
 require("dbfiles/connect.php");
$strname = $_POST['strname'];

if (isset($_POST["submit"])) {


  $sql = "UPDATE structures set name='$strname' WHERE id=" . $_GET['strid'];
  
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Structre is edited suceesfully!');
       location.href='structures.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }    
  
  $conn -> close();   
}else{
    echo "<script>alert('Fill all blank!');
    location.href='editstructure.php';</script>"; 
}

?>

