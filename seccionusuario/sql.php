<?php
include 'conexion.php';
 class SQL extends conexion
 {
 	
	public function query($sql)
	{
		$conexion = $this->conexion_db();
		mysqli_query($conexion, $sql)or die("Erro:intentelo de nuevo, no se pudo realizar su solicitud");
	}
	public function select($sql)
	{
		$conexion = $this->conexion_db();
		$x = mysqli_query($conexion, $sql);
		return $x;
	}
}
 ?>