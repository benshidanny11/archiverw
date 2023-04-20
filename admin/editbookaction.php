<?php
 require("dbfiles/connect.php");

 if (isset($_POST['submit'])) {
   $status= $conn -> real_escape_string($_POST['status']);
   $personincharge = $conn -> real_escape_string($_POST['personincharge']);
   $location = $conn -> real_escape_string($_POST['location']);
   $latitude = $conn -> real_escape_string($_POST['latitude']);
   $longitude = $conn -> real_escape_string($_POST['longitude']);
 
 
 $sql = "UPDATE  books SET status='$status',person_incharge_contact='$personincharge',location='$location',latitude='$latitude',longitude='$longitude' WHERE id=".$_GET['id'];
 

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Document is edited suceesfully!');
    location.href='books.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  } 
 }else{
  echo "<script>alert('Fill all blank spaces!');
  location.href='editbook.php';</script>";
 }
 

?>