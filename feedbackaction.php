<?php
require("dbfiles/connect.php");

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $feedback = $_POST['feedback'];

if ($_FILES["document"]['size']!=0){
  if ($_FILES["advicefeature"]['size']<=1048576){
  $filename = $_FILES["document"]["name"];
  $tempname = $_FILES["document"]["tmp_name"];
  $folder = "uploads/". $filename;
  $sql = "INSERT INTO feedbacks (fullname, emailaddress,phonenumber,feedbackmessage,document,doneon)
  VALUES ('$name', '$email','$phonenumber', '$feedback','$folder'," . "'" . date('Y-m-d') . "')";
    if (move_uploaded_file($tempname, $folder)) {
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Igitekerezo cyoherejwe neza, Murakoze!');
        location.href='index.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }    
    }else{
      echo "Document failed to upload";
    }
  }else {
    echo "<script>alert('Image size should not be greter than 1 MB!');
     history.back()</script>";
  }

  $conn -> close(); 
}else{
  $sql = "INSERT INTO feedbacks (fullname, emailaddress,phonenumber,feedbackmessage,doneon)
  VALUES ('$name', '$email','$phonenumber', '$feedback'," . "'" . date('Y-m-d') . "')";
 
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Igitekerezo cyoherejwe neza, Murakoze!');
     location.href='index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }  
  $conn -> close(); 
}
}
