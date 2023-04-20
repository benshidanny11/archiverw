<?php
 require("dbfiles/connect.php");

 if (isset($_POST['submit'])) {
  $status= $conn -> real_escape_string($_POST['status']);
  $personincharge = $conn -> real_escape_string($_POST['personincharge']);
  $bookowner=$conn->real_escape_string($_POST['bookowner']);
  $location = $conn-> real_escape_string($_POST['location']);
  $latitude = $conn -> real_escape_string($_POST['latitude']);
  $longitude = $conn -> real_escape_string($_POST['longitude']);

   $filename = $_FILES["image"]["name"];
   $tempname = $_FILES["image"]["tmp_name"];
   $folder = "uploads/" . $filename;
 
 
 $sql = "INSERT INTO books (status, image,person_incharge_contact,bookowner,location,latitude,longitude)
 VALUES ('$status','$filename', '$personincharge','$bookowner', '$location',$latitude,'$longitude')";
 

 if (move_uploaded_file($tempname, $folder)) {
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Document is added suceesfully!');
    location.href='registerbook.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }    
}else{
  echo "Image failed to upload";
}
 }else{
  echo "<script>alert('Fill all blank spaces!');
  location.href='registerbook.php';</script>";
 }
 

?>