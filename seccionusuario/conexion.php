 <?php 
/**
 * 
 */
class Conexion
{
	public function conexion_db()
	{
		$conexion = mysqli_connect("localhost","root", "", "mapeosat") or die ("Algo anda mal verifique su conexión");
		return $conexion;
	}
}
 ?>