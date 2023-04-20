<?php 
 session_start();
 $_SESSION['welcomevisited'] = 'yes';
 if($_GET['lan']=='kiny'){
    header('Location: index.php');
 }else if($_GET['lan']=='en'){
    header('Location: lan/en/index.php');  
 }else {
    header('Location: lan/fr/index.php');   
 }

?>