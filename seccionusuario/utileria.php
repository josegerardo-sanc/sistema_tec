<?php 
include 'plantilla/cabeza.php';
$situacion = "";
$area = "";
if ($au[5] == 2) {
	header("Location: index.php");
}
 ?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-database"></em>
				</a></li>
				<li class="active">Utilería</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-database"></i> Utilería</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="" class="control-label">Realizar respaldo de la tabla de mapeosat</label>
				</div>
				<div class="form-group">
					<a href="utileria.php?respaldo=ok" class="btn btn-success btn-lg"><i class="fa fa-file-text-o"></i> Realizar respaldo</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?php
				if (isset($_GET['respaldo'])) {
					$mapeosat->respaldarTablaMapeoSAT();
					echo"<script>alert('Se ha respaldado la tabla mapeosat, se ha guardado como un archivo de extension csv'); 
					window.location.href=\"utileria.php\"</script>";
				}					 		
					// $mapeosat->TablaMapeosat($situacion, $area);
				 ?>	
				 
			</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<?php 
include 'plantilla/pies.php';
 ?>