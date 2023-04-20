<?php
require("connect.php");
$sql = 'SELECT name FROM `leaders`';

$result = mysqli_query($conn, $sql);
$rows = array();
while ($row = $result->fetch_assoc()) {
    array_push($rows,$row);
 }
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 echo json_encode($rows);


$conn -> close();
?>