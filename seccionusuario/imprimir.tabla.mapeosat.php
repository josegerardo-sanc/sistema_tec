<?php 
include '../fpdf/fpdf.php';
include 'class_mapeosat.php';
$mapeosat = new mapeo();


class PDF extends FPDF
{
	function Header()
	{
	    $this->SetFont('Arial','B',15);
	    $this->SetFont('Arial','',12);
	    $this->Image('../img/logo.jpg',10,6,22);
	    $this->Cell(280,10,utf8_decode('SADCTI'),0,0,'C');
	    $this->Ln(5);
	$this->Cell(280,10,utf8_decode('Diseño y Desarrollo Tecnológico  Para La SADCTI Tabasco "1".'),0,0,'C');
	    $this->Ln(5);
	    $this->Cell(280,10,utf8_decode('Mapeo SAT'),0,0,'C');
	    $this->Ln(20);
	}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');

$cm = "";


$FILTER="";


$valor = $_GET['valor'];
$area = $_GET['area'];
						
	if($area!=0){								
			$FILTER="WHERE mp.idarea=".$area;
	}


	if($valor!=0){
		

		if($FILTER!="")
		{ 
			$FILTER.=" AND "; 
		}
		else{
			$FILTER.=" WHERE ";
		}

		$FILTER.="mp.idsituacionnodo=".$valor;
	}

	$query="
	SELECT mp.*,switcch.ubicacionswitch,panel.nopatchpanel,sw.noswitch
	,ser.serieswitch,equi.tipoequipo,adm.administracion,ar.area,vl.vlan,act.actividad ,node.situacionnodo
	FROM mapeosat mp 
	INNER JOIN ubicacionswitch switcch ON mp.idubicacionswitch=switcch.idubicacionswitch 
	INNER JOIN nopatchpanel panel ON mp.idnopatchpanel=panel.idnopatchpanel 
	INNER JOIN noswitch sw ON mp.idnoswitch=sw.idnoswitch 
	INNER JOIN serieswitch ser ON mp.idserieswitch=ser.idserieswitch 
	INNER JOIN tipoequipo equi ON mp.idtipoequipo=equi.idtipoequipo 
	INNER JOIN administracion adm ON mp.idadministracion=adm.idadministracion 
	INNER JOIN area ar ON mp.idarea=ar.idarea 
	INNER JOIN vlan vl ON mp.idvlan=vl.idvlan 
	INNER JOIN actividad act ON mp.idactividad=act.idactividad
	INNER JOIN situacionnodo node ON mp.idsituacionnodo=node.idsituacionnodo
	$FILTER
	";

		
$cm = $mapeosat->select($query);

$filas = mysqli_num_rows($cm);
$pdf->SetFont('Arial','B',8);
// $pdf->Cell(168,5,'',1,0,'J');
$pdf->Cell(235,5,'',0,0,'J');
$pdf->Cell(45,5,utf8_decode('Total de registro: '.$filas),0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Ln();
$pdf->Cell(20,5,'Nomeclaturado',1,0,'J');
$pdf->Cell(20,5,'Ubicacion Switch',1,0,'J');
$pdf->Cell(17,5,'N.patch Panel',1,0,'J');
$pdf->Cell(24,5,'N.Puerto Patch Panel',1,0,'J');
$pdf->Cell(15,5,'N.Switch',1,0,'J');
$pdf->Cell(20,5,'Serie Switch',1,0,'J');
$pdf->Cell(15,5,'P.Switch',1,0,'J');
$pdf->Cell(20,5,'Tipo de Equipo',1,0,'J');
$pdf->Cell(20,5,'Administracion',1,0,'J');
$pdf->Cell(30,5,'Area',1,0,'J');
$pdf->Cell(10,5,'Vlan',1,0,'J');
$pdf->Cell(20,5,'Actividad',1,0,'J');
$pdf->Cell(35,5,'Observaciones',1,0,'J');
$pdf->Cell(20,5,'Situacion Nodo',1,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','',7);

while ($a = $cm->fetch_assoc()) {
		$pdf->Cell(20,5,utf8_decode($a['nomenclaturanodo']),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a['ubicacionswitch']),1,0,'J');
		$pdf->Cell(17,5,utf8_decode($a['nopatchpanel']),1,0,'J');
		$pdf->Cell(24,5,utf8_decode($a['nopuertopatchpanel']),1,0,'J');
		$pdf->Cell(15,5,utf8_decode($a['noswitch']),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a['serieswitch']),1,0,'J');
		$pdf->Cell(15,5,utf8_decode($a['puertoswitch']),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a['tipoequipo']),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a['administracion']),1,0,'J');
		$pdf->Cell(30,5,utf8_decode($a['area']),1,0,'J');
		$pdf->Cell(10,5,utf8_decode($a['vlan']),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a['actividad']),1,0,'J');
		$pdf->Cell(35,5,utf8_decode($a['observaciones']),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a['situacionnodo']),1,0,'J');
		$pdf->Ln();
}
$pdf->Output();
 ?>