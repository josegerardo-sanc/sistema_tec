<?php 
include 'sql.php';
$sql = new SQL();
$sql->query("DELETE FROM `usuarios` WHERE `usuarios`.`idusuarios` = '{$_GET['ide']}'");
header("Location: usuario.php");
 ?>