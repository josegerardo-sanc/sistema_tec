<?php
include 'conexion.php';
 class SQL extends conexion
 {
 	
	public function query($sql)
	{
		$conexion = $this->conexion();
		mysqli_query($conexion, $sql)or die("error...");
	}
	public function select($sql)
	{
		$conexion = $this->conexion();
		$x = mysqli_query($conexion, $sql);
		return $x;
	}
}
 ?>