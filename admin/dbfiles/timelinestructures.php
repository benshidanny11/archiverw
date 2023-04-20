<?php
require("connect.php");
$sql = 'SELECT id,name,timelineId,structureId from structures where id !=10 and timelineId='.$_GET['timelineid'];

$result = mysqli_query($conn, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($tree_data);
?>