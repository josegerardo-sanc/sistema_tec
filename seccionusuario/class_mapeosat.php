<?php 
include 'sql.php';
class mapeo extends SQL
{
	public function cambiarcontrasenia($id,$contrasenia)
	{
		$this->query("UPDATE usuarios SET contraseña = '$contrasenia' WHERE idusuarios = '$id'");
		echo"<script>alert('.Se ha cambiado su contraseña'); 
		window.location.href=\"index.php\"</script>";
	}
	public function tipoEquipo($x)
	{
		$ce = $this->select("SELECT * FROM `tipoequipo`");
		while ($ae = mysqli_fetch_row($ce)) {
			if ($x == $ae[0]) {
				?><option selected="" value="<?php echo $ae[0]; ?>"><?php echo $ae[1]; ?></option><?php
			} else {
				?><option value="<?php echo $ae[0]; ?>"><?php echo $ae[1]; ?></option><?php
			}
			
		}
	}
	public function Administracion($x)
	{

		$c = $this->select("SELECT * FROM `administracion`");
		while ($a = mysqli_fetch_row($c)) {
			if ($x == $a[0]) {
				?><option selected="" value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			} else {
				?><option value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			}
		 } 
	}
	public function actividades($x)
	{
		$c = $this->select("SELECT * FROM `actividad`");
		while ($a = mysqli_fetch_row($c)) {
			if ($x == $a[0]) {
				?><option selected="" value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			} else {
				?><option value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			}
		 } 
	}
	public function SituacionNodos($x)
	{
		$c = $this->select("SELECT * FROM `situacionnodo`");
		while ($a = mysqli_fetch_row($c)) {
			if ($x == $a[0]) {
				?><option selected="" value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			} else {
				?><option value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			}
		 } 
	}
	public function CambiarSituacionNodos($situacion)
	{
		$c = $this->select("SELECT * FROM `situacionnodo`");
		if ($situacion == 0) {
			?><option value="0" selected="">Todos los nodos</option><?php
		}else{
			?><option value="0">Todos los nodos</option><?php
		}
		while ($a = mysqli_fetch_row($c)) {
			if ($situacion == $a[0]) {
				?><option value="<?php echo $a[0] ?>" selected=""><?php echo $a[1]; ?></option><?php
			} else {
				?><option value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			}		 	
		 }
	}
	public function selectArea($area)
	{
		$c =$this->select("SELECT * FROM `mapeosat` GROUP BY area");
		if ($area == "") {
			?><option value="" selected="">-ninguno-</option><?php
		} else {
			?><option value="">-ninguno-</option><?php
		}
		
		while ($a = mysqli_fetch_row($c)) {
			if ($area == $a[10]) {
				?><option selected=""><?php echo $a[10]; ?></option><?php
			} else {
				?><option><?php echo $a[10]; ?></option><?php
			}
			
		}
	}
	public function TablaMapeosat($valor, $area, $tusuario)
	{
		$cm = "";
		if ($valor == 0 AND $area == "") {
			$cm = $this->select("SELECT * FROM `mapeosat` M INNER JOIN situacionnodo S ON M.idsituacionnodo = S.idsituacionnodo");
		}
		if ($valor != 0 AND $area == "") {
			$cm = $this->select("SELECT * FROM mapeosat M INNER JOIN situacionnodo S ON M.idsituacionnodo = S.idsituacionnodo  WHERE M.idsituacionnodo = '$valor'");
		}
		if ($valor != 0 AND $area != "") {
			$cm = $this->select("SELECT * FROM mapeosat M INNER JOIN situacionnodo S ON M.idsituacionnodo = S.idsituacionnodo  WHERE M.area = '$area' AND  M.idsituacionnodo = '$valor'");
		}
		if ($valor == 0 AND $area != "") {
			?>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <strong>No se puede realizar este tipo de busqueda.</strong> Para buscar todos los nodos, la seleccion de area debe estar en <strong>"-ninguno-"</strong> <a href="mapeosat.php" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
			</div>
		<?php 
		} else {
			$filas = mysqli_num_rows($cm);
			?>
			
			<div class="form-group form-inline" align="right">
				<label class="text-info control-label">Total de registro <?php echo $filas; ?></label>
				<a href="imprimir.tabla.mapeosat.php?valor=<?php echo $valor; ?>&&area=<?php echo $area; ?>" class="btn btn-link" target="_Blank"><i class="fa fa-print"></i> Imprimir esta tabla</a>
			</div>
			<div class="table-responsive" style="margin: 10px;">
				<table class="table">
					<thead>
						<tr>
							<th>Nomeclaturado</th>
		                    <th>Ubicacion Switch</th>
		                    <th>No. patch Panel</th>
		                    <th>No. Puerto Patch Panel</th>
		                    <th>No. Switch</th>
		                    <th>Serie Switch</th>
		                    <th>Puerto Switch</th>
		                    <th>Tipo de Equipo</th>
		                    <th>Administracion</th>
		                    <th>Area</th>
		                    <th>Vlan</th>
		                    <th>Actividad</th>
		                    <th>Observaciones</th>
		                    <?php if ($tusuario == 1): ?>
		                    <th>Situacion Nodo</th>
		                    <?php endif ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 0;
					while ($a = mysqli_fetch_row($cm)) {
						$i++;
						?>
						<tr>
							<td><?php echo $a[1]; ?></td>
							<?php 
							// $cs = $this->select("SELECT * FROM `ubicacionswitch` WHERE idubicacionswitch  = '$a[2]'");
							// $ac = mysqli_fetch_row($cs);
							 ?>
							<td><?php echo $a[2]; ?></td>
							<td><?php echo $a[3]; ?></td>
							<td><?php echo $a[4]; ?></td>
							<td><?php echo $a[5]; ?></td>
							<td><?php echo $a[6]; ?></td>
							<td><?php echo $a[7]; ?></td>
							<?php 
							$ce = $this->select("SELECT * FROM `tipoequipo` WHERE idtipoequipo = '$a[8]'");
							$ae = mysqli_fetch_row($ce);
							 ?>
							<td><?php echo $ae[1]; ?></td>
							<?php 
							$ca = $this->select("SELECT * FROM `administracion` WHERE idadministracion  = '$a[9]'");
							$aa = mysqli_fetch_row($ca);
							 ?>
							<td><?php echo $aa[1]; ?></td>
							<td><?php echo $a[10]; ?></td>
							<td><?php echo $a[11]; ?></td>
							<?php 
							$caa = $this->select("SELECT * FROM `actividad` WHERE idactividad = '$a[12]'");
							$aaa = mysqli_fetch_row($caa);
							 ?>
							<td><?php echo $aaa[1]; ?></td>
							<td><?php echo $a[13]; ?></td>
							<td><?php echo $a[16]; ?></td>
							<?php if ($tusuario == 1): ?>
							<td>
								<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editar<?php echo $a[0]; ?>"><i class="fa fa-pencil"></i></button>
								<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar<?php echo $a[0]; ?>"><i class="fa fa-trash"></i></button>
								<!-- modal eliminar -->
								<div class="modal fade" id="eliminar<?php echo $a[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">
				      					<div class="modal-content" style="background: rgba(230, 0, 0, 0.8);">
				        					<div class="modal-header">
			          							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font><font>×</font></font></span></button>
	          									<h4 class="modal-title" id="myModalLabel" style="color: #fff;">Eliminar</h4>
			        						</div>
			        						<div class="modal-body">
			        							<h3 style="color: #fff;">¿Estas seguro de borrarlo?</h3>
			        						</div>
			        						<div class="modal-footer">
			          							<a href="eliminar.mapeosat.php?ide=<?php  echo $a[0];  ?>&&sinoca=<?php echo $valor; ?>&&areamp=<?php echo $area; ?>" class="btn btn-danger">Si</a>
			          							<a href="mapeosat.php" class="btn btn-success">No</a>
			        						</div>
			      						</div>
			    					</div>
								</div>
								<!-- fin del modal eliminar -->
								<!-- modal editar -->
								<div class="modal fade" id="editar<?php echo $a[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								    <div class="modal-dialog modal-lg">
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font><font>×</font></font></span></button>
								          <h4 class="modal-title" id="myModalLabel">Editar registro</font></h4>
								        </div>
								        <form action="mapeosat.php" method="POST">
									        <div class="modal-body">
									          <div class="row">
									          	<div class="form-group col-sm-4">
									          		<label>Nomeclaturado</label>
									          		<input type="hidden" name="editarmapesap" value="<?php echo $a[0]; ?>">
									          		<input type="text" name="nomeeditar" class="form-control" value="<?php echo $a[1]; ?>">
									          	</div>
												<div class="form-group col-sm-4">
													<label>Ubicacion Switch</label>
													<input type="text" name="ubsw" class="form-control" value="<?php echo $a[2]; ?>">
												</div>
												<div class="form-group col-sm-4">
													<label>No. patch Panel</label>
													<input type="text" name="nopa" class="form-control" value="<?php echo $a[3]; ?>">
												</div>
											 </div>
											 <div class="row">
												<div class="form-group col-sm-4">
													<label>No. Puerto Patch Panel</label>
													<input type="text" name="nopu" class="form-control" value="<?php echo $a[4]; ?>">
												</div>
												<div class="form-group col-sm-4">
													<label>No. Switch</label>
													<input type="text" name="nosw" class="form-control" value="<?php echo $a[5]; ?>">
												</div>
												<div class="form-group col-sm-4">
													<label>Serie Switch</label>
													<input type="text" name="sesw" class="form-control" value="<?php echo $a[6]; ?>">
												</div>
											 </div>
											 <div class="row">
												<div class="form-group col-sm-4">
													<label>Puerto Switch</label>
													<input type="text" name="pusw" class="form-control" value="<?php echo $a[7]; ?>">
												</div>
												<div class="form-group col-sm-4">
													<!-- tieq -->
													<label>Tipo de Equipo</label>
													<select name="tieq" id="" class="form-control">
														<?php $this->tipoEquipo($ae[0]); ?>
													</select>
													
												</div>
												<div class="form-group col-sm-4">
													<!-- admi -->
													<label>Administracion</label>
													<select name="admi" class="form-control" id="">
														<?php $this->Administracion($aa[0]); ?>
													</select>
												</div>
											 </div>
											 <div class="row">
												<div class="form-group col-sm-4">
													<label>Area</label>
													<input type="text" name="area" class="form-control" value="<?php echo $a[10]; ?>">
												</div>
												<div class="form-group col-sm-4">
													<label>Vlan</label>
													<input type="text" name="vlan" class="form-control" value="<?php echo $a[11]; ?>">
												</div>
												<div class="form-group col-sm-4">
													<!-- acti -->
													<label>Actividad</label>
													<select name="acti" class="form-control" id="">
														<?php $this->actividades($aaa[0]); ?>
													</select>
												</div>
											 </div>
											 <div class="row">
												<div class="form-group col-sm-4">
													<label>Observaciones</label>
													<input type="text" name="obse" class="form-control" value="<?php echo $a[13]; ?>">
												</div>
												<div class="form-group col-sm-4">
													<!-- sino -->
													<label>Situacion Nodo</label>
													<select name="sino" class="form-control" id="">
														<?php $this->SituacionNodos($a[14]); ?>
													</select>
												</div>
									         </div>
									        </div>
									        <div class="modal-footer">
									          <input type="submit" class="btn btn-primary" value="Actualizar">
									          <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
									        </div>
								        </form>
								      </div>
								    </div>
								</div>
								<!-- fin del modal editar -->
							</td>
							<?php endif ?>
						</tr>
						<?php
					}
						 ?>
					</tbody>
				</table>
			</div>
			<?php
		}
	}
	public function RegistrarMapeosat($nome, $ubsw, $nopa, $nopu, $nosw, $sesw, $pusw, $tieq, $admi, $area, $vlan, $acti, $obse, $sino)
	{
		$this->query("INSERT INTO mapeosat(nomenclaturanodo, idubicacionswitch, nopatchpanel, nopuertopatchpanel, noswitch, serieswitch, puertoswitch, idtipoequipo, idadministracion, area, vlan, idactividad, observaciones, idsituacionnodo) VALUES('$nome', '$ubsw', '$nopa', '$nopu', '$nosw', '$sesw', '$pusw', '$tieq', '$admi', '$area', '$vlan', '$acti', '$obse', '$sino')");
		return '
		<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Registro exitoso. <a href="mapeosat.php" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
		';
	}
	public function ActualizarMapeosat($id, $nome, $ubsw, $nopa, $nopu, $nosw, $sesw, $pusw, $tieq, $admi, $area, $vlan, $acti, $obse, $sino)
	{
		$this->query("UPDATE mapeosat SET nomenclaturanodo = '$nome', idubicacionswitch = '$ubsw', nopatchpanel = '$nopa', nopuertopatchpanel = '$nopu', noswitch = '$nosw', serieswitch = '$sesw', puertoswitch = '$pusw', idtipoequipo = '$tieq', idadministracion = '$admi', area = '$area', vlan = '$vlan', idactividad = '$acti', observaciones = '$obse', idsituacionnodo = '$sino' WHERE idno = '$id'");
		return '
		<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Actualización exitosa. <a href="mapeosat.php" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
		';
	}
	public function respaldarTablaMapeoSAT()
	{
		 #generador de nombre Sin repetir
		 $month = date("m");
		$year = date("Y");
		$diaActual= (date("d")); 
		setlocale(LC_ALL,"es_ES");
		$hora = date("g") ;
		$codigo = 'FECH'.$diaActual.'-'.$month.'-'.$year.'-HOR'.date("g").'-'.date("i").'-'.date("s").'-'.date("A");
		$fh = fopen('../respaldo.tabla.mapeosat/TablaMapeoSat.respaldo.'.$codigo.'.csv','a');
		$cm = $this->select("SELECT * FROM mapeosat");
		$cabecera = "Id,Nomeclaturado,Ubicacion Switch,No. patch Panel,No. Puerto Patch Panel,No. Switch,Serie Switch,Puerto Switch,Tipo de Equipo,Administracion,Area,Vlan,Actividad,Observaiones,Situacion Nodo \n";
		fwrite($fh, $cabecera);
		while ($am = mysqli_fetch_row($cm)) {
			$var = $am[0].",".$am[1].",".$am[2].",".$am[3].",".$am[4].",".$am[5].",".$am[6].",".$am[7].",".$am[8].",".$am[9].",".$am[10].",".$am[11].",".$am[12].",".$am[13].",".$am[14]. "\n";
             fwrite($fh, $var);
		}
	}
	public function tipoUsuario($x)
	{
		$c = $this->select("SELECT * FROM `tipousuario`");
		while ($a = mysqli_fetch_row($c)) {
			if ($x == $a[0]) {
				?><option selected="" value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			} else {
				?><option value="<?php echo $a[0] ?>"><?php echo $a[1]; ?></option><?php
			}
		}
	}
	public function RegistrarUsuario($nomb, $emai, $pass, $tius)
	{
		$cu = $this->select("SELECT * FROM `usuarios` WHERE email = '$emai' AND contraseña = '$pass'");
		$filas = mysqli_num_rows($cu);
		if ($filas == 0) {
				$this->query("INSERT INTO usuarios(nombre, email, contraseña, idtipousuario) VALUES('$nomb', '$emai', '$pass', '$tius')");
				return '
				<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Registro exitoso. <a href="usuario.php" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>';
		}else{
			return '
				<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Usuario existente. <a href="usuario.php" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>';
		}
	}
	public function ActualizarUsuario($id, $nomb, $emai, $pass, $tius)
	{
		$this->query("UPDATE usuarios SET nombre = '$nomb', email = '$emai', contraseña = '$pass', idtipousuario = '$tius' WHERE idusuarios = '$id'");
		return '
				<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Actualización exitosa. <a href="usuario.php" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>';
	}
	public function tablaUsuarios()
	{
		$c = $this->select("SELECT * FROM `usuarios` U INNER JOIN tipousuario T ON U.idtipousuario = T.idtipousuario");
		?>
		<div class="table-responsive">
			<table class="table table-bordear table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Tipo Usuario</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 0;
					while ($a = mysqli_fetch_row($c)) {
						$i++;
						?>
						<tr>
							<form action="usuario.php" method="POST">
							<td><?php echo $i; ?></td>
							<input type="hidden" name="actualizar" value="<?php echo $a[0]; ?>">
							<td><input type="text" class="form-control" name="nombre" value="<?php echo $a[1]; ?>" required=""></td>
							<td><input type="email" class="form-control" name="correo" value="<?php echo $a[2]; ?>" required=""></td>
							<td><input type="password" class="form-control" name="contra" value="<?php echo $a[3]; ?>" required=""></td>
							<td>
								<select name="tipus" id="" class="form-control">
									<?php $this->tipoUsuario($a[5]) ?>
								</select>
							</td>
							<td>
								<button class="btn btn-success" type="submit"><i class="fa fa-pencil"></i></button>
								<a class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $a[0]; ?>"><i class="fa fa-trash"></i></a>
								<!-- modal eliminar -->
								<div class="modal fade" id="eliminar<?php echo $a[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">
				      					<div class="modal-content" style="background: rgba(230, 0, 0, 0.8);">
				        					<div class="modal-header">
			          							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font><font>×</font></font></span></button>
	          									<h4 class="modal-title" id="myModalLabel" style="color: #fff;">Eliminar a <?php echo $a[1]; ?></h4>
			        						</div>
			        						<div class="modal-body">
			        							<h3 style="color: #fff;">¿Estas seguro de borrarlo?</h3>
			        						</div>
			        						<div class="modal-footer">
			          							<a href="eliminar.usuario.php?ide=<?php  echo $a[0];  ?>" class="btn btn-danger">Si</a>
			          							<a href="usuario.php" class="btn btn-success">No</a>
			        						</div>
			      						</div>
			    					</div>
								</div>
								<!-- fin del modal eliminar -->

							</td>
							</form>
						</tr>
						<?php 
					}
					 ?>
				</tbody>
			</table>
		</div>
		<?php
	}

}
 ?>