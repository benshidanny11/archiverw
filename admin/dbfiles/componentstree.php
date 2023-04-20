<?php
require("connect.php");
$sql = 'SELECT components.name as name,components.name as text,components.id as id,components.componentId as parent, components.structureId as stid FROM components INNER JOIN structures ON components.structureId=structures.id WHERE structures.timeLineId=' . $_GET['timelineid'] . '';
$result = mysqli_query($conn, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// foreach($tree_data as $k => &$v){
//     $tmp_data[$v['id']] = &$v;
// }

// foreach($tree_data as $k => &$v){
//     if($v['componentId'] && isset($tmp_data[$v['componentId']])){
//         $tmp_data[$v['componentId']]['nodes'][] = &$v;
//     }
// }

// foreach($tree_data as $k => &$v){
//     if($v['componentId'] && isset($tmp_data[$v['componentId']])){
//         unset($tree_data[$k]);
//     }
// }


mysqli_close($conn);
echo json_encode($tree_data);
?>