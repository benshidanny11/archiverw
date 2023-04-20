<?php
require("dbfiles/connect.php");
if (isset($_POST['submit'])) {
  $componentid = $_POST['parentlevel'];
  $structreid = $_POST['levelstructre'];
  $componentname = $_POST['levelname'];
  $date = date("Y-m-d");
  $check_duplicate_query = "SELECT count(*) as rowcount FROM components where name='$componentname'  AND componentId=$componentid AND structureId=$structreid";

  $result_check_dup = $conn->query($check_duplicate_query);

  $row_check_dup = $result_check_dup->fetch_array();

  if ($row_check_dup['rowcount'] > 0) {
    echo "<script>alert('Level alredy exists try another!');
    location.href='registercomponent.php';</script>";
  } else {

    if ($componentid == 10) {
      $sql = "INSERT INTO components (name, structureId,componentId,donenon)
      VALUES ('$componentname', '$structreid','$date')";

      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Level is added suceesfully!');
          location.href='registercomponent.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      $sql = "INSERT INTO components (name, structureId,componentId,donenon)
      VALUES ('$componentname', '$structreid', '$componentid','$date')";

      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Level is added suceesfully!');
          location.href='registercomponent.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    mysqli_close($conn);
  }
}
