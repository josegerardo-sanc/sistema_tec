<?php 
include 'plantilla/cabeza.php';
if (isset($_POST['emailus'])) {
	$respuesta = $mapeosat->RegistrarUsuario($_POST['nomb'], $_POST['emailus'], $_POST['passus'], $_POST['tius']);
}
if (isset($_POST['actualizar'])) {
	$respuesta = $mapeosat->ActualizarUsuario($_POST['actualizar'], $_POST['nombre'], $_POST['correo'], $_POST['contra'], $_POST['tipus']);
}
if ($au[5] == 2) {
	header("Location: index.php");
}
 ?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-users"></em>
				</a></li>
				<li class="active">Usuarios</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-users"></i> Usuarios</h1>
			</div>
		</div><!--/.row-->
		<div class="form-group">
			<button class="btn btn-primary" data-toggle="modal" data-target="#reUsuario">Agregar</button>
		</div>
		<?php 
			if (isset($respuesta)) {
				echo $respuesta;
			}
		 ?>
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-12">
					<?php 
						$mapeosat->tablaUsuarios();
					 ?>
					<div class="modal fade" id="reUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					    <div class="modal-dialog">
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font><font>×</font></font></span></button>
					          <h4 class="modal-title" id="myModalLabel">Agregar usuario</h4>
					        </div>
					        <form action="usuario.php" method="POST">
					        	<div class="modal-body">
					        		<div class="form-group">
					        			<label for="">Nombre completo</label>
					        			<input type="text" name="nomb" class="form-control" required="">
					        		</div>
						            <div class="form-group">
						                <label>Correo electronico</label>
						                <input type="email" class="form-control" name="emailus" required>
						            </div>
						            <div class="form-group">
						                <label>Contraseña</label>
						                <input type="password" class="form-control" name="passus" required>
						            </div>
						            <div class="form-group"></div>
						            <label for="">Tipo Usuario</label>
						            <select name="tius" id="" class="form-control">
						            	<?php 
						            	$mapeosat->tipoUsuario("");
						            	 ?>
						            </select>
						        </div>
						        <div class="modal-footer">
						        	<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
						          <a href="usuario.php" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
						        </div>
					        </form>
					      </div>
					    </div>
					</div>

				</div>
				</div>
			</div><!--/.row-->
		</div>
	</div>	<!--/.main-->
<?php 
include 'plantilla/pies.php';
 ?>