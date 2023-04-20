<?php
require("connect.php");
$sql = 'SELECT structures.id,structures.name,timelineId,structureId,time_lines.from, time_lines.to from structures INNER JOIN time_lines on structures.timelineId=time_lines.id where structures.id';

$result = mysqli_query($conn, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($tree_data);
?>