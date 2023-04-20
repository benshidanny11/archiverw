<?php
 require("dbfiles/connect.php");
 $sql = "DELETE from leaders WHERE id=".$_GET['id'];
 
 if ($conn->query($sql) === TRUE) {
    echo "<script>
          alert('Leader is deleted suceesfully!');
          window.history.back();
          </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
?>