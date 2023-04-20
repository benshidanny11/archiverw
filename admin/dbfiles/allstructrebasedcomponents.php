<?php
require("connect.php");
$sql = 'SELECT components.name as name,components.id as id FROM components WHERE components.structureId=' . $_GET['stid'] . '';

$result = mysqli_query($conn, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
echo json_encode($tree_data);
?>