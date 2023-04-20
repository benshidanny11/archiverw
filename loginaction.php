<?php
include "dbfiles/connect.php";
session_start();
/*Default user insertion*/

// $password_default=md5('adminarchive@123');

// $query="INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `verification_code`, `is_verified`, `disabled`, `remember_token`, `created_at`, `updated_at`) VALUES
// (1, 'Roger Ntaganzwa', 'admin', 'admin@gmail.com', '2021-04-14 07:05:57','$password_default', NULL, 1, 0, NULL, '2021-04-14 07:05:57', '2021-04-14 07:05:57')
// ";

// if ($conn->query($query) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $query . "<br>" . $conn->error;
//   }


if (isset($_POST['login'])) {

    $uname = $_POST['email'];
    $password = $_POST['password'];

    if ($uname != "" && $password != "") {

        $sql_query = "SELECT id,name, count(*) as cntUser from users where email ='" . $uname . "' and password='" . $password . "'";
        $result = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['uname'] = $uname;
            $_SESSION['name'] = $row['name'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['userrole'] = $row['role'];
            header('Location: admin/index.php');
        } else {
            echo "<script>alert('Incorrect login data!');
                  location.href='login.php';</script>";
        }
    }
} else {
    echo "<script>alert('Incomplete login data!');
    location.href='login.php';</script>";
}

?>