<?php
require("connect.php");
$sql = 'SELECT * from time_lines ORDER BY time_lines.from ASC';

$result = mysqli_query($conn, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($tree_data);
?>