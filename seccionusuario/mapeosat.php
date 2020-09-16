<?php 
include 'plantilla/cabeza.php';
$respuesta = "";
if (isset($_POST['nome'])) {
	$respuesta = $mapeosat->RegistrarMapeosat($_POST['nome'], $_POST['ubsw'], $_POST['nopa'], $_POST['nopu'], $_POST['nosw'], $_POST['sesw'], $_POST['pusw'], $_POST['tieq'], $_POST['admi'], $_POST['area'], $_POST['vlan'], $_POST['acti'], $_POST['obse'], $_POST['sino']);
}
if (isset($_POST['editarmapesap'])) {
	$respuesta = $mapeosat->ActualizarMapeosat($_POST['editarmapesap'], $_POST['nomeeditar'], $_POST['ubsw'], $_POST['nopa'], $_POST['nopu'], $_POST['nosw'], $_POST['sesw'], $_POST['pusw'], $_POST['tieq'], $_POST['admi'], $_POST['area'], $_POST['vlan'], $_POST['acti'], $_POST['obse'], $_POST['sino']);
}

$situacion = 0;
$area = "";
if (isset($_GET['sinoca'])) {
	$situacion = $_GET['sinoca'];
	$area = $_GET['areamp'];
}
 ?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-desktop"></em>
				</a></li>
				<li class="active">mapeosat</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><em class="fa fa-desktop"></em> mapeosat</h1>
			</div>
		</div><!--/.row-->
		<?php 
		if ($respuesta == "" AND $au[5] == 1) {
			?>
			<div class="form-group">
				<button class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Nuevo</button>
			</div>
			<?php
		} else {
			?>
			<div class="row">
				<div class="col-lg-12">
					<?php 
					echo $respuesta;
					 ?>
				</div>
			</div><!--/.row-->
			<?php
		}
		
		 ?>
		 <div class="row">
			<div class="col-md-12">
				<form action="mapeosat.php" method="GET" class="form-inline">
					<div class="form-group">
						<label for="">Situacion del nodo</label>
						<select name="sinoca" class="form-control" id="">
							<?php $mapeosat->CambiarSituacionNodos($situacion); ?>
						</select>
						<label for="">Area </label>
						<select name="areamp" class="form-control">
							<?php 
							$mapeosat->selectArea($area);
							 ?>
						</select>
						<button class="btn btn-primary" type="submit">Buscar</button>
					</div>
				</form>
			</div>
		</div>
		<br>
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-12">
					<?php 
						$mapeosat->TablaMapeosat($situacion, $area, $au[5]);
					 ?>
				</div>
				</div>
			</div><!--/.row-->
		</div>
	</div>	<!--/.main-->
	<!los modales>
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font><font>×</font></font></span></button>
          <h4 class="modal-title" id="myModalLabel">Nuevo registro</font></h4>
        </div>
        <form action="mapeosat.php" method="POST">
	        <div class="modal-body">
	          <div class="row">
	          	<div class="form-group col-sm-4">
	          		<label>Nomeclaturado</label>
	          		<input type="text" name="nome" class="form-control">
	          	</div>
				<div class="form-group col-sm-4">
					<label>Ubicacion Switch</label>
					<input type="text" name="ubsw" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>No. patch Panel</label>
					<input type="text" name="nopa" class="form-control">
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>No. Puerto Patch Panel</label>
					<input type="text" name="nopu" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>No. Switch</label>
					<input type="text" name="nosw" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>Serie Switch</label>
					<input type="text" name="sesw" class="form-control">
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>Puerto Switch</label>
					<input type="text" name="pusw" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<!-- tieq -->
					<label>Tipo de Equipo</label>
					<select name="tieq" id="" class="form-control">
						<?php $mapeosat->tipoEquipo(""); ?>
					</select>
					
				</div>
				<div class="form-group col-sm-4">
					<!-- admi -->
					<label>Administracion</label>
					<select name="admi" class="form-control" id="">
						<?php $mapeosat->Administracion(""); ?>
					</select>
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>Area</label>
					<input type="text" name="area" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>Vlan</label>
					<input type="text" name="vlan" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<!-- acti -->
					<label>Actividad</label>
					<select name="acti" class="form-control" id="">
						<?php $mapeosat->actividades(""); ?>
					</select>
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>Observaiones</label>
					<input type="text" name="obse" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<!-- sino -->
					<label>Situacion Nodo</label>
					<select name="sino" class="form-control" id="">
						<?php $mapeosat->SituacionNodos(""); ?>
					</select>
				</div>
	         </div>
	        </div>
	        <div class="modal-footer">
	          <input type="submit" class="btn btn-primary" value="Guardar">
	          <a href="mapeosat.php" class="btn btn-danger">Cancelar</a>
	        </div>
        </form>
      </div>
    </div>
</div>
	<!fin de los modales>
<?php 
include 'plantilla/pies.php';
 ?>