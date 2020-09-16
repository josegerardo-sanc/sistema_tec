<?php 
include 'sql.php';
$sql = new SQL();

$cu = $sql->select("SELECT * FROM `usuarios` WHERE email = '{$_POST['email']}' AND contraseña = '{$_POST['pass']}'");
$filas = mysqli_num_rows($cu);
if ($filas == 0) {
	echo"<script>alert('Contraseña Incorrecta'); 
	window.location.href=\"../index.php\"</script>";
}else{
	$au = mysqli_fetch_row($cu);
	session_start();
	$_SESSION['autentica'] = "SAT";
	$_SESSION['id'] = $au[0];
	$nombre = $au[1];
	echo"<script>alert('BIENVENIDO $nombre.'); 
	window.location.href=\"index.php\"</script>";
}

 ?>