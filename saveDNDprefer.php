<?php 
$prefer=$_GET["prefer"];
 $ix=$_GET["ix"];
 $query = "update preference set prefer='{$prefer}' where ix='{$ix}'";
 $GLOBALS['myCon']->query($query);
 header('Content-Type:text/plain');
 echo $prefer;
 ?>
