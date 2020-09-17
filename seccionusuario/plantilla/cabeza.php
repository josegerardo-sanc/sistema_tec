<?php 
include 'class_mapeosat.php';
$mapeosat = new mapeo();

ob_start();


 //seguridad 
 if(!isset($_SESSION)){
	session_start();
  }
if($_SESSION["autentica"] != "SAT"){
header('Location: ../index.php');
exit();	
}
//salir
if (isset($_GET['salir'])) {  
  session_start();
  unset($_SESSION['autentica']);
  unset($_SESSION['id']);
  session_destroy();
  header('Location: ../index.php');
}

$iduser = $_SESSION['id'];
$cu = $mapeosat->select("SELECT * FROM usuarios U INNER JOIN tipousuario T ON U.idtipousuario = T.idtipousuario WHERE U.idusuarios = '$iduser'");
$au = mysqli_fetch_row($cu);
if (isset($_POST['pass'])) {
	$mapeosat->cambiarcontrasenia($au[0],$_POST['pass']);
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mapeoadmin</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" style="cursor: default;"><span>SAT</span></a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-user"></em>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li><a href="" data-toggle="modal" data-target="#cambiocontrasenia"><i class="fa fa-key"></i> Cambiar contraseña</a></li>
							<li class="divider"></li>
							<li><a href="?salir"><i class="glyphicon glyphicon-off"></i> Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $au[1]; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>En linea como <?php echo $au[6]; ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Inicio</a></li>
			<li><a href="mapeosat.php"><em class="fa fa-desktop">&nbsp;</em> Mapeosat</a></li>
			<li><a href="utileria.php"><i class="fa fa-database"></i> Utileria</a></li>
			<?php if ($au[5] == 1): ?>
			
			<li><a href="usuario.php"><i class="fa fa-users"></i> Usuarios</a></li>
			<?php endif ?>
			
		</ul>
	</div><!--/.sidebar-->
	<div class="modal fade" id="cambiocontrasenia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content" style="background-color: grey; color: #fff;">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font><font>×</font></font></span></button>
	          <h4 class="modal-title" id="myModalLabel" style="color: #fff;"><i class="fa fa-key"></i> Cambiar mi contraseña</h4>
	        </div>
	        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
		        <div class="modal-body">
			        <!-- <div class="form-group">
		                <label>Correo electronico</label>
		                <input type="email" class="form-control" name="email" required>
		            </div> -->
		            <div class="form-group">
		                <label>Ingrese su nueva contraseña</label>
		                <input type="password" class="form-control" name="pass" required>
		            </div>
		        </div>
		        <div class="modal-footer">
		        	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar cambio</button>
		          <button type="button" class="btn btn-danger" data-dismiss="modal"><font><font>Cancelar</font></font></button>
		        </div>
		    </form>
	      </div>
	    </div>
	</div>