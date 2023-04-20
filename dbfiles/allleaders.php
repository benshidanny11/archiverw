<?php
require("connect.php");
$sql = 'SELECT `leaders`.name,components.name as compname,date_from,`leaders`.dateto FROM `leaders` INNER JOIN `components` ON `leaders`.`componentId` = `components`.`id`';

$result = mysqli_query($conn, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
echo json_encode($tree_data);

?>