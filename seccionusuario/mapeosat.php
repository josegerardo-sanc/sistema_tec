<?php 
//ob_start();


include 'plantilla/cabeza.php';
$metodos=new SQL;

if(!isset($_SESSION)){
  session_start();
}

/*
	echo "<pre>";                   
	print_r($_POST);*/

$respuesta = "";
if (isset($_POST['action_action'])) {
	
	if($_POST['action_action']=="ADD_ROW"){
		$respuesta = $mapeosat->RegistrarMapeosat(
			$_POST['nome'], $_POST['ubsw'], $_POST['nopa'], 
			$_POST['nopu'], $_POST['nosw'], $_POST['sesw'], 
			$_POST['pusw'], $_POST['tieq'], $_POST['admi'], 
			$_POST['area'], $_POST['vlan'], $_POST['acti'], 
			$_POST['obse'], $_POST['sino']);

	}
	if($_POST['action_action']=="UPDATE_ROW"){

		$respuesta = $mapeosat->ActualizarMapeosat(
			 $_POST['id_row'], $_POST['nome'], $_POST['ubsw'],
			 $_POST['nopa'], $_POST['nopu'], $_POST['nosw'], 
			 $_POST['sesw'],$_POST['pusw'], $_POST['tieq'], 
			 $_POST['admi'], $_POST['area'],$_POST['vlan'],
			  $_POST['acti'], $_POST['obse'], $_POST['sino']);
			 //($id, $nome, $ubsw, $nopa, $nopu, $nosw, $sesw, $pusw, $tieq, $admi, $area, $vlan, $acti, $obse, $sino)
	}
	if($_POST['action_action']=="DELETE_ROW"){

		$respuesta = $mapeosat->DeleteRow($_POST['id_row']);
			 //($id, $nome, $ubsw, $nopa, $nopu, $nosw, $sesw, $pusw, $tieq, $admi, $area, $vlan, $acti, $obse, $sino)
	}
	
		
	header('Location:mapeosat.php');
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
				<button class="btn btn-primary" id="call_modal_nuevo">Nuevo</button>
			</div>

			<!--<canvas id="line-chart" width="400" height="400"></canvas>-->
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


		$metodos=new SQL;
		$data =$metodos->select("SELECT * FROM `area`");
		//echo "<pre>";
		$html_select_area_option="";
		while ($fila = $data->fetch_assoc()) {
			$html_select_area_option.='<option value="'.$fila['idarea'].'">'.$fila['area'].'</option>';
		}

		$data =$metodos->select("SELECT * FROM `situacionnodo`");
		//echo "<pre>";
		$html_select_node_option="";
		while ($fila = $data->fetch_assoc()) {
			$html_select_node_option.='<option value="'.$fila['idsituacionnodo'].'">'.$fila['situacionnodo'].'</option>';
		}

		
		 ?>
		 <div class="row">
			<div class="col-md-12">
				<form action="mapeosat.php" method="POST" class="form-inline">
					<div class="form-group">
						<label for="">Situacion del nodo</label>
						<select name="sinoca" class="form-control" id="sinoca">
					     	<option value="0" selected>Todos(*)</option>
							<?php
								echo $html_select_node_option;
							?>
						</select>
						<label for="">Area </label>
						<select name="areamp" class="form-control" id="areamp">
							<option value="0" selected>Todos(*)</option>
							<?php 
							echo $html_select_area_option;
							 ?>
						</select>
						<button class="btn btn-primary" type="submit" name="BTN_SEARCH_FILTER">Buscar</button>
					</div>
				</form>
			</div>
		</div>
		<br>
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-12">
				<?php 
				if(isset($_SESSION['status_register']) && $_SESSION['status_register']=="200"){
				?>	
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Registro exitoso!</strong>
				</div>
				<?php  
			    unset($_SESSION['status_register']);
				 } 
				?>

				</div>
				<div class="col-xs-12 col-sm-12" style="padding:10px;">
					<?php 
						//$mapeosat->TablaMapeosat($situacion, $area, $au[5]);
					 ?>

						<table id="example" class="table" style="width: 100%;">
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
									<th>Administración</th>
									<th>Área</th>
									<th>Vlan</th>
									<th>Actividad</th>
									<th>Observaciones</th>
									<?php //if ($tusuario == 1): ?>
									<th>Situación Nodo</th>
									<?php //endif ?>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
                            
							<?php
 
								$FILTER="";
								$index_area=0;
								$index_node=0;

								if(isset($_POST['BTN_SEARCH_FILTER'])){
									
								 	if(isset($_POST['areamp']) && $_POST['areamp']!=""){
										
										if($_POST['areamp']!=0){			
	   										  $index_area=$_POST['areamp']; 						
											  $FILTER="WHERE mp.idarea=".$_POST['areamp'];
										}
									}

								 	if(isset($_POST['sinoca']) && $_POST['sinoca']!=""){ 

										 if($_POST['sinoca']!=0){
											
											$index_node=$_POST['sinoca'];

											if($FILTER!="")
											{ 
												$FILTER.=" AND "; 
											}
											else{
											  $FILTER.=" WHERE ";
											}

  											$FILTER.="mp.idsituacionnodo=".$_POST['sinoca'];
										 }
									}
						
									//echo $FILTER;
								}

								//mp.idno,mp.nomenclaturanodo,mp.nopuertopatchpanel,mp.puertoswitch,mp.observaciones

								$query="
								SELECT mp.*,switcch.ubicacionswitch,panel.nopatchpanel,sw.noswitch
								,ser.serieswitch,equi.tipoequipo,adm.administracion,ar.area,vl.vlan,act.actividad ,node.situacionnodo
								FROM mapeosat mp 
								INNER JOIN ubicacionswitch switcch ON mp.idubicacionswitch=switcch.idubicacionswitch 
								INNER JOIN nopatchpanel panel ON mp.idnopatchpanel=panel.idnopatchpanel 
								INNER JOIN noswitch sw ON mp.idnopatchpanel=sw.idnoswitch 
								INNER JOIN serieswitch ser ON mp.idnopatchpanel=ser.idserieswitch 
								INNER JOIN tipoequipo equi ON mp.idnopatchpanel=equi.idtipoequipo 
								INNER JOIN administracion adm ON mp.idnopatchpanel=adm.idadministracion 
								INNER JOIN area ar ON mp.idnopatchpanel=ar.idarea 
								INNER JOIN vlan vl ON mp.idnopatchpanel=vl.idvlan 
								INNER JOIN actividad act ON mp.idnopatchpanel=act.idactividad
								INNER JOIN situacionnodo node ON mp.idsituacionnodo=node.idsituacionnodo
								$FILTER
								";

								$data=$metodos->select($query);
								$html_tr="";
								//echo "<pre>";

								$data_db=[];
								while ($fila = $data->fetch_assoc()) {
									

									$data_db[]=$fila;
								    //print_r($fila);
									$html_tr.='<tr role="row" class="odd" >
										<td class="sorting_1">'.$fila['nomenclaturanodo'].'</td>
										<td>'.$fila['ubicacionswitch'].'</td>
										<td>'.$fila['nopatchpanel'].'</td>
										<td>'.$fila['noswitch'].'</td>
										<td>'.$fila['serieswitch'].'</td>
										<td>'.$fila['noswitch'].'</td>
										<td>'.$fila['puertoswitch'].'</td>
										<td>'.$fila['tipoequipo'].'</td>
										<td>'.$fila['administracion'].'</td>
										<td>'.$fila['area'].'</td>
										<td>'.$fila['vlan'].'</td>
										<td>'.$fila['actividad'].'</td>
										<td>'.$fila['observaciones'].'</td>
										<td>'.$fila['situacionnodo'].'</td>
										<td>
											<div>
												<button type="button" class="btn btn-secondary btn_edit_row" data-id="'.$fila['idno'].'">Editar</button>
												<form action="mapeosat.php" method="POST">
													<input type="hidden" value="'.$fila['idno'].'" name="id_row" id="id_row">
												  <button type="submit" class="btn btn-danger btn_delete_row" name="action_action" value="DELETE_ROW">Eliminar</button>
												</form>
											</div>
										</td>
								     </tr>';
								}

								echo $html_tr;
							?>
							
								</tbody>
						
						</table>

				     
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
          <h4 class="modal-title" id="titulo_modal_modal">Nuevo registro</font></h4>
        </div>
        <form action="mapeosat.php" method="POST" id="formulario_mapeosat_form">
	        <div class="modal-body">
				<div style="opacity:1;">
									
					 <input type="hidden" value="ADD_ROW" name="action_action" id="action_action">
					 <input type="hidden"  name="id_row" id="id_row_fila">
				</div>
	          <div class="row">
	          	<div class="form-group col-sm-4">
	          		<label>Nomeclaturado</label>
	          		<input type="text" name="nome" class="form-control" id="nomeclatura">
	          	</div>
				<div class="form-group col-sm-4">
					<label>Ubicacion Switch</label>

					<select name="ubsw" id="ubicacion_switch" class="form-control">
					
					<?php
						$data =$metodos->select("SELECT * FROM `ubicacionswitch`");
						//echo "<pre>";
						$html_select="";
						while ($fila = $data->fetch_assoc()) {
							$html_select.='<option value="'.$fila['idubicacionswitch'].'">'.$fila['ubicacionswitch'].'</option>';
						}
						echo $html_select;
					?>
					</select>
					<!--
					<input type="text" name="ubsw" class="form-control">
					-->
				</div>
				<div class="form-group col-sm-4">
					<label>No. patch Panel</label>
					<select name="nopa" id="numero_panel" class="form-control">
					<?php
						$metodos=new SQL;
						$data =$metodos->select("SELECT * FROM `nopatchpanel`");
						//echo "<pre>";
						$html_select="";
						while ($fila = $data->fetch_assoc()) {
							$html_select.='<option value="'.$fila['idnopatchpanel'].'">'.$fila['nopatchpanel'].'</option>';
						}
						echo $html_select;
					?>
					</select>


					<!--<input type="text" name="nopa" class="form-control">-->
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>No. Puerto Patch Panel</label>
					<input type="text" name="nopu" class="form-control" id="numero_puerto_panel">
				</div>
				<div class="form-group col-sm-4">
					<label>No. Switch</label>
					<select name="nosw" class="form-control" id="numero_switch">
					<?php
						$metodos=new SQL;
						$data =$metodos->select("SELECT * FROM `noswitch`");
						//echo "<pre>";
						$html_select="";
						while ($fila = $data->fetch_assoc()) {
							$html_select.='<option value="'.$fila['idnoswitch'].'">'.$fila['noswitch'].'</option>';
						}
						echo $html_select;
					?>
					</select>
					<!--<input type="text" name="nosw" class="form-control">-->
				</div>
				<div class="form-group col-sm-4">
					<label>Serie Switch</label>
					<select name="sesw" id="serie_switch" class="form-control">
					<?php
						$metodos=new SQL;
						$data =$metodos->select("SELECT * FROM `serieswitch`");
						//echo "<pre>";
						$html_select="";
				    	while ($fila = $data->fetch_assoc()) {
							$html_select.='<option value="'.$fila['idserieswitch'].'">'.$fila['serieswitch'].'</option>';
						}
						echo $html_select;
					?>
					</select>
					<!--<input type="text" name="sesw" class="form-control">-->
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>Puerto Switch</label>
					<input type="text" name="pusw" id="puerto_switch" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<!-- tieq -->
					<label>Tipo de Equipo</label>
					<select name="tieq" id="tipo_equipo" class="form-control">
						<?php $mapeosat->tipoEquipo(""); ?>
					</select>
					
				</div>
				<div class="form-group col-sm-4">
					<!-- admi -->
					<label>Administracion</label>
					<select name="admi" class="form-control" id="administracion">
						<?php $mapeosat->Administracion(""); ?>
					</select>
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>Área</label>
					<select name="area" id="area" class="form-control">
					<?php
						echo $html_select_area_option;
					?>
					</select>
					<!--<input type="text" name="area" class="form-control">-->
				</div>
				<div class="form-group col-sm-4">
					<label>Vlan</label>
					<select name="vlan" id="vlan" class="form-control">
					<?php
						$metodos=new SQL;
						$data =$metodos->select("SELECT * FROM `vlan`");
						//echo "<pre>";
						$html_select="";
						while ($fila = $data->fetch_assoc()) {
							$html_select.='<option value="'.$fila['idvlan'].'">'.$fila['vlan'].'</option>';
						}
						echo $html_select;
					?>
					</select>

					<!--<input type="text" name="vlan" class="form-control">-->
				</div>
				<div class="form-group col-sm-4">
					<!-- acti -->
					<label>Actividad</label>
					<select name="acti" class="form-control" id="actividad">
						<?php $mapeosat->actividades(""); ?>
					</select>
				</div>
			 </div>
			 <div class="row">
				<div class="form-group col-sm-4">
					<label>Observaiones</label>
					<input type="text" name="obse" class="form-control" id="observaciones">
				</div>
				<div class="form-group col-sm-4">
					<!-- sino -->
					<label>Situacion Nodo</label>
					<select name="sino" class="form-control" id="situacion_nodo">
					<?php
						echo $html_select_node_option;
					?>
					</select>
				</div>
	         </div>
	        </div>
	        <div class="modal-footer">
	          <input type="submit" class="btn btn-primary" value="Guardar" id="input_save_update_form">
	          <a href="mapeosat.php" class="btn btn-danger">Cancelar</a>
	        </div>
        </form>
      </div>
    </div>
</div>
	<!--fin de los modales-->

<?php 
include 'plantilla/pies.php';
 ?>

 <script>
	 $(document).ready(function(){
		 
		 
		 var Idioma = {
			"emptyTable": "<i>No hay datos disponibles en la tabla.</i>",
			"info": "Del _START_ al _END_ de _TOTAL_ ",
			"infoEmpty": "Mostrando 0 registros de un total de 0.",
			"infoFiltered": "(filtrados de un total de _MAX_ registros)",
			"infoPostFix": "(actualizados)",
			"lengthMenu": "Mostrar _MENU_ registros",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "<span style='font-size:15px;'>Buscar:</span>",
			"searchPlaceholder": "Dato para buscar",
			"zeroRecords": "No se han encontrado coincidencias.",
			"paginate": {
				"first": "Primera",
				"last": "Última",
				"next": "Siguiente",
				"previous": "Anterior"
			},
			"aria": {
				"sortAscending": "Ordenación ascendente",
				"sortDescending": "Ordenación descendente"
			}
		}

			
		$('#call_modal_nuevo').on('click',function(){
			$('#formulario_mapeosat_form')[0].reset();
	
			$('#action_action').val('ADD_ROW');
			$('#id_row_fila').val("");
			$('#input_save_update_form').val('Guardar');
			$('#titulo_modal_modal').text('Nuevo Registro');
			$('#nuevo').modal('show');
		})

		var table = $('#example').DataTable( {
			"responsive": true,
			"destroy": true,
			"language": Idioma,
			"lengthMenu": [[10, 20, 25, 50, -1], [10, 20, 25, 50, "Todos"]],
			"iDisplayLength": 10
		});
	
		new $.fn.dataTable.FixedHeader( table );

		 var index_select="<?php echo $index_area; ?>";
		 var index_node="<?php echo $index_node; ?>";
		 $('#areamp').val(index_select);
		 $('#sinoca').val(index_node);

		 var data_db=<?php echo json_encode($data_db) ?>;


		 console.log(data_db);

		 $(document).on('click','.btn_edit_row',function(){
			
			var idno=$(this).data('id');
			$('#id_row_fila').val(idno);
			$('#input_save_update_form').val('Actualizar');
			$('#titulo_modal_modal').text('Actualizar Registro');
			console.log('edit'+idno);
			searchRow(idno)
		 });
		 $(document).on('click','.btn_delete_row',function(){
			var idno=$(this).data('id');
			$('#action_action').val('DELETE_ROW')
			 //console.log('update'+idno);
			 //searchRow(idno)
		 });

		 function searchRow(id){
			var status=false;
			for (const item of data_db) {
				if(item.idno==id)
				{
					$('#nomeclatura').val(item.nomenclaturanodo);
					$('#ubicacion_switch').val(item.idubicacionswitch);
					$('#numero_panel').val(item.idnopatchpanel);
					$('#numero_puerto_panel').val(item.nopuertopatchpanel);

					$('#numero_switch').val(item.idnoswitch);
					$('#serie_switch').val(item.idserieswitch);
					$('#puerto_switch').val(item.puertoswitch);

					$('#tipo_equipo').val(item.idtipoequipo);
					$('#administracion').val(item.idadministracion);
					$('#area').val(item.idarea);
					$('#vlan').val(item.idvlan);
					$('#actividad').val(item.idactividad);
					$('#observaciones').val(item.observaciones);
					$('#situacion_nodo').val(item.idsituacionnodo);
					
					//console.log(item);
				}
			}
			$('#nuevo').modal('show');
			$('#action_action').val('UPDATE_ROW')
		 }


	 })

 </script>

 <?php
 ob_end_flush();
 ?>