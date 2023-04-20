<?php
require("connect.php");
$sql = 'SELECT components.name as name,components.name as text,components.id as id,components.componentId as parent_id, components.structureId as stid FROM components INNER JOIN structures ON components.structureId=structures.id WHERE structures.timeLineId=' . $_GET['timelineid'] . ' limit 20';

$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


$itemsByReference = array();
// Build array of item references:
foreach($data as $key => &$item) {
$itemsByReference[$item['id']] = &$item;
// Children array:
$itemsByReference[$item['id']]['children'] = array();
// Empty data class (so that json_encode adds "data: {}" )
$itemsByReference[$item['id']]['data'] = new StdClass();
}
// Set items as children of the relevant parent item.
foreach($data as $key => &$item)
if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
$itemsByReference [$item['parent_id']]['children'][] = &$item;
// Remove items that were added to parents elsewhere:
foreach($data as $key => &$item) {
if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
unset($data[$key]);
}


// foreach($tree_data as $k => &$v ){
//     $v['key']=$v['id'];
//     $tmp_data[$v['key']] = &$v;
// }

// foreach($tree_data as $k => &$v){
//     if($v['parent'] && isset($tmp_data[$v['parent']])){
//         $tmp_data[$v['parent']]['chldren'][] = &$v;
//     }
// }

// foreach($tree_data as $k => &$v){
//     if($v['parent'] && isset($tmp_data[$v['parent']])){
//         unset($tree_data[$k]);
//     }
// }


mysqli_close($conn);
echo json_encode($data);
