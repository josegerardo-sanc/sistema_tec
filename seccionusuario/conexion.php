 <?php 
/**
 * 
 */
class Conexion
{
	public function conexion()
	{
		$conexion = mysqli_connect("localhost","root", "", "mapeosat") or die ("Algo anda mal verifique su conexión");
		return $conexion;
	}
}
 ?>