<?php
 require("dbfiles/connect.php");
 $sql = "DELETE from components WHERE id=".$_GET['compid'];
 
 if ($conn->query($sql) === TRUE) {
    echo "<script>
          alert('Level is deleted suceesfully!');
          window.history.back();
          </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
?>