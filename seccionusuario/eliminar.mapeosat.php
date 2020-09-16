<?php 
include 'sql.php';
$sql = new SQL();
$vsinoca = $_GET['sinoca'];
$vareamp = $_GET['areamp'];
$sql->query("DELETE FROM `mapeosat` WHERE `mapeosat`.`idno` = '{$_GET['ide']}'");
header("Location: mapeosat.php?sinoca=$vsinoca&&areamp=$vareamp");
 ?>