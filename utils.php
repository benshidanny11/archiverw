<?php 
function getDateYear($date){
   return intval(date('Y', strtotime($date)));  
}
?>