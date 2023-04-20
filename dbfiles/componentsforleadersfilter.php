<?php
require("connect.php");
require("../displayerrors.php");
$sql = 'SELECT components.name as name,components.id as compid, components.structureId as stid, time_lines.from as tfrom, time_lines.to as tto FROM components INNER JOIN structures ON components.structureId=structures.id INNER JOIN time_lines ON structures.timeLineId=time_lines.id WHERE structures.timeLineId=' . $_GET['timelineid'] ;

$result = mysqli_query($conn, $sql);
$rows = array();
while ($row = $result->fetch_assoc()) {
    array_push($rows,$row);
 }
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 echo json_encode($rows);


$conn -> close();
