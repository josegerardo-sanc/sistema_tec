<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mapeosat</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
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
				<a class="navbar-brand" href="#"><img src="img/logo.jpg" width="30" height="30"></a>
				<ul class="nav navbar-top-links navbar-left">
					<li class="dropdown">
						<a href="index.php"  style="color: #fff;">INICIO</a>
					</li>
					<li class="dropdown">
						<a href="acerca.php"  style="color: #fff;">ACERCA DE NOSOTROS</a>
					</li>
					<li class="dropdown">
						<a style="color: #fff; cursor: pointer;" data-toggle="modal" data-target="#ingresar">INGRESAR</a>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<br>
	<div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font><font>×</font></font></span></button>
	          <h4 class="modal-title" id="myModalLabel">Iniciar sesion</h4>
	        </div>
	        <form method="POST" action="seccionusuario/consult_user.php">
		        <div class="modal-body">
		        	<div class="form-group">
		                <label>Correo electronico</label>
		                <input type="email" class="form-control" name="email" required>
		            </div>
		            <div class="form-group">
		                <label>Contraseña</label>
		                <input type="password" class="form-control" name="pass" required>
		            </div>
		        </div>
		        <div class="modal-footer">
		          <input type="submit" class="btn btn-primary" value="Aceptar">
		        </div>
	        </form>
	      </div>
	    </div>
	</div>